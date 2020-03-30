<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Comment;
use App\Post;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create faker object
        $faker = Faker::create();
        //insert 5 random posts
        for ($i=0; $i < 5; $i++) { 
            DB::table('posts')->insert([
                'title'=> $faker->sentence(6),
                'body'=> $faker->text(40)
            ]);
        }
        //insert 10 random comments(2 for each post)
        for ($i=0; $i < 5; $i++) { 
            $post = Post::find($i+1);
            $post->comments()->createMany([
                ['comment'=>$faker->text(40)],
                ['comment'=>$faker->text(40)]
            ]);        
        }
    }
}
