<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class EventsSection extends Model{
    protected $table = "events_sections";
    protected $guarded = [];

    public function message(){
        return $this->belongsTo(Events::class,'event_id');
    }

    public function affiliates(){
        return $this->hasMany(Affiliates::class, 'section','section');
    }
}
