<?php
/**
 * questionsテーブルを追加する
 * Class Migration_tag_categories
 */
class Migration_tag_categories extends CI_Migration
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
                'type' => 'VARCHAR',
                'constraint' => '255',
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
        $this->dbforge->create_table('tag_categories', true);
    }

    /**
     * collbackの実行
     * newsテーブルのdrop
     */
    public function down()
    {
        $this->dbforge->drop_table('tag_categories');
    }
}