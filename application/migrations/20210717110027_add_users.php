<?php
/**
 * questionsテーブルを追加する
 * Class Migration_add_users
 */
class Migration_add_users extends CI_Migration
{

    /**
     * migrationの実行
     */
    public function up()
    {
        $data = array(
            array(
              'name'          => '坂田 聖史',
              'email'         => 'hoge@gmail.com',
              'avatar'        => 'hoge',
              'created_at'    => date("Y-m-d H:i:s")
              ),
              array(
                'name'          => 'Daichi Ando',
                'email'         => 'a24arc.ad@gmail.com',
                'avatar'        => 'https://avatars.slack-edge.com/2019-01-11/521652138498_a80d324258d73c87ad2e_192.jpg',
                'created_at'    => date("Y-m-d H:i:s")
              ),
              array(
                'name'          => '金谷 翔平',
                'email'         => 'foo@gmail.com',
                'avatar'        => 'foo',
                'created_at'    => date("Y-m-d H:i:s")
              )
        );

        $this->db->insert_batch('users', $data);
    }

    /**
     * collbackの実行
     * newsテーブルのdrop
     */
    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}