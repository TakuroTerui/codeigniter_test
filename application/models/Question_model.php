<?php

class Question_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function serchQuestions($perPage, $pageNum)
    {
        $tagCategoriesName = '(select id as question_id, GROUP_CONCAT(test.name) as categories_name from questions left outer join (select question_id, name from question_tag_categories left outer join tag_categories on tag_categories.id = question_tag_categories.tag_category_id) as test on test.question_id = questions.id group by id)';
        $serchWord = $this->input->get('search_word');
        $tagCategoryId = $this->input->get('tag_category_id');
        $this->db->select('*, questions.id AS question_pk');
        $this->db->from('questions');
        $this->db->where('questions.deleted_at', null);
        $this->db->order_by('questions.created_at', 'desc');
        $this->db->join($tagCategoriesName . ' as categories_name', 'categories_name.question_id = questions.id', 'left');
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
        $tagCategoriesName = '(select id as question_id, GROUP_CONCAT(test.name) as categories_name from questions left outer join (select question_id, name from question_tag_categories left outer join tag_categories on tag_categories.id = question_tag_categories.tag_category_id) as test on test.question_id = questions.id group by id)';
        $this->db->select('*, questions.id AS question_pk');
        $this->db->from('questions');
        $this->db->where('questions.deleted_at', null);
        $this->db->where('questions.user_id', $userId);
        $this->db->order_by('questions.created_at', 'desc');
        $this->db->join($tagCategoriesName . ' as categories_name', 'categories_name.question_id = questions.id', 'left');
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
        $tagCategoriesName = '(select id as question_id, GROUP_CONCAT(test.name) as categories_name from questions left outer join (select question_id, name from question_tag_categories left outer join tag_categories on tag_categories.id = question_tag_categories.tag_category_id) as test on test.question_id = questions.id group by id)';
        $this->db->select('*, , questions.id AS question_pk');
        $this->db->from('questions');
        $this->db->where('questions.deleted_at', null);
        $this->db->where('questions.id', $id);
        $this->db->order_by('questions.created_at', 'desc');
        $this->db->join($tagCategoriesName . ' as categories_name', 'categories_name.question_id = questions.id', 'left');
        $this->db->join('users', 'users.id = questions.user_id', 'left');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function editQuestion($id, $userId)
    {
        $tagCategoriesName = '(select id as question_id, GROUP_CONCAT(test.name) as categories_name from questions left outer join (select question_id, name from question_tag_categories left outer join tag_categories on tag_categories.id = question_tag_categories.tag_category_id) as test on test.question_id = questions.id group by id)';
        $this->db->select('*, , questions.id AS question_pk');
        $this->db->from('questions');
        $this->db->where('questions.id', $id);
        $this->db->where('user_id', $userId);
        $this->db->join($tagCategoriesName . ' as categories_name', 'categories_name.question_id = questions.id', 'left');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function storeQuestion($userId)
    {
        $today = date("Y-m-d H:i:s");

        $data = array(
            'user_id' => $userId,
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'created_at' => $today,
            'updated_at' => $today
        );

        $this->db->insert('questions', $data);
        return $this->db->insert_id();
    }

    public function updateQuestion($id)
    {
        $today = date("Y-m-d H:i:s");

        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'updated_at' => $today
        );

        return $this->db->where('id', $id)->update('questions', $data);
    }

    public function deleteQuestion($id)
    {
        $today = date("Y-m-d H:i:s");

        $data = array(
            'updated_at' => $today,
            'deleted_at' => $today
        );

        return $this->db->where('id', $id)->update('questions', $data);
    }
}