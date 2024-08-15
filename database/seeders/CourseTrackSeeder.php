<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Track;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseTrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tracks = Track::all(); // Get all available tracks

        Course::factory(20)
            ->withRandomTracks($tracks)
            ->create();
    }
}
