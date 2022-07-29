<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('asset_name');
            $table->string('asset_code');
            $table->foreignId('categories_id');
            $table->foreignId('location_id');
            $table->string('brand');
            $table->string('serial_number');
            $table->string('tag_number');
            $table->date('warranty')->nullable();
            $table->integer('asset_value');
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
        Schema::dropIfExists('assets');
    }
}
