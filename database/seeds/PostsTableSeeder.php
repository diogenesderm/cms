<?php

use App\Post;
use App\Tags;
use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $category1 = Category::create([
            'name' => 'News'
        ]);

        $author1 = App\User::create([
            'name' => 'John Doe',
            'sobre'=> 'sobre voce',
            'email' => 'john@doe.com',
            'password' => Hash::make('password')
        ]);

        $author2 = App\User::create([
            'name' => 'Jane Doe',
            'sobre'=> 'sobre voce',
            'email' => 'jane@doe.com',
            'password' => Hash::make('password')
        ]);

        $category2 = Category::create([
            'name' => 'Design'
        ]);

        $category3 = Category::create([
            'name' => 'Partinership'
        ]);

        $post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description'  => 'Since the error was Call to undefined function asset() I checked the helpers.php in the Laravel repo to see if it existed.',
            'content'      => 'Since the error was Call to undefined function asset() I checked the helpers.php in the Laravel repo to see if it existed.',
            'category_id'    => $category1->id,
            'image' => 'posts/1.jpg',
            'user_id' => $author1->id
        ]);

        $post2 = $author2->posts()->create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description'  => 'Since the error was Call to undefined function asset() I checked the helpers.php in the Laravel repo to see if it existed.',
            'content'      => 'Since the error was Call to undefined function asset() I checked the helpers.php in the Laravel repo to see if it existed.',
            'category_id'    => $category2->id,
            'image' => 'posts/2.jpg'
        ]);
        $post3 = $author2->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'description'  => 'Since the error was Call to undefined function asset() I checked the helpers.php in the Laravel repo to see if it existed.',
            'content'      => 'Since the error was Call to undefined function asset() I checked the helpers.php in the Laravel repo to see if it existed.',
            'category_id'    => $category3->id,
            'image' => 'posts/3.jpg'

        ]);

        $post4 = $author2->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'description'  => 'Since the error was Call to undefined function asset() I checked the helpers.php in the Laravel repo to see if it existed.',
            'content'      => 'Since the error was Call to undefined function asset() I checked the helpers.php in the Laravel repo to see if it existed.',
            'category_id'    => $category1->id,
            'image' => 'posts/4.jpg',
            'user_id' => $author1->id
        ]);


        $tag1 = Tags::create([
            'name' => 'Record'
        ]);


        $tag2 = Tags::create([
            'name' => 'Progress'
        ]);


        $tag3 = Tags::create([
            'name' => 'Customers'
        ]);

    }
}
