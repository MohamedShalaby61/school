<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image_url');
            $table->string('center_name');
            $table->string('center_phone');
            $table->string('whats_app');
            $table->longText('brief');
            $table->text('address');
            $table->unsignedBigInteger('sub_category_id');
            // $table->foreign('sub_category_id')
            // ->references('id')
            // ->on('sub_categories');
            
            $table->timestamps();
        });

       //  Schema::table('courses', function($table) {
       //      $table->foreign('sub_category_id')->references('id')->on('sub_categories');
       // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
