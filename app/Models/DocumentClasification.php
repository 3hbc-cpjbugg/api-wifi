<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class DocumentClasification extends Model
{
    use HasFactory;
    protected $table = "document_classification";
    protected $guarded = [];
}
