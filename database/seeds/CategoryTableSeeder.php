<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Teatro',
            'Conciertos',
            'Cine',
            'Exposiciónes',
            'Deporte'
        ];

        DB::table('categories')->delete();

        foreach ($categories as $category) {
            DB::table('categories')->insert(
                    [
                        'name' => $category,
                        'slug' => \Illuminate\Support\Str::slug($category),
                        'created_at' => date('Y-m-d H:i:s')
                    ]
            );
        }
    }

}
