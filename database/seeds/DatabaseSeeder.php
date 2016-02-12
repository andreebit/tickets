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
        $this->command->info('Registrando usuario por defecto');
        $this->call(UserTableSeeder::class);

        $this->command->info('Registrando categorías');
        $this->call(CategoryTableSeeder::class);

        $this->command->info('Registrando eventos');
        $this->call(EventTableSeeder::class);
        
        $this->command->info('Registrando precios');
        $this->call(PriceTableSeeder::class);        
    }

}
