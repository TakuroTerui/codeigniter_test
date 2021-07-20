<?php
/**
 * questionsテーブルを追加する
 * Class Migration_question_tag_categories
 */
class Migration_question_tag_categories extends CI_Migration
{

    /**
     * migrationの実行
     */
    public function up()
    {
        $this->dbforge->add_field(array(
            'question_id' => array(
              'type' => 'INT',
              'unsigned' => true
            ),
            'tag_category_id' => array(
              'type' => 'INT',
              'unsigned' => true
            )
        ));
        $this->dbforge->create_table('question_tag_categories', true);
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