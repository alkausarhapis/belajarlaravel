<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void{

        Post::factory( 20 )->create();

        User::create( [
            'name' => 'Hapis Alkosar',
            'username' => 'hapis',
            'email' => 'hapis@gmail.com',
            'password' => bcrypt( 'password' ),
        ] );
        User::factory( 3 )->create();

        // User::create( [
        //     'name' => 'Udin Petot',
        //     'email' => 'udingeming@gmail.com',
        //     'password' => bcrypt( 'password' ),
        // ] );

        Category::create( [
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ] );

        Category::create( [
            'name' => 'General',
            'slug' => 'general',
        ] );

        Category::create( [
            'name' => 'Technologies',
            'slug' => 'techonologies',
        ] );

        // Post::create( [
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'title' => 'Judul pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => '<p>Lorem ipsum pertama, sit amet consectetur adipisicing elit. Eum vel laborum sunt modi officia harum alias nesciunt itaque repudiandae labore neque inventore dolorem, ipsa aliquid illo iusto dolor molestias eligendi laudantium fugiat, tempora quo quaerat tenetur debitis. Facilis, odit sunt.</p>',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni eligendi quo, error expedita, suscipit
        //         reiciendis asperiores nihil repellat commodi nam hic vitae laboriosam tenetur voluptatum animi enim autem officia
        //         repudiandae.</p>
        //     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt nam quo quas explicabo! Consectetur architecto
        //         consequatur ex animi in libero vel excepturi ratione doloremque. Temporibus sit nulla tempore ad id veniam earum. Ex
        //         eum praesentium quidem reiciendis odit numquam iste? Ad tempore fugit soluta consequuntur iusto suscipit officiis
        //         beatae sunt!</p>
        //     <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt nesciunt temporibus repudiandae nemo quidem
        //         molestias velit, cum repellat totam fugit accusantium voluptatibus quisquam porro placeat quo neque ea amet ullam
        //         unde cupiditate doloribus sequi. Quo?</p>',
        // ] );
    }
}