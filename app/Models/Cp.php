<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cp extends Model
{
    protected $table = "codigos_postales";

    use HasFactory;

    protected $guarded = [];

    protected $fillable = [];


}
