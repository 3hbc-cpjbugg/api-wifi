<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Events extends Model{
    protected $table = "events";
    protected $guarded = [];

    protected $fillable = [
        'id',
        'title',
        'description',
        'type',
        'event_date_time',
        'durability',
        'type_send',
        'diffusion_id'
    ];

    public function affiliates(){
        return $this->belongsToMany(Affiliates::class, 'events_affiliates','event_id','affiliate_id');
    }

    public function sections(){
        return $this->belongsToMany(Section::class, 'events_sections','event_id','section');
    }

    public function images(){
        return $this->hasMany(EventsImages::class,'event_id','id');
    }

    public function scopeSearch(Builder $query, $value): Builder
    {
        return $query->where(function (Builder $subQuery) use ($value) {
            $subQuery->where('title', 'LIKE', "%{$value}%")
                ->orWhere('description','LIKE',"%{$value}%");

        });
    }
}
