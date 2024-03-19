<?php

namespace App\Services;
use App\Models\ImageMessage;
use Illuminate\Support\Facades\Storage;
use Exception;
class WhatsAppService
{
    private $token;
    private $instance_id;
    private $message;
    private $phone;
    private $message_id;

    public function __construct(String $message = '', int $phone = 0, int $message_id)
    {
        $this->token =  env('ULTRA_TOKEN');
        $this->instance_id = env('ULTRA_INSTANCE');
        $this->message = $message;
        $this->phone = $phone;
        $this->message_id = $message_id;
    }

    public function execute(){
        try {
            $imageList = ImageMessage::where('message_id',$this->message_id)->get();
            $client = new \UltraMsg\WhatsAppApi($this->token,$this->instance_id);
            $to = $this->phone;
            $body = $this->message;

            if(count($imageList) == 0){
                $api = $client->sendChatMessage($to,$body); //Only text
                if(isset($api['error'])){
                    throw new Exception($api['error'], 1);
                }
                if(isset($api['Error'])){
                    throw new Exception($api['Error'], 1);
                }
            }else{
                foreach ($imageList as $image) {
                    $image = public_path("storage/images_whatsapp/".$image->name_upload);
                    $fileHandle = base64_encode(file_get_contents($image));
                    $api = $client->sendImageMessage($to,$fileHandle,$body); //Image & text
                    if(isset($api['error'])){
                        throw new Exception($api['error'], 1);
                    }
                    if(isset($api['Error'])){
                        throw new Exception($api['Error'], 1);
                    }
                }
            }

            $result['response'] = true;
            $result['send'] = 'done';
            return $result;

        } catch (\Exception $error) {
            $result['response'] = false;
            $result['message'] = $error->getMessage();
            return $result;
        }
    }
}
