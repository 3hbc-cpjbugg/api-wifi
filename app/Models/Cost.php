<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $table = "costs";
    protected $guarded = [];
    protected $fillable = [
        'service_id',
        'value',
        'description',


    ];



    public function scopeSearch(Builder $query, $value): Builder
    {
        return $query->where(function (Builder $subQuery) use ($value) {
            $subQuery->where('description', 'LIKE', "%{$value}%")
                ->orWhere('value', 'LIKE', "%{$value}%")
                ->orWhereHas('service',function($q) use($value){
                    $q->where('name','LIKE',"%{$value}%}");
                });

        });
    }

    public function service(){
        return $this->hasOne(Service::class,'id','service_id');
    }


}
