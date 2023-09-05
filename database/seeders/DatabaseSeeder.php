<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public  $categorie = [
        ['it'=>'Arredamento', 'en'=>'Forniture'],
        ['it'=>'Prodotti per la casa', 'en'=>'Household items'],
        ['it'=>'Abbigliamento', 'en'=>'Clothing'],
        ['it'=>'Da collezionare', 'en'=>'Collectible'],
        ['it'=>'Libri e riviste', 'en'=>'Books & Magazines'],
    
    ];
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        foreach ($this->categorie as $category) {
            Category::create([
                'it' => $category['it'],
                'en'=> $category['en']
            ]);
        }
       
}
}