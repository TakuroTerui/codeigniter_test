<?php

class Question_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function serchQuestions($perPage, $pageNum)
    {
        $serchWord = $this->input->get('search_word');
        $tagCategoryId = $this->input->get('tag_category_id');
        $this->db->select('*, tag_categories.name AS category_name, questions.id AS question_pk');
        $this->db->from('questions');
        $this->db->where('questions.deleted_at', null);
        $this->db->order_by('questions.created_at', 'desc');
        $this->db->join('tag_categories', 'tag_categories.id = questions.tag_category_id', 'left');
        $this->db->join('users', 'users.id = questions.user_id', 'left');
        $this->db->join('(SELECT question_id, COUNT(*) AS cnt FROM comments GROUP BY question_id) as comments', 'comments.question_id = questions.id', 'left outer');
        if (isset($serchWord) && $serchWord!== '') {
          $this->db->like('questions.title', $serchWord, 'both');
        }
        if (isset($tagCategoryId) && $tagCategoryId!== '') {
          $this->db->where('tag_category_id', $tagCategoryId);
        }
        $this->db->limit($perPage, $perPage * $pageNum);
        $query = $this->db->get();
        return $query->result_array();
      }

    public function countQuestions()
    {
        $query = $this->db->get('questions');
        return count($query->result_array());
    }

    public function getByUserId($perPage, $pageNum, $userId)
    {
        $this->db->select('*, tag_categories.name AS category_name');
        $this->db->from('questions');
        $this->db->where('questions.deleted_at', null);
        $this->db->where('questions.user_id', $userId);
        $this->db->order_by('questions.created_at', 'desc');
        $this->db->join('tag_categories', 'tag_categories.id = questions.tag_category_id', 'left');
        $this->db->join('users', 'users.id = questions.user_id', 'left');
        $this->db->join('(SELECT question_id, COUNT(*) AS cnt FROM comments GROUP BY question_id) as comments', 'comments.question_id = questions.id', 'left outer');
        $this->db->limit($perPage, $perPage * $pageNum);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function deleteReport($id)
    {
      $today = date("Y-m-d H:i:s");

      $data = array(
          'update_at' => $today,
          'deleted_at' => $today
      );

      return $this->db->where('id', $id)->update('questions', $data);
    }

    public function getQuestion($id)
    {
        $this->db->select('*, tag_categories.name AS category_name');
        $this->db->from('questions');
        $this->db->where('questions.deleted_at', null);
        $this->db->where('questions.id', $id);
        $this->db->order_by('questions.created_at', 'desc');
        $this->db->join('tag_categories', 'tag_categories.id = questions.tag_category_id', 'left');
        $this->db->join('users', 'users.id = questions.user_id', 'left');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function editQuestion($id, $userId)
    {
        $this->db->select('*, tag_categories.name AS category_name');
        $this->db->from('questions');
        $this->db->where('questions.id', $id);
        $this->db->where('user_id', $userId);
        $this->db->join('tag_categories', 'tag_categories.id = questions.tag_category_id', 'left');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function storeQuestion($userId)
    {
        $today = date("Y-m-d H:i:s");

        $data = array(
            'user_id' => $userId,
            'tag_category_id' => $this->input->post('tag_category_id'),
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'created_at' => $today,
            'updated_at' => $today
        );

        return $this->db->insert('questions', $data);
    }

    public function updateQuestion($id)
    {
        $today = date("Y-m-d H:i:s");

        $data = array(
            'tag_category_id' => $this->input->post('tag_category_id'),
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'updated_at' => $today
        );

        return $this->db->where('id', $id)->update('questions', $data);
    }
}