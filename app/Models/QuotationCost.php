<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationCost extends Model
{
    protected $table = "quotations_costs";
    protected $guarded = [];
    protected $fillable = [
        'cost_id',
        'quotation_id',
        'quantity'
    ];


}
