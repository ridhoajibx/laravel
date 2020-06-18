<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect(['Framework', 'Bugs', 'Slim', 'Foundation', 'Help']);
        $tags->each(function($t){
            \App\Models\Tag::create([
                'name' => $t,
                'slug' => \Str::slug($t),
            ]);
        });
    }
}
