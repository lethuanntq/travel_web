<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('tag')->nullable();
            $table->longText('description');
            $table->tinyInteger('region');
            
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('created_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('updated_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('deleted_by')->unsigned()->nullable()->constrained('users');
        });
        
        Schema::create('tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->unsignedInteger('price');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('price_promotion')->nullable();
            $table->string('tag')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('created_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('updated_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('deleted_by')->unsigned()->nullable()->constrained('users');
        });
        
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->unsigned()->constrained('users');
            $table->foreignId('tour_id')->unsigned()->constrained('tours');
            $table->longText('note')->nullable();
            $table->tinyInteger('status');
            
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('created_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('updated_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('deleted_by')->unsigned()->nullable()->constrained('users');
        });
        
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->unsigned()->constrained('users');
            $table->foreignId('tour_id')->unsigned()->constrained('tours');
            $table->foreignId('post_id')->unsigned()->constrained('posts');
            $table->string('path_image');
            
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('created_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('updated_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('deleted_by')->unsigned()->nullable()->constrained('users');
        });
        
        Schema::create('promotional', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('tour_id')->unsigned()->nullable()->constrained('tours');
            $table->foreignId('post_id')->unsigned()->nullable()->constrained('posts');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
        
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('created_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('updated_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('deleted_by')->unsigned()->nullable()->constrained('users');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_tours');
        Schema::dropIfExists('images');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('tours');
    }
}
