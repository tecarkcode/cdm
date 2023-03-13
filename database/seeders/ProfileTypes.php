<?php

namespace Database\Seeders;

use App\Models\ProfileType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'Administrator', 'description' => 'Usuário administrador.', 'dashboard' => 'admin'],
            ['id' => 2, 'name' => 'Usuário', 'description' => 'Usuário normal.', 'dashboard' => 'user'],
            ['id' => 3, 'name' => 'Investidor', 'description' => 'Usuário investidor.', 'has_subtype' => 1],
            ['id' => 4, 'name' => 'Empresário', 'description' => 'Empresário.', 'has_subtype' => 1]
        ];

        foreach ($items as $item) {
            ProfileType::create($item);
        }
    }
}
