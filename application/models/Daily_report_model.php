<?php

class Daily_report_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    protected $dates = [
      'reporting_time'
    ];

    protected $casts = [
      'reporting_time' => 'datetime',
    ];

    public function createReport()
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

      public function getDailyReport($id)
      {
          $query = $this->db->get_where('daily_reports', array('id' => $id));
          return $query->row_array();
      }

      public function editReport($id)
      {
        $today = date("Y-m-d H:i:s");

        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'reporting_time' => $this->input->post('date'),
            'update_at' => $today
        );

        return $this->db->where('id', $id)->update('daily_reports', $data);
        }
}