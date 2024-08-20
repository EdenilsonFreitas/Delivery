<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Testes extends BaseController
{
    public function index()
    {
        $data = [
            'titulo'=> 'Curso de como fazer uma site de entrega de comida com codeigniter 4',
            'subtitulo'=> 'Muito massa aprender como fazer esse curso de codeigniter 4'
        ];



        return view ('Testes/index', $data);
    }
    public function novo()
    {
        echo 'esse é mais um metodo do controller testes';
    }
}
