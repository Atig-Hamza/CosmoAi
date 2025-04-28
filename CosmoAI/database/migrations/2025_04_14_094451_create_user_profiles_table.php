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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('primary_role')->nullable();
            $table->string('size_of_company')->nullable();
            $table->string('primarily_hope')->nullable();
            $table->string('important_features')->nullable();
            $table->string('familiarity')->nullable();
            $table->string('hear_about_us')->nullable();
            $table->text('feature_wish')->nullable();
            $table->text('satisfaction_with_other')->nullable();
            $table->text('anticipations')->nullable();
            $table->text('suggestions')->nullable();
            $table->string('plan')->default('free');
            $table->timestamp('plan_start')->nullable();
            $table->timestamp('plan_end')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};






