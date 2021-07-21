<?php
/**
 * questionsテーブルを追加する
 * Class Migration_add_question_tag_categories
 */
class Migration_add_question_tag_categories extends CI_Migration
{

    /**
     * migrationの実行
     */
    public function up()
    {
        $data = array(
              array(
                'question_id' => 1,
                'tag_category_id' => 1
              ),
              array(
                'question_id' => 1,
                'tag_category_id' => 2
              ),
              array(
                'question_id' => 2,
                'tag_category_id' => 2
              ),
              array(
                'question_id' => 2,
                'tag_category_id' => 3
              ),
              array(
                'question_id' => 3,
                'tag_category_id' => 3
              ),
              array(
                'question_id' => 3,
                'tag_category_id' => 4
              ),
              array(
                'question_id' => 4,
                'tag_category_id' => 4
              ),
              array(
                'question_id' => 4,
                'tag_category_id' => 1
              )
        );

        $this->db->insert_batch('question_tag_categories', $data);
    }

    /**
     * collbackの実行
     * newsテーブルのdrop
     */
    public function down()
    {
        $this->dbforge->drop_table('question_tag_categories');
    }
}