<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ModelHasRole extends Model
{
    protected $table = "model_has_roles";
    protected $guarded = [];

    public function role(){
        return $this->hasOne(Role::class, 'id','role_id');
    }
}