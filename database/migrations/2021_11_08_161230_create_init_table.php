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
            $table->longText('short_description');
            $table->longText('description');
            $table->string('thumbnail')->nullable();
            $table->tinyInteger('type');
            $table->tinyInteger('highlight')->default(0);

            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('created_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('updated_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('deleted_by')->unsigned()->nullable()->constrained('users');
        });

        Schema::create('tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('destination_name');
            $table->string('tag')->nullable();
            $table->longText('short_description');
            $table->longText('description');
            $table->string('thumbnail')->nullable();
            $table->tinyInteger('type');
            $table->unsignedInteger('price');
            $table->string('price_promotion')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');

            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('created_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('updated_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('deleted_by')->unsigned()->nullable()->constrained('users');
        });

        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('tour_id')->unsigned()->constrained('tours');
            $table->integer('adult')->unsigned();
            $table->integer('child')->unsigned();
            $table->longText('note')->nullable();
            $table->tinyInteger('status');

            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('created_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('updated_by')->unsigned()->nullable()->constrained('users');
            $table->foreignId('deleted_by')->unsigned()->nullable()->constrained('users');
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone_number')->nullable();
            $table->string('hot_line')->nullable();
            $table->string('headquarters')->nullable();
            $table->string('branch_1')->nullable();
            $table->string('branch_2')->nullable();
            $table->string('website')->nullable();
            $table->string('support_email')->nullable();

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
        Schema::dropIfExists('settings');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('tours');
    }
}
