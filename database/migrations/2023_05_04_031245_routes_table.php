<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('routes', static function (Blueprint $table) {
            $table->id();
            $table->string('external_id', 150)->nullable();
            $table->string('invitation_code', 150)->nullable();
            $table->string('title', 150)->nullable();
            $table->timestamp('start_timestamp')->nullable();
            $table->timestamp('end_timestamp')->nullable();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
}
