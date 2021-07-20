<?php

class Question_tag_categories_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function storeQuestionTagCategories($categoriesId, $questionId)
    {
      $data = array();
      foreach ($categoriesId as $categoryId) {
          $addData = array(
            'question_id' => $questionId,
            'tag_category_id' => $categoryId
          );
          array_push($data, $addData);
      }

      return $this->db->insert_batch('question_tag_categories', $data);
    }

    public function updateQuestionTagCategories($categoriesId, $id)
    {
      $this->db->where('question_id', $id)->delete('question_tag_categories');
      $data = array();
      foreach ($categoriesId as $categoryId) {
          $addData = array(
            'question_id' => $id,
            'tag_category_id' => $categoryId
          );
          array_push($data, $addData);
      }

      return $this->db->insert_batch('question_tag_categories', $data);
    }
}