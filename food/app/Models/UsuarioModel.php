<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{

	protected $table                = 'usuarios';
	protected $returnType           = 'App\Entities\Usuario';
	protected $useSoftDelete        = true;
	protected $allowedFields        = ['nome', 'email', 'telefone'];//Campos permitidos a sofrer aualização no banco de dado como atualizaçõo e outro o id não precisa por ser autoincremento

    public function procurar($term)
    {
        if ($term === null) {

            return [];
        }

        return $this->select('id, nome')
                    ->like('nome', $term)
                    ->get()
                    ->getResult();
    }
}
