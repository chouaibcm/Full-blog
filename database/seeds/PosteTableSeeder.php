<?php

use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PosteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1= App\User::create([
            'name'=>'Douakha khalil',
            'email'=>'khalil@gmail.com',
            'password'=>hash::make('0552163366')
        ]);
        $author2= App\User::create([
            'name'=>'Sellami walid',
            'email'=>'walid@gmail.com',
            'password'=>hash::make('0552163366')
        ]);
        $author3= App\User::create([
            'name'=>'Mahboubi Tamer',
            'email'=>'tamer@gmail.com',
            'password'=>hash::make('0552163366')
        ]);
        $author4= App\User::create([
            'name'=>'Hamouda Djallel',
            'email'=>'djallel@gmail.com',
            'password'=>hash::make('0552163366')
        ]);
        $category1=Category::create([
            'name'=>'News'
        ]);
        $category2=Category::create([
            'name'=>'Marketing'
        ]);
        $category3=Category::create([
            'name'=>'Updates'
        ]);
        $category4=Category::create([
            'name'=>'Design'
        ]);
        $category5=Category::create([
            'name'=>'Product'
        ]);
        $category6=Category::create([
            'name'=>'Offers'
        ]);
        $post1=Post::create([
            'title'=> 'We relocated our office to a new designed garage',
            'description'=>'discrition',
            'content'=>'content',
            'category_id'=>$category1->id,
            'image'=>'posts/1.jpg',
            'user_id'=>$author1->id
        ]);
        $post2= $author2->posts()->create([
            'title'=> 'Top 5 brilliant content marketing strategies',
            'description'=>'discrition 2',
            'content'=>'content 2',
            'category_id'=>$category2->id,
            'image'=>'posts/2.jpg'
        ]);
        $post3=$author3->posts()->create([
            'title'=> 'Best practices for minimalist design with example',
            'description'=>'discrition 3',
            'content'=>'content 3',
            'category_id'=>$category3->id,
            'image'=>'posts/3.jpg'
        ]);
        $post4=$author4->posts()->create([
            'title'=> 'Congratulate and thank to Maryam for joining our team',
            'description'=>'discrition 4',
            'content'=>'content 4',
            'category_id'=>$category5->id,
            'image'=>'posts/4.jpg'
        ]);
        $tag1=Tag::create([
            'name'=>'Record'
        ]);
        $tag2=Tag::create([
            'name'=>'Progress'
        ]);
        $tag3=Tag::create([
            'name'=>'Customers'
        ]);
        $tag4=Tag::create([
            'name'=>'Offer'
        ]);
        $tag5=Tag::create([
            'name'=>'Job'
        ]);
        $tag6=Tag::create([
            'name'=>'Design'
        ]);
        $post1->tags()->attach([$tag1->id,$tag2->id,$tag6->id]);
        $post2->tags()->attach([$tag3->id,$tag5->id,$tag6->id]);
        $post3->tags()->attach([$tag1->id,$tag3->id,$tag4->id,$tag5->id]);
        $post4->tags()->attach([$tag1->id,$tag2->id,$tag3->id,$tag4->id,$tag6->id]);
    }
}
