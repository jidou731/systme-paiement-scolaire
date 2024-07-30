<?php

namespace Database\Seeders;

use App\Models\Niveau;
use Illuminate\Database\Seeder;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveaux = [
            ['id' =>1,'nom' => '1AF','slug' =>'1AF','created_at' =>now(),'updated_at' =>now()],
            ['id' =>2,'nom' => '2AF','slug' =>'2AF','created_at' =>now(),'updated_at' =>now()],
            ['id' =>3,'nom' => '3AF','slug' =>'3AF','created_at' =>now(),'updated_at' =>now()],
            ['id' =>4,'nom' => '4AF','slug' =>'4AF','created_at' =>now(),'updated_at' =>now()],
            ['id' =>5,'nom' => '5AF','slug' =>'5AF','created_at' =>now(),'updated_at' =>now()],
            ['id' =>6,'nom' => '6AF','slug' =>'6AF','created_at' =>now(),'updated_at' =>now()],
            ['id' =>7,'nom' => '1AS','slug' =>'1AS','created_at' =>now(),'updated_at' =>now()],
            ['id' =>8,'nom' => '2AS','slug' =>'2AS','created_at' =>now(),'updated_at' =>now()],
            ['id' =>9,'nom' => '3AS','slug' =>'3AS','created_at' =>now(),'updated_at' =>now()],
            ['id' =>10,'nom' => '4AS','slug' =>'4AS','created_at' =>now(),'updated_at' =>now()],
            ['id' =>11,'nom' => '5D','slug'  =>'5D','created_at' =>now(),'updated_at' =>now()],
            ['id' =>12,'nom' => '6D','slug'  =>'6D','created_at' =>now(),'updated_at' =>now()],
            ['id' =>13,'nom' => '7D','slug'  =>'7D','created_at' =>now(),'updated_at' =>now()],
            ['id' =>14,'nom' => '5C','slug'  =>'5C','created_at' =>now(),'updated_at' =>now()],
            ['id' =>15,'nom' => '6C','slug'  =>'6C','created_at' =>now(),'updated_at' =>now()],
            ['id' =>16,'nom' => '7C','slug'  =>'7C','created_at' =>now(),'updated_at' =>now()],
            ['id' =>17,'nom' => '5A','slug'  =>'5A','created_at' =>now(),'updated_at' =>now()],
            ['id' =>18,'nom' => '6A','slug'  =>'6A','created_at' =>now(),'updated_at' =>now()],
            ['id' =>19,'nom' => '7A','slug'  =>'7A','created_at' =>now(),'updated_at' =>now()],
            ['id' =>20,'nom' => '5O','slug'  =>'5O','created_at' =>now(),'updated_at' =>now()],
            ['id' =>21,'nom' => '6O','slug'  =>'6O','created_at' =>now(),'updated_at' =>now()],
            ['id' =>22,'nom' => '7O','slug'  =>'7O','created_at' =>now(),'updated_at' =>now()],
        ];

        foreach ($niveaux as $niveau) {
            Niveau::create($niveau);
        }
    }
}
