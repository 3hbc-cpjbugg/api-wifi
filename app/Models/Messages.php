<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Messages extends Model{
    protected $table = "messages";
    protected $guarded = [];

    protected $fillable = [
        'id',
        'title',
        'message',
        'type',
        'whatsapp',
        'email',
        'sms',
        'type_message',
        'has_title',
        'type_send',
        'diffusion_id'
    ];

    public function affiliates(){
        return $this->belongsToMany(Affiliates::class, 'message_affiliate','message_id','affiliate_id');
    }

    public function sections(){
        return $this->belongsToMany(Section::class, 'message_section','message_id','section');
    }

    public function images(){
        return $this->hasMany(ImageMessage::class,'message_id','id');
    }

    public function scopeSearch(Builder $query, $value): Builder
    {
        return $query->where(function (Builder $subQuery) use ($value) {
            $subQuery->where('title', 'LIKE', "%{$value}%")
                ->orWhere('message','LIKE',"%{$value}%")
                ->orWhere('type_message','LIKE',"%{$value}%");

        });
    }
}
