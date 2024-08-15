<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Track;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tracks = Track::all(); // Get all available tracks

        // Create 20 courses and assign tracks in a recycled manner
        Course::factory(20)
            ->withRandomTracks($tracks)
            ->create();
    }
}
