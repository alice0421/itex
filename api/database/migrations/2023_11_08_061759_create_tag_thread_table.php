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
        Schema::create('tag_thread', function (Blueprint $table) {
            $table->foreignId('tag_id')->constrained(table: 'tags')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('thread_id')->constrained(table: 'threads')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['tag_id', 'thread_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_thread');
    }
};
