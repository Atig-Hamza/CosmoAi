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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            $table->string('ticket_id')->unique();
            $table->string('problem');
            $table->string('email');
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->string('response')->nullable();
            $table->string('attachment')->nullable();
            $table->string('closed_by')->nullable();
            $table->string('closer_id')->nullable();
            $table->timestamps();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
