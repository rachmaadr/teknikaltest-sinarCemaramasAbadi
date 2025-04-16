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
        Schema::create('warning_letters', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->constrained('employees');
            $table->enum('type', ['SP1', 'SP2', 'Teguran Tertulis', 'SP3']);
            $table->date('date');
            $table->text('violation');
            $table->text('consequences');
            $table->text('improvement_plan')->nullable();
            $table->string('issued_by');
            $table->boolean('acknowledged')->default(false);
            $table->timestamp('acknowledged_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warning_letters');
    }
};
