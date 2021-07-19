<?php

class Question_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function serchQuestions()
    {
        $serchWord = $this->input->get('search_word');
        $tagCategoryId = $this->input->get('tag_category_id');
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
        $query = $this->db->get();
        return $query->result_array();
      }

    public function countQuestions()
    {
        $query = $this->db->get('questions');
        return count($query->result_array());
    }
}