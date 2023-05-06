<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CalendarDaysTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('calendar_days_disabled', static function (Blueprint $table) {
            $table->id();
            $table->bigInteger('calendar_id')->unsigned();
            $table->foreign('calendar_id')->references('id')->on('calendars');

            $table->timestamp('day')->nullable();
            $table->boolean('enabled')->nullable()->nullable();
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
        Schema::dropIfExists('calendar_days_disabled');
    }
}
