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
            $table->string('title')->nullable();
            $table->string('seo_tag')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('key_word')->nullable();
            $table->string('description')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('created_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('updated_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('deleted_by')->unsigned()->nullable()->constrained('users');
        });

        Schema::create('tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('price_promotion')->nullable();
            $table->string('key_word')->nullable();
            $table->string('seo_tag')->nullable();
            $table->string('seo_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('created_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('updated_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('deleted_by')->unsigned()->nullable()->constrained('users');
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->unsigned()->nullable()->constrained('users');
            $table->integer('number_booked');
            $table->bigInteger('tour_id_booking')->nullable();
            $table->smallInteger('status')->comment('1:booking ; 2:not_booking');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('created_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('updated_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('deleted_by')->unsigned()->nullable()->constrained('users');
        });

        Schema::create('histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('tour_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tour_id')->references('id')->on('tours');
        });

        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('post_id');
            $table->bigInteger('tour_id');
            $table->string('path_image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('tours');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('histories');
        Schema::dropIfExists('images');
    }
}
