<?php
/**
 * questionsテーブルを追加する
 * Class Migration_users
 */
class Migration_users extends CI_Migration
{

    /**
     * migrationの実行
     */
    public function up()
    {
        $this->dbforge->add_field(array(
          'id' => array(
              'type' => 'INT',
              'unsigned' => true,
              'auto_increment' => true
            ),
            'name' => array(
                'type' => 'text'
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'unique' => true,
                'constraint' => '255',
              ),
              'avatar' => array(
                'type' => 'VARCHAR',
                'unique' => true,
                'constraint' => '255',
                'null' => true,
            ),
            'created_at' => array(
                'type' => 'TIMESTAMP',
                'null' => true,
            ),
            'updated_at' => array(
                'type' => 'TIMESTAMP',
                'null' => true,
            ),
            'deleted_at' => array(
                'type' => 'TIMESTAMP',
                'null' => true,
            ),
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('users', true);
    }

    /**
     * collbackの実行
     * newsテーブルのdrop
     */
    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}