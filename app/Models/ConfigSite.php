<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigSite extends Model{
    protected $table = "config_site";
    protected $guarded = [];
    protected $fillable = [
        'primary_color',
        'secondary_color',
        'background_color_login',
        'text_color',
        'accept_button_color',
        'accept_button_text_color',
        'cancel_button_color',
        'cancel_button_text_color',
        'header_color',
        'footer_color',
        'header_table_color'
    ];
}