<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class MessagesSection extends Model{
    protected $table = "message_section";
    protected $guarded = [];

    public function message(){
        return $this->belongsTo(Messages::class,'message_id');
    }

    public function affiliates(){
        return $this->hasMany(Affiliates::class, 'section','section');
    }
}
