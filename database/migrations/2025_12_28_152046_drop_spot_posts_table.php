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
        //
        /**
         *データベースを削除
         *$table->decimal('latitude');
         *$table->decimal('longitude');
         *をnumeric型に変更する
         */
        Schema::dropIfExists('spot_posts');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::create('spot_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('spotTitle');
            $table->string('spotDesc')->nullable();
            $table->string('imag_url')->nullable();
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->timestamps();
        });
    }
};
