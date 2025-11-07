<?php

class Migration_create_user_permission_table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ),
            'menu' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
            ),
            'submenu' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
            ),
            'permission' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0
            ),
            'view' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0
            ),
            'edit' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0
            ),
            'delete' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            )
        ));
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('user_id');
        $this->dbforge->add_key(array('menu', 'submenu'));
        
        $this->dbforge->create_table('user_permission');
    }

    public function down()
    {
        $this->dbforge->drop_table('user_permission');
    }
}
