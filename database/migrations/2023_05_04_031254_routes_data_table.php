<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RoutesDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('routes_data', static function (Blueprint $table) {
            $table->id();

            $table->bigInteger('route_id')->unsigned();
            $table->foreign('route_id')->references('id')->on('routes');

            $table->bigInteger('calendar_id')->unsigned();
            $table->foreign('calendar_id')->references('id')->on('calendars');

            $table->string('vinculation_route')->nullable();
            $table->integer('route_circular')->nullable();
            $table->timestamp('date_init')->nullable();
            $table->timestamp('date_finish')->nullable();
            $table->boolean('mon')->nullable();
            $table->boolean('tue')->nullable();
            $table->boolean('wed')->nullable();
            $table->boolean('thu')->nullable();
            $table->boolean('fri')->nullable();
            $table->boolean('sat')->nullable();
            $table->boolean('sun')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('routes_data');
    }
}
