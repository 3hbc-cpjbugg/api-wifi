<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageMessage extends Model{
    protected $table = "image_message";
    protected $guarded = [];

    protected $fillable = [
        'id',
        'name',
        'name_upload',
        'message_id',
    ];


}
