<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiffusionAffiliate extends Model{
    protected $table = "diffusions_affiliates";
    protected $guarded = [];
    protected $fillable = [
        'diffusion_id',
        'section',
    ];


}
