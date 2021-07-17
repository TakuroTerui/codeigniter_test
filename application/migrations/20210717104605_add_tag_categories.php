<?php
/**
 * questionsテーブルを追加する
 * Class Migration_add_questions
 */
class Migration_add_tag_categories extends CI_Migration
{

    /**
     * migrationの実行
     */
    public function up()
    {
        $data = array(
            array(
                'name' => 'front'
              ),
              array(
                'name' => 'back'
              ),
              array(
                'name' => 'infra'
              ),
              array(
                'name' => 'others'
            )
        );

        $this->db->insert_batch('tag_categories', $data);
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