<?php
/**
 * questionsテーブルを追加する
 * Class Migration_add_questions
 */
class Migration_add_questions extends CI_Migration
{

    /**
     * migrationの実行
     */
    public function up()
    {
        $data = array(
            array(
                'user_id' => 1,
                'tag_category_id' => 1,
                'title' => 'hoge',
                'content' => 'hoge',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
              ),
              array(
                'user_id' => 2,
                'tag_category_id' => 2,
                'title' => 'hogehoge',
                'content' => 'hogehoge',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            )
        );

        $this->db->insert_batch('questions', $data);
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