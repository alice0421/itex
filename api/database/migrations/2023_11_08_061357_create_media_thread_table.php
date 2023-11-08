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
        Schema::create('media_thread', function (Blueprint $table) {
            $table->foreignId('media_id')->constrained(table: 'media')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('thread_id')->constrained(table: 'threads')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['media_id', 'thread_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_thread');
    }
};
