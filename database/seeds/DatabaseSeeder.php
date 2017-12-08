<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');

        for ($i = 0; $i < 5000; $i++) {
            DB::table('feeds')->insert([
                'uuid' => $faker->uuid,
                'created_by_name' => $faker->name(),
                'created_by_photo_profile' => $faker->imageUrl(128, 128, 'cats', true),
                'feed_content' => $faker->realText('900'),
                'feed_image' => $faker->imageUrl(rand(300, 1080), rand(300, 1080), 'city', true),
                'feed_location' => $faker->city,
                'feed_comment_count' => rand(0, 10),
                'created_at' => $faker->dateTimeThisDecade(),
            ]);
        }
    }
}
