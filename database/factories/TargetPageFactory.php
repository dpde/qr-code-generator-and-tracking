<?php

namespace Database\Factories;

use App\Models\TargetPage;
use Illuminate\Database\Eloquent\Factories\Factory;

class TargetPageFactory extends Factory
{
    protected $model = TargetPage::class;

    public function definition()
    {
        return [
            'url' => $this->faker->url,
        ];
    }
}