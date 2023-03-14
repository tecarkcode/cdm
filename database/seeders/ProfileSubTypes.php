<?php

namespace Database\Seeders;

use App\Models\ProfileSubType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileSubTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            // Investidor Profiles
            [
                'profile_id' => 3,
                'profile_sub_id' => 1,
                'name' => 'Investidor Jr',
                'description' => 'Investidor iniciante.',
                'hide_description' => 'Investidor de até 249.99,99.',
                'dashboard' => 'investor_jr'
            ],
            [
                'profile_id' => 3,
                'profile_sub_id' => 2,
                'name' => 'Investidor Médio',
                'description' => 'Investidor médio.',
                'hide_description' => 'Investidor de 250.000,00 até 499.999,99.',
                'dashboard' => 'investor_med'
            ],
            [
                'profile_id' => 3,
                'profile_sub_id' => 3,
                'name' => 'Investidor Sênior',
                'description' => 'Investidor sênior.',
                'hide_description' => 'Investidor acima de 500.000,00.',
                'dashboard' => 'investor_senior'
            ],

            // Empresário Profiles
            [
                'profile_id' => 4,
                'profile_sub_id' => 1,
                'name' => 'Empresário Jr',
                'description' => 'Empresário jr.',
                'hide_description' => 'Empresas de pequeno porte.',
                'dashboard' => 'business_jr'
            ],
            [
                'profile_id' => 4,
                'profile_sub_id' => 2,
                'name' => 'Empresário Médio',
                'description' => 'Empresário médio.',
                'hide_description' => 'Empresas de médio por com mais de um ano no mercado.',
                'dashboard' => 'business_med'
            ],
            [
                'profile_id' => 4,
                'profile_sub_id' => 3,
                'name' => 'Empresário Sênior',
                'description' => 'Empresário sênior.',
                'hide_description' => 'Empresas de grande porte com histórico e anos de atividade.',
                'dashboard' => 'business_senior'
            ],
            [
                'profile_id' => 4,
                'profile_sub_id' => 4,
                'name' => 'Compania',
                'description' => 'Compania milinária.',
                'hide_description' => 'Compania com rendimento acima de R$ 1.000.000,00.',
                'dashboard' => 'company'
            ],

        ];

        foreach ($items as $item) {
            ProfileSubType::create($item);
        }
    }
}
