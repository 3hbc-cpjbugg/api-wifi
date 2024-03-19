<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Committee extends Model{
    protected $table = "committees";

    protected $fillable = [
        'name',
        'municipality_id',
        'section',
        'is_select_all'
    ];


    public function affiliates(){
        return $this->belongsToMany(Affiliates::class, CommitteeAffiliate::class, 'commitee_id','affiliate_id');
    }

}
