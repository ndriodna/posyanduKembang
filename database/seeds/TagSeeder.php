<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
        [
            'id' => 1,
            'name' => 'profile',
            'slug' => 'profile',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'id' => 2,
            'name' => 'visi & Misi',
            'slug' => 'visi-&-Misi',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'id' => 3,
            'name' => 'Agenda',
            'slug' => 'berita',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'id' => 4,
            'name' => 'Berita',
            'slug' => 'berita',
            'created_at' => now(),
            'updated_at' => now()
        ]
        ]);
    }
}
