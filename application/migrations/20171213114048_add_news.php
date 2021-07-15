<?php
/**
 * newsテーブルを追加する
 * Class Migration_add_news
 */
class Migration_add_news extends CI_Migration
{

    /**
     * migrationの実行
     */
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
            ),
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
            ),
            'text' => array(
                'type' => 'TEXT',
                'null' => true,
            ),
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('news_test');
    }

    /**
     * collbackの実行
     * newsテーブルのdrop
     */
    public function down()
    {
        $this->dbforge->drop_table('news_test');
    }
}