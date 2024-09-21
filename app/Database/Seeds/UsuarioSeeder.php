<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $usuarioModel = new \App\Models\UsuarioModel;

        $usuario = [
            'nome' => 'Eddie Master',
            'email' => 'mastereddie@gmail.com',
            'cpf' => '668.262.160-43',
            'telefone' => '84 - 9999-5555',
        ];
        $usuarioModel->protect(false)->insert($usuario);

        $usuario = [
            'nome' => 'Neida Terto',
            'email' => 'simoneide@gmail.com',
            'cpf' => '976.244.060-98',
            'telefone' => '84 - 9444-5555',
        ];
        $usuarioModel->protect(false)->insert($usuario);

        dd($usuarioModel->errors());
    }
}
