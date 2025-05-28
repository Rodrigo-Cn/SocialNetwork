<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->charset('utf8mb4');
            $table->collation('utf8mb4_unicode_ci');
            $table->string('country', 50)->nullable();
            $table->string('city', 70)->nullable();
            $table->string('street', 70)->nullable();
            $table->string('district', 70)->nullable();
            $table->unsignedBigInteger('addressable_id');
            $table->string('addressable_type');
            $table->timestamps();
            $table->index(['addressable_id', 'addressable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
