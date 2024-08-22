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
            $table->unsignedBigInteger('user_id'); // 外部キーとしてのuser_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //userテーブルのidを参照(ユーザーが削除されたら日記も削除)
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
