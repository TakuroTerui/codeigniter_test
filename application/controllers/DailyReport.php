<?php
class DailyReport extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('daily_report_model');
        $this->load->helper('url_helper');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('date', 'date', 'required|callback__check_input_date',
            array(
                'max_length' => '%s文字以内で入力してください。',
                'required' => '入力必須の項目です。'));
        $this->form_validation->set_rules('title', '255', 'required|max_length[255]',
            array(
                'max_length' => '%s文字以内で入力してください。',
                'required' => '入力必須の項目です。'));
        $this->form_validation->set_rules('content', '1000', 'required|max_length[1000]',
            array(
                'max_length[1000]' => '%s文字以内で入力してください。',
                'required' => '入力必須の項目です。'));

        if (!$this->form_validation->run()) {
            $this->load->view('templates/user_header');
            $this->load->view('user/daily_report/create_daily_report');
            $this->load->view('templates/user_footer');
          }
          else {
            $this->daily_report_model->create_report();
            $this->load->view('templates/user_header');
            $this->load->view('user/daily_report/index');
            $this->load->view('templates/user_footer');
        }
    }

    public function _check_input_date($date)
    {
        $today = date("Y/m/d");
        if ($today < $date | isset($date)) {
           return TRUE;
        }

        $this->form_validation->set_message('_check_input_date', '今日以前の日付を選択してください。');
        return FALSE;
    }
}