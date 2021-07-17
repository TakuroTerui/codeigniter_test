<?php
/**
 * questionsテーブルを追加する
 * Class Migration_comments
 */
class Migration_comments extends CI_Migration
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
            'question_id' => array(
              'type' => 'INT',
              'unsigned' => true,
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
        $this->dbforge->create_table('comments', true);
    }

    /**
     * collbackの実行
     * newsテーブルのdrop
     */
    public function down()
    {
        $this->dbforge->drop_table('comments');
    }
}