<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'profile_id' => 1,
                'profile_subid' => null,
                'name' => '[Admin] Million Net',
                'cpf' => '123.456.789-10',
                'cnpj' => '45.111.222/0001-10',
                'email' => 'admin@example.org',
                'phone' => null,
                'email_verified_at' => null,
                'password' => '$2y$10$MfQCqL2pAkJnqYAbNxVpzehcPEm2ReAGT.3AcQWy8gWjMQRCux3C6',
                'remember_token' => null
            ],
            [
                'profile_id' => 2,
                'profile_subid' => null,
                'name' => '[User] Million User',
                'cpf' => '123.456.789-10',
                'cnpj' => '45.111.222/0001-10',
                'email' => 'user@example.org',
                'phone' => null,
                'email_verified_at' => null,
                'password' => '$2y$10$MfQCqL2pAkJnqYAbNxVpzehcPEm2ReAGT.3AcQWy8gWjMQRCux3C6',
                'remember_token' => null
            ],
            [
                'profile_id' => 3,
                'profile_subid' => 1,
                'name' => '[Inv_Jr] Million Investor',
                'cpf' => '123.456.789-10',
                'cnpj' => '45.111.222/0001-10',
                'email' => 'inv1@example.org',
                'phone' => null,
                'email_verified_at' => null,
                'password' => '$2y$10$MfQCqL2pAkJnqYAbNxVpzehcPEm2ReAGT.3AcQWy8gWjMQRCux3C6',
                'remember_token' => null
            ],
            [
                'profile_id' => 3,
                'profile_subid' => 2,
                'name' => '[Inv_Med] Million Investor II',
                'cpf' => '123.456.789-10',
                'cnpj' => '45.111.222/0001-10',
                'email' => 'inv2@example.org',
                'phone' => null,
                'email_verified_at' => null,
                'password' => '$2y$10$MfQCqL2pAkJnqYAbNxVpzehcPEm2ReAGT.3AcQWy8gWjMQRCux3C6',
                'remember_token' => null
            ],
            [
                'profile_id' => 3,
                'profile_subid' => 3,
                'name' => '[Inv_Sr] Million Investor III',
                'cpf' => '123.456.789-10',
                'cnpj' => '45.111.222/0001-10',
                'email' => 'inv3@example.org',
                'phone' => null,
                'email_verified_at' => null,
                'password' => '$2y$10$MfQCqL2pAkJnqYAbNxVpzehcPEm2ReAGT.3AcQWy8gWjMQRCux3C6',
                'remember_token' => null
            ],
            [
                'profile_id' => 4,
                'profile_subid' => 1,
                'name' => '[Empr_Jr] Million Business I',
                'cpf' => '123.456.789-10',
                'cnpj' => '45.111.222/0001-10',
                'email' => 'bus1@example.org',
                'phone' => null,
                'email_verified_at' => null,
                'password' => '$2y$10$MfQCqL2pAkJnqYAbNxVpzehcPEm2ReAGT.3AcQWy8gWjMQRCux3C6',
                'remember_token' => null
            ],
            [
                'profile_id' => 4,
                'profile_subid' => 2,
                'name' => '[Empr_Med] Million Business II',
                'cpf' => '123.456.789-10',
                'cnpj' => '45.111.222/0001-10',
                'email' => 'bus2@example.org',
                'phone' => null,
                'email_verified_at' => null,
                'password' => '$2y$10$MfQCqL2pAkJnqYAbNxVpzehcPEm2ReAGT.3AcQWy8gWjMQRCux3C6',
                'remember_token' => null
            ],
            [
                'profile_id' => 4,
                'profile_subid' => 3,
                'name' => '[Empr_Sr] Million Business III',
                'cpf' => '123.456.789-10',
                'cnpj' => '45.111.222/0001-10',
                'email' => 'bus3@example.org',
                'phone' => null,
                'email_verified_at' => null,
                'password' => '$2y$10$MfQCqL2pAkJnqYAbNxVpzehcPEm2ReAGT.3AcQWy8gWjMQRCux3C6',
                'remember_token' => null
            ]
        ];

        foreach ($items as $item) {
            User::create($item);
        }
    }
}
