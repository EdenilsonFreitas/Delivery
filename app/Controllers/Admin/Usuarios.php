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

    public function procurar() {

        if(!$this->request->isAJAX()) {
            exit('Página não encontrada');
        }

        $usuarios = $this->usuarioModel->procurar($this->request->getGet('term'));

        $retorno = [];

        foreach ($usuarios as $usuario) {

            $data ['id'] = $usuario->id;
            $data ['value'] = $usuario->nome;
            $retorno[]=$data;
        }

        return $this->response->setJSON($retorno);

    }


    public function show($id=null){

        $usuario = $this->buscaUsuarioOu404($id);

        dd($usuario);

    }

    /****
     * @param int $id
     * return objeto usuario
     * 
     */

    private function buscaUsuarioOu404(int $id=null){

        if (!$id || !$usuario=$this->usuarioModel->where('id', $id)->first()) {
            
            throw \CodeIgniter\Exceptions\PageNot\FoundException::forPageNotFound("Não encontramos o usuário $id");
            
        }
        return $usuario;
        
    }
    
}
