<?php

class Book_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getBooks($perPage, $pageNum)
    {
      $this->db->from('books');
      $this->db->where('deleted_at', null);
      $this->db->join('users', 'users.id = books.user_id', 'left');
      $this->db->order_by('books.created_at', 'desc');
      $this->db->limit($perPage, $perPage * $pageNum);
      $query = $this->db->get();
      return $query->result_array();
    }

    public function countBooks()
    {
      $this->db->where('deleted_at', null);
      $this->db->order_by('created_at', 'desc');
      $query = $this->db->get('books');
      return count($query->result_array());
    }

    public function storeBooks($booksArray)
    {
      return $this->db->insert_batch('books', $booksArray);
    }
}