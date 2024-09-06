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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('status')->default('VIGENTE');
            $table->string('name');
            $table->string('last_name');
            $table->string('dni')->unique();
            $table->string('province');
            $table->timestamp('date_birth');
            $table->string('email');
            $table->string('image')->nullable();
            $table->string('observation')->nullable();
            $table->timestamp('date_start')->nullable();
            $table->string('role');
            $table->string('department');
            $table->string('province_work');
            $table->double('salary');
            $table->boolean('part_time')->default(false);
            $table->string('observation_work')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('sessions');
    }
};
