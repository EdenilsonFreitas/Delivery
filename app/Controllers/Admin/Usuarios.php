<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Usuarios extends BaseController
{
    private $usuarioModel;

    public function __construct(){
        $this->usuarioModel = new \App\Models\UsuarioModel();
    }

    public function index()
    {

        $data = [
            'titulo'=>'Listando os usuários',
            'usuarios'=>$this->usuarioModel->findAll()
        ];

        return view('Admin/Usuarios/index', $data);
        
    }

    public function procurar(){

        if(!$this->request->isAJAX()){
            exit('Página não encontrada');
        }


        echo '<pre>';
        print_r($this->request->getGet());
        exit;
    }
}
