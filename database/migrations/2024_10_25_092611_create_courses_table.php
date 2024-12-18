<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id('no_course'); // Primary key
            $table->string('name');
            $table->unsignedBigInteger('department')->index(); // Foreign key to departments
    
            // Set up foreign key relationship
           // $table->foreign('department')->references('no_department')->on('departments')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
