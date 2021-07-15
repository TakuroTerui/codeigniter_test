<?php
/**
 * newsテーブルを追加する
 * Class Migration_daily_reports
 */
class Migration_daily_reports extends CI_Migration
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
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'content' => array(
                'type' => 'TEXT',
            ),
            'reporting_time' => array(
                'type' => 'DATETIME',
            ),
            'created_at' => array(
                'type' => 'TIMESTAMP',
                'null' => true,
            ),
            'update_at' => array(
                'type' => 'TIMESTAMP',
                'null' => true,
            ),
            'deleted_at' => array(
                'type' => 'TIMESTAMP',
                'null' => true,
            ),
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('daily_reports');
    }

    /**
     * collbackの実行
     * newsテーブルのdrop
     */
    public function down()
    {
        $this->dbforge->drop_table('daily_reports');
    }
}