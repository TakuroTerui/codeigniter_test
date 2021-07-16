<?php
class DailyReport extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('daily_report_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
    }

    public function index()
    {
        // Paginationライブラリ
        $this->load->library('pagination');
        // コントローラーでしかわからない設定を追加
        $config['base_url'] = 'http://localhost:8080/report';			// 基準URL
        // $config['total_rows'] = count($data['dailyReports']);	// ページ数
        $config['total_rows'] = 5;	// ページ数
        $config['per_page'] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $perPage = $config['per_page'];
        $pageNum = $this->input->get('page');
        if (isset($pageNum)) {
            $pageNum -- ;
        } else {
            $pageNum = 0;
        }
        $data['dailyReports'] = $this->daily_report_model->getAllDailyReports($perPage, $pageNum);

        $this->load->view('templates/user_header');
        $this->load->view('user/daily_report/index', $data);
        $this->load->view('templates/user_footer');
    }

    public function create()
    {
        $this->load->library('form_validation');
        $this->load->helper('url');

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
            $this->daily_report_model->createReport();
            redirect('/report');
        }
    }

    public function edit($id)
    {
        $this->load->library('form_validation');
        $this->load->helper('url');

        $data['dailyReport'] = $this->daily_report_model->getDailyReport($id);
        $data['dailyReport']['reporting_time'] = date('Y-m-d', strtotime($data['dailyReport']['reporting_time']));

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
            $this->load->view('user/daily_report/edit_daily_report', $data);
            $this->load->view('templates/user_footer');
          }
          else {
            $this->daily_report_model->editReport($id);
            redirect('/report');
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