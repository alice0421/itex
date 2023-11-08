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
        Schema::create('media_report', function (Blueprint $table) {
            $table->foreignId('media_id')->constrained(table: 'media')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('report_id')->constrained(table: 'reports')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['media_id', 'report_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_report');
    }
};
