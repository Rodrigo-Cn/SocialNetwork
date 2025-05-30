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
        Schema::create('community_user', function (Blueprint $table) {
            $table->id();
            $table->charset('utf8mb4');
            $table->collation('utf8mb4_unicode_ci');
            $table->boolean('administrator')->default('0');
            $table->boolean('master')->default('0');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('community_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('community_id')->references('id')->on('communities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('community_user', function (Blueprint $table) {
            $table->dropForeign('community_user_user_id_foreign');
            $table->dropForeign('community_user_community_id_foreign');
        });
        Schema::dropIfExists('community_user');
    }
};
