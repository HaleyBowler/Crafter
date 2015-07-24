<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Likes extends CI_Migration {

            public function up()
            {
                    $this->dbforge->add_field(array(
                            'id' => array(
                                    'type' => 'INT',
                                    'constraint' => 5,
                                    'unsigned' => TRUE,
                                    'auto_increment' => TRUE
                            ),
                            'user_id' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '50'
                            ),
                            'picture_url' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '200'
                            ),
                            'project_url' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '200'
                            )

                    ));
                    $this->dbforge->add_key('id', TRUE);
                    $this->dbforge->create_table('likes');
            }

            public function down()
            {
                    $this->dbforge->drop_table('likes');
            }
    }

?>