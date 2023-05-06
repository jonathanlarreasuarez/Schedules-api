<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', static function (Blueprint $table) {
            $table->id();
            //$table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('picture')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('last_online')->nullable();
            $table->string('verification_code')->nullable();
            $table->string('new_email')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->boolean('first')->nullable()->default(0);
            $table->timestamp('last_accept_date')->nullable();
            $table->timestamp('created');
            $table->timestamp('modified');
            $table->string('company_contact')->nullable();
            $table->decimal('credits', 10, 2)->default(0.00);
            $table->boolean('first_trip')->nullable();
            $table->boolean('incomplete_profile')->nullable()->default(0);
            $table->boolean('phone_verify')->nullable()->default(0);
            $table->string('token_auto_login')->nullable();
            $table->string('user_vertical')->nullable();
            $table->integer('language_id')->nullable();
            $table->boolean('no_registered')->nullable();
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
        Schema::dropIfExists('users');
    }
}
