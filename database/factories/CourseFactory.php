<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'maxscore' => 100
        ];
    }

    public function withRandomTracks(Collection $tracks)
    {
        return $this->afterCreating(function (Course $course) use ($tracks) {
            $trackIds = $tracks->pluck('id')->toArray();
            shuffle($trackIds);
            $numberOfTracksToAssign = rand(1, count($trackIds)); 
            $tracksToAssign = array_slice($trackIds, 0, $numberOfTracksToAssign); 
            $course->tracks()->sync($tracksToAssign);
        });
    }
}
