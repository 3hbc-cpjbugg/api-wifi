<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Section extends Model{
    protected $table = "sections";
    protected $primaryKey = 'section';
    protected $guarded = [];
    public $timestamps = false;
    protected $appends = ["count_affiliates"];

    public function messages(){
        return $this->belongsToMany(Messages::class, 'messages');
    }

    public function affiliates(){
        return $this->hasMany(Affiliates::class, 'section','section');
    }


    public function getCountAffiliatesAttribute(){

        $countAffiliates = Affiliates::where('section',$this->section)->count();
        return $countAffiliates;
    }

}
