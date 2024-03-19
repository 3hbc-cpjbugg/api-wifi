<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class AffiliateDocument extends Model{
    protected $table = "affiliates_documents";
    protected $guarded = [];

    public function classification(){
        return $this->hasOne(DocumentClasification::class, 'id','document_classification_id');
    }
}
