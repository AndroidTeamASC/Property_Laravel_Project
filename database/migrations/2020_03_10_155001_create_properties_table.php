<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('agent_id');
            $table->string('feature_id')->nullable();
            $table->string('tag_id')->nullable();
            $table->string('title', 100);
            $table->unsignedInteger('bedroom');
            $table->unsignedInteger('bathroom');
            $table->unsignedInteger('garage')->nullable();
            $table->unsignedInteger('build_year')->nullable();
            $table->string('land_area', 30);
            $table->string('building_area', 30);
            $table->text('description')->nullable();
            $table->string('keyword', 100)->nullable();
            $table->unsignedInteger('price');
            $table->text('embed_code')->nullable();
            $table->unsignedInteger('property_status')->default(true);
            $table->timestamps();
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('agent_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
