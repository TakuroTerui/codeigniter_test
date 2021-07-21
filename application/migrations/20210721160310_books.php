<?php
/**
 * questionsテーブルを追加する
 * Class Migration_users
 */
class Migration_books extends CI_Migration
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
                'auto_increment' => true,
            ),
            'user_id' => array(
              'type' => 'INT',
              'unsigned' => true,
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'author' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'publisher' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'price' => array(
              'type' => 'INT',
              'unsigned' => true,
            ),
            'purchase_date' => array(
              'type' => 'DATETIME',
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
        $this->dbforge->create_table('books', true);
    }

    /**
     * collbackの実行
     * newsテーブルのdrop
     */
    public function down()
    {
        $this->dbforge->drop_table('books');
    }
}