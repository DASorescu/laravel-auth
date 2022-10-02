<?php
use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Tag;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $category_ids= Category::pluck('id')->toArray();

        // raccolgo tutti gli id dei tag presenti sul db
        $tag_ids = Tag::pluck('id')->toArray();


        for($i=0; $i<10;$i++){
            $new_post = new Post();
            $new_post->title= $faker->text(10);
            $new_post->user_id= 1;
            $new_post->category_id= Arr::random($category_ids);
            $new_post->slug= $slug = Str::slug($new_post->title, '-');
            $new_post->content= $faker->paragraphs(2,true);
            $new_post->image= $faker->imageUrl(150,150);
            $new_post->save();

            $post_tags = [];

            foreach($tag_ids as $tag_id){
                if($faker->boolean()) $post_tags [] = $tag_id;
            }

            $new_post->tags()->attach($post_tags);
        }
    }
}
