<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Affiliates extends Model{
    protected $table = "affiliates";
    protected $guarded = [];
    protected $appends = ["full_name","photo_low"];
    protected $fillable = [
        'first_name',
        'second_name',
        'first_last_name',
        'second_last_name',
        'lat',
        'lng',
        'photo',
        'rol',
        'is_completed',
        'elector_key',
        'section',
        'phone',
        'email',
        'state',
        'municipality',
        'origin',
        'birth_date',
        'elector_key_valid',
        'age',
        'has_whatsapp',
        'genre'
    ];

    public function messages(){
        return $this->belongsToMany(Messages::class, 'message_affiliate','affiliate_id','message_id');
    }

    public function documents(){
        return $this->hasOne(AffiliateDocument::class, 'affiliate_id','id')->where('document_classification_id',1);
    }

    public function sections(){
        return $this->hasOne(Section::class, 'section','section');
    }


    public function scopeSearch(Builder $query, $value): Builder
    {
        return $query->where(function (Builder $subQuery) use ($value) {
            $subQuery->where('first_name', 'LIKE', "%{$value}%")
                ->orWhere('second_name','LIKE',"%{$value}%")
                ->orWhere('first_last_name','LIKE',"%{$value}%")
                ->orWhere('second_last_name','LIKE',"%{$value}%")
                ->orWhere('is_completed', 'LIKE', "%{$value}%")
                ->orWhere('elector_key', 'LIKE', "%{$value}%")
                ->orWhere('section', 'LIKE', "%{$value}%")
                ->orWhere('phone', 'LIKE', "%{$value}%")
                ->orWhere('email', 'LIKE', "%{$value}%");

        });
    }

    public function getFullNameAttribute(){

        $firstName = $this->first_name;
        $secondName = $this->second_name != null ? $this->second_name : null;
        $firstLastName = $this->first_last_name;
        $secondLastName = $this->second_last_name;

        if($secondName == null){
            return "$firstName $firstLastName $secondLastName";
        }

        return "$firstName $secondName $firstLastName $secondLastName";
    }

    public function getPhotoLowAttribute(){
        $explode = explode('.', $this->photo);
        return "$explode[0]_low.{$explode[1]}";
    }
}
