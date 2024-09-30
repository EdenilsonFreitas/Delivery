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

        $data = [

            'titulo' => "Detalhando o usuário {$usuario->nome}",
            'usuario' => $usuario,

        ];
        return view ('Admin/Usuarios/show', $data);
    }

    public function editar($id = null){

        $usuario = $this->buscaUsuarioOu404($id); 

        $data = [

            'titulo' => "Editando o usuário {$usuario->nome}",
            'usuario' => $usuario,

        ];
        return view ('Admin/Usuarios/editar', $data);
    }

    
   public function atualizar($id = null)
{
    // Verifica se o método da requisição é POST
    if ($this->request->getMethod() === 'POST') {
        
        // Busca o usuário pelo ID ou retorna 404 se não encontrado
        $usuario = $this->buscaUsuarioOu404($id);
        
        // Coleta os dados enviados via POST
        $post = $this->request->getPost();

 

        if (empty($post['passsword'])) {
            $this->usuarioModel->desabilitaValidacaoSenha();
            unset($post['password']);
            unset($post['password_confirmation']);
        }

        // Preenche o objeto usuário com os dados recebidos
        $usuario->fill($post); 

        if (!$usuario->haschanged()) {
            return redirect()->back()
                             ->with('info', 'Não há dados para atualizar');   
        }

        // Verifica se o objeto foi preenchido corretamente
            
        if ($this->usuarioModel->protect(false)->save($usuario)) {
            // Redireciona para a página de sucesso com mensagem
            return redirect()->to(site_url("admin/usuarios/show/{$usuario->id}"))
                             ->with('sucesso', "Usuário {$usuario->nome} atualizado com sucesso!");
        } else {
            // Captura os erros de validação e redireciona para a página anterior com erros
            return redirect()->back()
                             ->with('errors_model', $this->usuarioModel->errors())
                             ->with('atencao', 'Por favor verifique os erros abaixo.');
                            // ->withInput(); // Mantém os dados no formulário
        }
    } 

    // Se o método não for POST, redireciona para a página anterior
    return redirect()->back();
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