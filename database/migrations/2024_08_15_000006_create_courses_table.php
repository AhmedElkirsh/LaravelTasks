<?php

use App\Models\Course;
use App\Models\Track;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('maxscore');
            $table->timestamps();
        });

        Schema::create('course_track',function(Blueprint $table){
            $table->id();
            $table->foreignidfor(Track::class)->constrained()->onDelete('cascade');
            $table->foreignidfor(Course::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
        Schema::dropIfExists('course_track');

    }
};
