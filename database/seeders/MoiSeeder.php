<?php

namespace Database\Seeders;

use App\Models\Moi;
use Illuminate\Database\Seeder;

class MoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moiss = [
            ['id' => 1, 'nom_fr' => 'Octobre','nom_ar' => 'أكتوبر'],
            ['id' => 2, 'nom_fr' => 'Novembre','nom_ar' => 'نوفمبر'],
            ['id' => 3, 'nom_fr' => 'Décembre','nom_ar' => 'ديسمبر'],
            ['id' => 4, 'nom_fr' => 'Janvier','nom_ar' => 'يناير'],
            ['id' => 5, 'nom_fr' => 'Février','nom_ar' => 'فبراير'],
            ['id' => 6, 'nom_fr' => 'Mars','nom_ar' => 'مارس'],
            ['id' => 7, 'nom_fr' => 'Avril','nom_ar' => 'أبريل'],
            ['id' => 8, 'nom_fr' => 'Mai','nom_ar' => 'مايو'],
            ['id' => 9, 'nom_fr' => 'Juin','nom_ar' => 'يونيو'],
            ['id' => 10,'nom_fr' => 'Juillet','nom_ar' => 'يوليو'],
            ['id' => 11,'nom_fr' => 'Août','nom_ar' => 'أغسطس'],
            ['id' => 12,'nom_fr' => 'Septembre','nom_ar' => 'سبتمبر']
            
        ];

        // Moi::create($mois);
        foreach($moiss  as $mois){
            Moi::create($mois);

        }
    }
}
