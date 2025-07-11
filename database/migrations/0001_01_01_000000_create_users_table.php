<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @var string
    */
    protected $connection = 'mysql';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->charset('utf8mb4');
            $table->collation('utf8mb4_unicode_ci');
            $table->string('name', 70);
            $table->text('description')->nullable();
            $table->date('date_birth');
            $table->string('image_profile', 70)->nullable();
            $table->string('job', 50)->nullable()->default('Trabalho não cadastrado');
            $table->dateTime('last_login')->nullable();
            $table->boolean('online')->default(0);
            $table->boolean('activate');
            $table->string('email', 90)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 90);
            $table->string('username', 90)->unique();
            $table->string('phonenumber', 11)->unique()->nullable();
            $table->boolean('tentativas')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
