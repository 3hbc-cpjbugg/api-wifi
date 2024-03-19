<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class MessagesAffiliate extends Model{
    protected $table = "message_affiliate";
    protected $guarded = [];

    public function message(){
        return $this->belongsTo(Messages::class,'message_id');
    }

    public function affiliates(){
        return $this->hasOne(Affiliates::class,'id','affiliate_id');
    }
}
