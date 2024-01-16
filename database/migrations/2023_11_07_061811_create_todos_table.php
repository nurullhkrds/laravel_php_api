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
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer("priorityLevel");
            $table->boolean('isCompleted')->default(false);
            $table->unsignedBigInteger('user_id');
           $table->unsignedBigInteger('category_id');
            $table->dateTime('dateLast');
            $table->dateTime('dateCreated');
            $table->date('dateLastFiltered');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->foreign('category_id')->references('id')->on('categories')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
