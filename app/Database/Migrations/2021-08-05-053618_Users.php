<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 128
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 20
            ],
            'address' => [
                'type' => 'TEXT'
            ],
            'amount' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2'
            ],
            'trnxId' => [
                'type'       => 'TEXT'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');
	}

	public function down()
	{
        $this->forge->dropTable('users');
	}

}
