<?php

class Comment_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getComments($id)
    {
        $this->db->from('comments');
        $this->db->where('comments.deleted_at', null);
        $this->db->where('question_id', $id);
        $this->db->join('users', 'users.id = comments.user_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function createComment($userId, $id)
    {
      $today = date("Y-m-d H:i:s");

      $data = array(
          'user_id' => $userId,
          'question_id' => $id,
          'content' => $this->input->post('comment'),
          'created_at' => $today,
          'updated_at' => $today
      );

      return $this->db->insert('comments', $data);
      }
}