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

      public function deleteReport($id)
      {
        $today = date("Y-m-d H:i:s");

        $data = array(
            'update_at' => $today,
            'deleted_at' => $today
        );

        return $this->db->where('id', $id)->update('daily_reports', $data);
      }

      public function serchDailyReports($perPage, $pageNum)
      {
          $serchDate = $this->input->get('reporting_time');
          $this->db->limit($perPage, $perPage * $pageNum);
          $this->db->order_by('reporting_time', 'desc');
          if (isset($serchDate)) {
            $this->db->like('reporting_time', $serchDate, 'both');
          }
          $this->db->where('deleted_at', null);
          $query = $this->db->get('daily_reports');
          return $query->result_array();
      }

      public function countDailyReports()
      {
          $query = $this->db->get('daily_reports');
          return count($query->result_array());
      }
}