<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $usuarioModel = new \App\Models\UsuarioModel;

        $usuario = [
            'nome' => 'Edenilson Freitas',
            'email' => 'admin@admin1.com',
            'cpf' => '888.802.840-45',
            'telefone' => '84 - 9999-5555',
        ];
        $usuarioModel->protect(false)->insert($usuario);

        $usuario = [
            'nome' => 'Arthur de Bahia Formosa',
            'email' => 'celta123@gmail.com',
            'cpf' => '128.431.420-08',
            'telefone' => '84 - 8888-5555',
        ];
        $usuarioModel->protect(false)->insert($usuario);

        dd($usuarioModel->errors());
    }
}
