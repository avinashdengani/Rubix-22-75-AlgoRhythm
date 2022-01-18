<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Healthlabel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name' => "Sandeep Ahuja",
            'email' => "sandeepahuja@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('password'), //password is password
            'remember_token' => Str::random(10),
        ]);

        $healthlabels = [ "Low-Carb", "Low-Fat", "Low-Sodium","Sugar-Conscious","Low Sugar", "Low Potassium", "Kidney-Friendly", "Vegan", "Vegetarian", "Pescatarian", "Mediterranean", "Dairy-Free", "Sulfite-Free", "Alcohol-Free", "Kidney-Friendly", "Mediterranean", "Dairy-Free", "Gluten-Free", "Wheat-Free", "Egg-Free", "Peanut-Free", "Tree-Nut-Free", "Soy-Free", "Fish-Free", "Shellfish-Free", "Pork-Free", "Red-Meat-Free", "Crustacean-Free", "Celery-Free", "Mustard-Free", "Sesame-Free", "Lupine-Free", "Mollusk-Free", "Kosher"];

        foreach($healthlabels as $label) {
            Healthlabel::create([
                'name' => $label
            ]);
        }

        $categories = [
            "Fruits",
            "Vegetables",
            "Dairy",
            "Oils",
            "Breads",
            "Meat",
            "Seafood",
            "DryFruits",
            "Pulses",
            "Spices",
            "Others"
        ];

        foreach($categories as $key => $category){
            $categoryObject = Category::create([
                'name' => $category
            ]);
        }
    }
}
