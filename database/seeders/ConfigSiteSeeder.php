<?php

namespace Database\Seeders;

use App\Models\ConfigSite;
use Illuminate\Database\Seeder;

class ConfigSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfigSite::create(
            [
                'primary_color'          => '#f2f2f2',
                'secondary_color'        => '#ffffff',
                'background_color_login' => '#913902',
                'text_color'             => '#080808',
                
                'accept_button_color'      => '#00d600',
                'accept_button_text_color' => '#ffffff',
                'cancel_button_color'      => '#ff0000',
                'cancel_button_text_color' => '#ffffff',

                'header_color'       => '#ffffff',
                'footer_color'       => '#ffffff',
                'header_table_color' => '#ffffff'
            ]
            );
    }
}
