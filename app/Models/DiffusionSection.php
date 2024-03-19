<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiffusionSection extends Model{
    protected $table = "diffusions_sections";
    protected $guarded = [];
    protected $fillable = [
        'diffusion_id',
        'section',
    ];


}
