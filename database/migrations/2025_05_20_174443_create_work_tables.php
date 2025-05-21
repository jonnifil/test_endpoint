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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('external_client_id', 16)->unique()->comment('уникальный внешний идентификатор клиента');
            $table->string('client_phone', 12)->comment('Телефон');

            $table->comment('Клиенты');
        });

        Schema::create('dialogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->unique()->comment('Клиент');

            $table->foreign('client_id')->references('id')->on('clients');

            $table->comment('Диалоги');
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dialog_id')->comment('Диалог');
            $table->string('external_message_id', 16)->unique()->comment('Уникальный внешний идентификатор сообщения');
            $table->string('message_text', 4096)->comment('Текст сообщения');
            $table->integer('send_at')->comment('Дата-время отправки в формате');

            $table->foreign('dialog_id')->references('id')->on('dialogs');

            $table->comment('Сообщения');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
        Schema::dropIfExists('dialogs');
        Schema::dropIfExists('clients');
    }
};
