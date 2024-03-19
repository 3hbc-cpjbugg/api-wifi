<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class EventsAffiliate extends Model{
    protected $table = "events_affiliates";
    protected $guarded = [];

    public function event(){
        return $this->belongsTo(Events::class,'event_id');
    }

    public function affiliates(){
        return $this->hasOne(Affiliates::class,'id','affiliate_id');
    }
}
