<?php
/**
 * questionsテーブルを追加する
 * Class Migration_questions
 */
class Migration_questions extends CI_Migration
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
            'user_id' => array(
              'type' => 'INT',
              'unsigned' => true,
            ),
            'tag_category_id' => array(
              'type' => 'INT',
              'unsigned' => true,
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'content' => array(
                'type' => 'TEXT',
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
        $this->dbforge->create_table('questions', true);
    }

    /**
     * collbackの実行
     * newsテーブルのdrop
     */
    public function down()
    {
        $this->dbforge->drop_table('questions');
    }
}