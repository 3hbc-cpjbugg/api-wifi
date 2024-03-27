<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Quotation;
use App\Models\QuotationCost;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class QuotationResourceAction

{
    /** @var Array */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function store()
    {

        DB::beginTransaction();
        try {
            $date = Carbon::now();

            $quotation = $this->data['id'] != null ? Quotation::find($this->data['id']) : new Quotation();
            $quotation->fill($this->data);
            $quotation->status_date = $date;
            $quotation->save();

            QuotationCost::where('quotation_id', $quotation->id)->delete();

            foreach ($this->data['quotations_costs'] as $quotationCost) {

                QuotationCost::create([
                    'cost_id' => $quotationCost['id'],
                    'quotation_id' => $quotation->id,
                    'quantity' => $quotationCost['quantity']
                ]);
            }


            DB::commit();
            return ['success' => true,'msg' => 'Se ha guardado correctamente la cotización'];
        } catch (Exception $e) {
            DB::rollback();
            return ['success' => false,'msg' => 'Ocurrió un error al guardar la cotización, comuniquese con el administrador','error' => $e->getMessage(), 'linea' => $e->getLine()];
        }

    }
}
