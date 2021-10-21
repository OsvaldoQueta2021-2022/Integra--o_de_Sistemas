<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
	public function run()
	{
		$usuarioModel = new \App\Models\UsuarioModel;

		$usuario = [
		    'nome' => 'Osvaldo Fernando Muondo Queta',
            'email' => 'osvaldoquetamsc@gmail.com',
            'nif' => '002054351LA035',
            'telefone'=> '926219731'
        ];

        $usuarioModel->protect(false)->insert($usuario);

        $usuario = [
            'nome' => 'Isaias Fernando Muondo Queta',
            'email' => 'isaiasqueta@gmail.com',
            'nif' => '002154451LA135',
            'telefone'=> '944882454'
        ];

        $usuarioModel->protect(false)->insert($usuario);

        dd($usuarioModel->errors()); //Se tiver um erro na tentativa de inserção vai mostrar no meu dd.
	}
}
