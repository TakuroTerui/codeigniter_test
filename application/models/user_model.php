<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getUserInfo($userId)
    {
        $this->db->where('id', $userId);
        $query = $this->db->get('users');
        return $query->row_array();
    }
}