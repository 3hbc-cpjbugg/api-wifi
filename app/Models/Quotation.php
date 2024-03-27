<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $table = "quotations";
    protected $guarded = [];
    protected $fillable = [
        'id',
        'description',
        'status',
        'status_date'
    ];


    public function scopeSearch(Builder $query, $value): Builder
    {
        return $query->where(function (Builder $subQuery) use ($value) {
            $subQuery->where('description', 'LIKE', "%{$value}%");
        });
    }


    public function quotations_costs(){
        return $this->belongsToMany(Cost::class, QuotationCost::class, 'quotation_id','cost_id')->withPivot('quantity');

    }


}
