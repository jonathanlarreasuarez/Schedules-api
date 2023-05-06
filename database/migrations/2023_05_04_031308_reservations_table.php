<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('reservations', static function (Blueprint $table) {
            $table->id();
            $table->integer('user_plan_id')->nullable();

            $table->bigInteger('route_id')->unsigned();
            $table->foreign('route_id')->references('id')->on('routes');

            $table->integer('track_id')->nullable();
            $table->timestamp('reservation_start')->nullable();
            $table->timestamp('reservation_end')->nullable();
            $table->integer('route_stop_origin_id')->nullable();
            $table->integer('route_stop_destination_id')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
}
