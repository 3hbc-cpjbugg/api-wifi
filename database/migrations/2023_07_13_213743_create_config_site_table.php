<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigSiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_site', function (Blueprint $table) {
            $table->id();
            $table->string('primary_color');
            $table->string('secondary_color');
            $table->string('background_color_login');
            $table->string('text_color');
            
            $table->string('accept_button_color');
            $table->string('accept_button_text_color');
            $table->string('cancel_button_color');
            $table->string('cancel_button_text_color');
            
            $table->string('header_color');
            $table->string('footer_color');
            $table->string('header_table_color');
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_site');
    }
}
