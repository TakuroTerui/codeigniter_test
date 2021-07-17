<?php
/**
 * questionsテーブルを追加する
 * Class Migration_add_comments
 */
class Migration_add_comments extends CI_Migration
{

    /**
     * migrationの実行
     */
    public function up()
    {
        $data = array(
            array(
                'user_id' => 1,
                'question_id' => 1,
                'content' => 'hoge',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ),
            array(
                'user_id' => 2,
                'question_id' => 2,
                'content' => 'hogehoge',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            )
        );
        
        $this->db->insert_batch('comments', $data);
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