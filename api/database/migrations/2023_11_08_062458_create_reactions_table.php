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
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stamp_id')->constrained(table: 'stamps')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained(table: 'users')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('thread_id')->constrained(table: 'threads')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reactions');
    }
};
