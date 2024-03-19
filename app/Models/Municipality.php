<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Section;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Municipality extends Model{

    protected $guarded = [];


    protected $fillable = [
        'id',
        'name',
        'lat',
        'lng',
        'zoom',
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }


}
