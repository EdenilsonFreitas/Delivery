<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'usuarios';
    protected $returnType       = 'App\Entities\Usuario';
    protected $allowedFields    = ['nome','email','telefone'];
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $createdField     = 'criado_em';
    protected $updateField      = 'atualizado_em';
    protected $deletedField     = 'deletado_em';
    protected $validationRules = [
        'noome'     => 'required|min_length[4]|alpha_numeric_space||max_length[120]',
        'email'        => 'required|valid_email|is_unique[usuarios.email]',
        'cpf'        => 'required|exact_length[14]|is_unique[usuarios.cpf]',
        'password'     => 'required|min_length[6]',
        'password_confirmation' => 'required_with[password]|matches[password]',
    ];
    protected $validationMessages = [
        'nome' => [
            'required' => 'Esse campo é obrigatório.',
        ],
          'email' => [
            'required' => 'Esse campo é obrigatório.',
            'is_unique' => 'Desculpe! esse email já existe.',
        ],
        'cpf' => [
            'required' => 'Esse campo é obrigatório.',
            'is_unique' => 'Desculpe! esse CPF já existe.',
        ],
    ];












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
    

    
}