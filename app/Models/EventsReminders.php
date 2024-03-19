<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class EventsReminders extends Model{
    protected $table = "events_reminders";
    protected $guarded = [];

    public function message(){
        return $this->belongsTo(Events::class,'event_id');
    }
}
