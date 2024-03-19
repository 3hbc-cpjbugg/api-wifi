<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Diffusion extends Model{
    protected $table = "diffusions";
    protected $guarded = [];
    protected $fillable = [
        'name',
        'type',
    ];

    public function scopeSearch(Builder $query, $value): Builder
    {
        return $query->where(function (Builder $subQuery) use ($value) {
            $subQuery->where('name', 'LIKE', "%{$value}%")
                ->orWhere('type','LIKE',"%{$value}%");
        });
    }

    public function affiliates(){
        return $this->belongsToMany(Affiliates::class, DiffusionAffiliate::class, 'diffusion_id','affiliate_id');
    }

    public function sections(){
        return $this->belongsToMany(Section::class, DiffusionSection::class,'diffusion_id','section');
    }
}
