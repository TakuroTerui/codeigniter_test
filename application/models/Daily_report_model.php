<?php

class Daily_report_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function create_report()
    {
      $today = date("Y-m-d H:i:s");

      $data = array(
          'user_id' => 1,
          'title' => $this->input->post('title'),
          'content' => $this->input->post('content'),
          'reporting_time' => $this->input->post('date'),
          'created_at' => $today,
          'update_at' => $today
      );

      return $this->db->insert('daily_reports', $data);
      }
}