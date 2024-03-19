<?php

namespace App\Services;

use App\Models\Affiliates;
use App\Models\Diffusion;
use App\Models\Section;
use App\Models\Messages;
use Illuminate\Support\Facades\DB;
use Exception;
use GuzzleHttp\Psr7\Message;
use VARIANT;

class MessageService
{
    public function __construct()
    {
    }

    public function getAffiliates($message, $personal, $section, $typeSend, $type)
    {
        $affiliates = [];

        //TypeSend -> all / custom, when It´s all, it will be sended to all affiliates
        if ($typeSend == 'all') {
            $affiliates = Affiliates::get();
            $sections = Section::get();

            $message->affiliates()->sync($affiliates);
            $message->sections()->sync($sections);


            return $affiliates;
        }



        //To define what is the filter of affiliates by section / personal or both
        switch ($type) {

            case "mixto":
                $affiliatesPersonalIds =  explode(",", $personal);
                $affiliatesPersonals = Affiliates::whereIn('id', $affiliatesPersonalIds)->get();
                $sectionsIds =  explode(",", $section);
                $affiliatesSections = Affiliates::whereIn('section', $sectionsIds)->get();
                $affiliates = $affiliatesSections->merge($affiliatesPersonals);


                $message->affiliates()->sync($affiliatesPersonalIds);
                $message->sections()->sync($sectionsIds);


                break;

            case "personal":

                $affiliatesIds =  explode(",", $personal);
                $affiliates = Affiliates::whereIn('id', $affiliatesIds)->get();
                $message->affiliates()->sync($affiliatesIds);

                break;

            case "section":
                $sectionsIds =  explode(",", $section);
                $affiliates = Affiliates::whereIn('section', $sectionsIds)->get();
                $message->sections()->sync($sectionsIds);
                break;
        }


        return $affiliates;
    }


    public function getAffiliatesByDiffusion($message, $diffusionId)
    {

        $affiliates = [];


        $diffusionDb = Diffusion::with('affiliates', 'sections')->find($diffusionId);

        if ($diffusionDb->type == 'AFFILIATES') {
            array_push($affiliates, ...$diffusionDb->affiliates);

            $message->affiliates()->sync($diffusionDb->affiliates);

        } else {

            foreach ($diffusionDb->sections as $section) {

                $affiliatesSection =  Affiliates::where('section', $section->section)->get();

                array_push($affiliates, ...$affiliatesSection);
            }

            $message->sections()->sync($diffusionDb->sections);
        }

        //Delete duplicates affiliates
        $affiliatesIds = array_values(array_unique(array_column($affiliates, 'id')));

        $affiliates = Affiliates::whereIn('id', $affiliatesIds)->get();

        return $affiliates;
    }
    public function execute($affiliates, $message, $hasTitle)
    {

        try {

            //Check if the massive message has a title or not
            $tittleMessage = $message->title;
            $textMessage = $message->message;



            foreach ($affiliates as $affiliate) {

                $replace = array(
                    '$estimado@' => ($affiliate->genre === 'MUJER' ? 'estimada' : 'estimado'),
                    '$vecin@' => ($affiliate->genre === 'MUJER' ? 'vecina' : 'vecino'),
                    '$don@' => ($affiliate->genre === 'MUJER' ? 'doña' : 'don'),
                    '$nombre' => ucfirst(strtolower($affiliate->first_name)),
                    '$apellido_paterno' => $affiliate->first_last_name,
                    '$apellido_materno' => $affiliate->second_last_name,
                    '$nombre_completo' => $affiliate->first_name . ' ' . $affiliate->second_name . ' ' . $affiliate->first_last_name . ' ' . $affiliate->second_last_name,
                    '$apellidos' => $affiliate->first_last_name . ' ' . $affiliate->second_last_name,
                );

                $ressultTitle = $this->str_replace_assoc($replace, $tittleMessage);
                $ressultMessage = $this->str_replace_assoc($replace, $textMessage);


                $messageData = Messages::find($message->id);
                // $messageData->title = $ressultTitle;
                // $messageData->message = $ressultMessage;
                $messageData->save();

                if (strlen($affiliate->phone) === 10) {

                    $body = $ressultMessage;

                    if ($hasTitle) {
                        $body = "*" . $ressultTitle . "*:" . " \n" . $ressultMessage;
                    }

                    //Only send messages to whatsapp when the affiliate has_whatsapp -> 1
                    if($affiliate->has_whatsapp){


                        $whatsApp = (new WhatsAppService($body, $affiliate->phone, $message->id))->execute();
                        if (!$whatsApp['response']) {
                            throw new Exception($whatsApp['message'], 1);
                        }
                    }
                }
            }


            $result['status'] = true;
            return $result;
        } catch (Exception $e) {
            // DB::rollback();
            $result['status'] = false;
            $result['msg'] = $e->getMessage();
            $result['line'] = $e->getLine();
            return $result;
        }
    }


    function str_replace_assoc(array $replace, $subject)
    {
        return str_replace(array_keys($replace), array_values($replace), $subject);
    }
}
