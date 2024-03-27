<?php

namespace App\Http\Resources;

use App\Models\Cost;
use Illuminate\Http\Resources\Json\JsonResource;

class QuotationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {


        // $quotationsCosts = [];
        // foreach($this->quotations_costs as $quotationCost){

        //       $cost =   Cost::with('service')->find($quotationCost->cost_id);


        //       $newCost = [
        //         'id' => $cost->id,
        //         'service' => $cost->service,
        //         'description' => $cost->description,
        //         'quantity' => $quotationCost->quantity
        //       ];



        //       array_push($quotationCosts, $newCost);


        // }


            return [
            'id' => $this->id,
            'description' => $this->description,
            'status'=> $this->status,
            'status_date' => $this->status_date,
            'quotations_costs' => $this->quotations_costs
        ];
    }
}
