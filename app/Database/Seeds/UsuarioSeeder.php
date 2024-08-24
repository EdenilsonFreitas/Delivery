<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $usuarioModel = new \App\Models\UsuarioModel;

        $usuario = [
            'nome' => 'Edenilsn Lima de Freitas',
            'email' => 'admin@admin.com',
            'telefone' => '84 - 9999-5555',
        ];
        $usuarioModel->protect(false)->insert($usuario);

        $usuario = [
            'nome' => 'Arthur de Bahia Formosa',
            'email' => 'celta123@gmail.com',
            'telefone' => '84 - 8888-5555',
        ];
        $usuarioModel->protect(false)->insert($usuario);

        dd($usuarioModel->errors());
    }
}
