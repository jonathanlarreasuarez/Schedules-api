<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('services', static function (Blueprint $table) {
            $table->id();
            $table->integer('external_id')->nullable();
            $table->integer('external_budget_id')->nullable();
            $table->integer('external_route_id')->nullable();
            $table->integer('track_id')->nullable();
            $table->string('name', 251)->nullable();
            $table->string('notes', 251)->nullable();
            $table->timestamp('timestamp')->nullable();
            $table->string('arrival_address', 251)->nullable();
            $table->timestamp('arrival_timestamp')->nullable();
            $table->string('departure_address')->nullable();
            $table->timestamp('departure_timestamp')->nullable();
            $table->integer('capacity')->nullable();
            $table->boolean('confirmed_pax_count')->nullable();
            $table->timestamp('reported_departure_timestamp')->nullable();
            $table->string('reported_departure_kms')->nullable();
            $table->timestamp('reported_arrival_timestamp')->nullable();
            $table->string('reported_arrival_kms')->nullable();
            $table->string('reported_vehicle_plate_number')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->string('status_info')->nullable();
            $table->integer('reprocess_status')->nullable();
            $table->boolean('return')->nullable();
            $table->string('created')->nullable();
            $table->string('modified')->nullable();
            $table->string('synchronized_downstream')->nullable();
            $table->string('synchronized_upstream')->nullable();
            $table->integer('province_id')->nullable();
            $table->integer('sale_tickets_drivers')->nullable();
            $table->string('notes_drivers')->nullable();
            $table->string('itinerary_drivers')->nullable();
            $table->boolean('cost_if_externalized')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
}
