<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\App;

class Usuarios extends BaseController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new \App\Models\UsuarioModel();
    }
	public function index()
	{

	    $data = [

	        'titulo' => 'Listado de usuários',
            'usuarios' => $this->usuarioModel->findAll(),

        ];

        return view('Admin/Usuarios/index', $data);

        //$usuario = $this->usuarioModel->findAll();
        //dd($usuario);
	}

    public function procurar()
    {

        if (!$this->request->isAJAX()) {

            exit('Página não encontrada');
        }

        $usuarios = $this->usuarioModel->procurar($this->request->getGet('term'));

        $retorno = [];

        foreach ($usuarios as $usuario) {

            $data['id'] = $usuario->id;
            $data['value'] = $usuario->nome;

            $retorno[] = $data;
        }

        return $this->response->setJSON($retorno);

//        echo '<pre>';
//        print_r($this->request->getGet());
//        exit();
    }

    public function show($id = null)
    {
        $usuario = $this->buscaUsuarioOu404($id); //Objeto criado a partir da recuperação do banco de dado

//         dd($usuario);

        $data = [
            'titulo' => "Detalhando o usuário $usuario->nome",
            'usuario' => $usuario,
        ];

        return view('Admin/Usuarios/show', $data);

       // dd($usuario);
    }

    private function buscaUsuarioOu404(int $id = null)
    {
        if (!$id || !$usuario = $this->usuarioModel->where('id', $id)->first()) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Não encontramos o usuário $id");
        }

        return $usuario;
    }

}
