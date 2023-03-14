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
            ['id' => 3, 'name' => 'Investidor', 'description' => 'Usuário investidor.'],
            ['id' => 4, 'name' => 'Empresário', 'description' => 'Empresário.'],
            ['id' => 5, 'name' => 'New Profile', 'description' => 'New Profile.', 'status' => 0],
            ['id' => 6, 'name' => 'New Profile 2', 'description' => 'New Profile 2.', 'status' => 1, 'deleted_at' => '2023-03-13 22:27:54']
        ];

        foreach ($items as $item) {
            ProfileType::create($item);
        }
    }
}
