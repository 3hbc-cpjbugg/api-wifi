<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "services";
    protected $guarded = [];
    protected $fillable = [
        'name',
        'description',

    ];


    public function scopeSearch(Builder $query, $value): Builder
    {
        return $query->where(function (Builder $subQuery) use ($value) {
            $subQuery->where('name', 'LIKE', "%{$value}%")
                ->orWhere('description', 'LIKE', "%{$value}%");



        });
    }
}
