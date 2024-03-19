<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventsImages extends Model{
    protected $table = "events_images";
    protected $guarded = [];

    protected $fillable = [
        'id',
        'name',
        'name_upload',
        'event_id',
    ];


}
