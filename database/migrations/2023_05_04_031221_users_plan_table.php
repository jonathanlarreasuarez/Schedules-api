<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersPlanTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('user_plans', static function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->id();

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('currency_id')->nullable();
            $table->integer('next_user_plan_id')->nullable();
            $table->timestamp('start_timestamp')->nullable();
            $table->timestamp('end_timestamp')->nullable();
            $table->timestamp('renewal_timestamp')->nullable();
            $table->decimal('renewal_price', 10, 10)->nullable();
            $table->boolean('requires_invoice')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->timestamp('created')->nullable();
            $table->timestamp('modified')->nullable();
            $table->integer('financiation')->nullable();
            $table->integer('status_financiation')->nullable();
            $table->string('language')->nullable();
            $table->string('nif')->nullable();
            $table->string('business_name')->nullable();
            $table->boolean('pending_payment')->nullable();
            $table->timestamp('date_max_payment')->nullable();
            $table->timestamp('proxim_start_timestamp')->nullable();
            $table->timestamp('proxim_end_timestamp')->nullable();
            $table->timestamp('proxim_renewal_timestamp')->nullable();
            $table->decimal('proxim_renewal_price', 10, 10)->nullable();
            $table->decimal('credits_return', 10, 10)->nullable();
            $table->integer('company_id')->nullable();
            $table->boolean('cancel_employee')->nullable();
            $table->boolean('force_renovation')->nullable();
            $table->timestamp('date_canceled')->nullable();
            $table->decimal('amount_confirm_canceled', 10, 10)->nullable();
            $table->decimal('credit_confirm_canceled', 10, 10)->nullable();
            $table->integer('cost_center_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('user_plans');
    }
}
