<?php

class Tag_category_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getCategories()
    {
        $query = $this->db->get('tag_categories');
        return $query->result_array();
    }
    
}