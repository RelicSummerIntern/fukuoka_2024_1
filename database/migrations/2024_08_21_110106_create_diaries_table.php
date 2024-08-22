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
        Schema::create('diaries', function (Blueprint $table) {
            $table->id(); // id: bigint
            $table->string('user_id', 255);
            $table->string('title', 50);
            $table->string('comment', 255);
            $table->tinyInteger('rating');
            $table->boolean('favorite');
            $table->timestamps(); // created_at, updated_at: timestamp

            // 画像用のカラムを追加 (例えば、画像のパスを保存する場合)
            #$table->string('image_path')->nullable(); // 画像のパス、nullを許容
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diaries');
    }
};
