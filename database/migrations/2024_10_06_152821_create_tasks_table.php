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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index()->constrained('users');
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('priority', ['Низкий', 'Средний', 'Высокий'])->nullable();
            $table->date('date_deadline')->nullable();
            $table->time('time_deadline')->nullable();
            $table->enum('status', ['Ожидание', 'В процессе', 'Выполнена', 'Отменена'])->default('Ожидание');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
