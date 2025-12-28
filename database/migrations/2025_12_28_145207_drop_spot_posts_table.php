<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('spot_posts');
    }

    public function down(): void
    {
        Schema::create('spot_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->vector('title');
            $table->vector('description')->nullable();
            $table->vector('imag_url');
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->timestamps();
        });
    }
};
