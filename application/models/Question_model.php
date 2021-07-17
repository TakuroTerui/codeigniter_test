<?php

class Question_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getQuestions()
    {
        $this->db->from('questions');
        // $this->db->join('tag_categories', 'tag_categories.id = questions.tag_category_id', 'left');
        // $this->db->join('users', 'users.id = questions.user_id', 'left');
        $this->db->join('comments', 'comments.question_id = questions.id');
        $query = $this->db->get();
        // $query = $this->db->get('questions');
        return $query->result_array();
    }
}