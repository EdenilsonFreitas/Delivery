<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{

    protected $table            = 'usuarios';
    protected $returnType       = 'App\Entities\Usuario';
    protected $allowedFields    = ['nome', 'email', 'telefone',];
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $createdField     = 'criado_em';
    protected $updateField      = 'atualizado_em';
    protected $deletedField     = 'deletado_em';
    protected $validationRules = [
        'nome'     => 'required|min_length[4]|max_length[120]',
        'email'        => 'required|valid_email|is_unique[usuarios.email]',
        'cpf'        => 'required|exact_length[14]|is_unique[usuarios.cpf]',
        'telefone'        => 'required',
        'password'     => 'required|min_length[6]',
        'password_confirmation' => 'required_with[password]|matches[password]',
    ];
    protected $validationMessages = [
        'nome' => [
            'required' => 'O campo Nome é obrigatório.',
        ],
          'email' => [
            'required' => 'O campo E-mail é obrigatório.',
            'is_unique' => 'Desculpe! esse email já existe.',
        ],
        'cpf' => [
            'required' => 'O campo CPF é obrigatório.',
            'is_unique' => 'Desculpe! esse CPF já existe.',
        ],
    ];

//Eventos Callback
protected $beforeInsert = ['hashPassword'];
protected $beforeUpdate = ['hashPassword'];


protected function hashPassword(array $data){

    if (isset (['data']['password'])) {

        $data ['data']['password_hash'] = password_hash($data ['data']['password'], PASSWORD_DEFAULT);
        
        unset($data ['data']['password']);
        unset($data ['data']['password_confirmation']);
        
    }
    return $data;
}










    /**
     * @uso Controller usuários no Método procurar atraves do autocomplete
     * @para String $term
     * return arry usuarios
     * 
     */
    public function procurar($term){

        if ($term === null) {
            return [];
        }
        return $this->select('id, nome')
                   ->like('nome', $term)
                   ->get()
                   ->getResult();
    }

    public function desabilitaValidacaoSenha(){

        unset($this->validationRules['password']);
        unset($this->validationRules['password_confirmation']);
    }
    

    
}