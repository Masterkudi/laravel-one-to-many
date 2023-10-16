<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Testing\Fakes\Fake;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void {
        $types = ['Front-End', 'Back-End', 'Full-Stack', 'Design', 'DevOps'];

        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->slug = Str::slug($new_type->name);
            $new_type->description = $faker->text(50);
            $new_type->color = $faker->rgbColor();
            $new_type->save();
        }
    }
}
