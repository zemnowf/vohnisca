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
        Schema::create('encounters', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('campaign_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->text('text_parts')->nullable();
            $table->text('image')->nullable();
            $table->text('images')->nullable();
            $table->integer('sort')->default(0)->nullable();
            $table->text('connectedEvents')->nullable();
            $table->text('visible_for')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encounters');
    }
};
