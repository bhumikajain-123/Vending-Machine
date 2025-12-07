<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->string('email')->nullable()->change();
            $table->string('password')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->string('id_number')->nullable()->change();
            $table->string('business_name')->nullable()->change();
            $table->string('business_type')->nullable()->change();
            $table->string('gst_number')->nullable()->change();
            $table->string('business_category')->nullable()->change();
            $table->string('bank_account_no')->nullable()->change();
            $table->string('payment_method')->nullable()->change();
            $table->string('image')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->string('email')->nullable(false)->change();
            $table->string('password')->nullable(false)->change();
            $table->string('address')->nullable(false)->change();
            $table->string('id_number')->nullable(false)->change();
            $table->string('business_name')->nullable(false)->change();
            $table->string('business_type')->nullable(false)->change();
            $table->string('gst_number')->nullable(false)->change();
            $table->string('business_category')->nullable(false)->change();
            $table->string('bank_account_no')->nullable(false)->change();
            $table->string('payment_method')->nullable(false)->change();
            $table->string('image')->nullable(false)->change();
        });
    }
};
