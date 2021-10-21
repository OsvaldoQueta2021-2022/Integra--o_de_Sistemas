<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CriaTabelaUsuarios extends Migration
{
	public function up()
	{
		$this->forge->addField([
		    'id'=>[
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'nome'=>[
                'type' => 'VARCHAR',
                'constraint' => '128',
            ],

            'email'=>[
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'nif'=>[
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => true,
                'unique' => true,
            ],

            'telefone'=>[
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],

            'is_admin'=>[
                'type' => 'BOOLEAN',
                'null' => false,
                'default' => false,
            ],

            'ativo'=>[
                'type' => 'BOOLEAN',
                'null' => false,
                'default' => false,
            ],

            'password_hash'=>[
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'ativacao_hash'=>[
                'type' => 'VARCHAR',
                'constraint' => '64',
                'null' => true,
                'unique' => true,
            ],

            'reset_hash'=>[
                'type' => 'VARCHAR',
                'constraint' => '64',
                'null' => true,
                'unique' => true,
            ],

            'reset_expira_em'=>[
                'type' => 'DATETIME',
                'null' => true,
                'default' => null, //Não será preenchido quando a pessoa for cadastrada
            ],

            'criado_em'=>[
                'type' => 'DATETIME',
                'null' => true,
                'default' => null, //Não será preenchido quando a pessoa for cadastrada
            ],

            'atualizado_em'=>[
                'type' => 'DATETIME',
                'null' => true,
                'default' => null, //Não será preenchido quando a pessoa for cadastrada
            ],

            'deletado_em'=>[
                'type' => 'DATETIME',
                'null' => true,
                'default' => null, //Não será preenchido quando a pessoa for cadastrada
            ],

        ]);

        $this->forge->addPrimaryKey('id')->addUniqueKey('email');

        $this->forge->createTable('usuarios');
	}

	public function down()
	{
        $this->forge->dropTable('usuarios');
	}
}
