<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeds', function (Blueprint $table) {
            $table->string('uuid')->unique();
            $table->string('created_by_name');
            $table->string('created_by_photo_profile');
            $table->string('feed_content');
            $table->string('feed_image');
            $table->string('feed_location');
            $table->integer('feed_comment_count');
            $table->dateTime('created_at');
            $table->primary('uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feeds');
    }
}
