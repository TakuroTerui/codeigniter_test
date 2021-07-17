<?php
class Question extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('question_model');
        $this->load->model('tag_category_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
    }

    public function index()
    {
      $data['categories'] = $this->tag_category_model->getCategories();
      $data['questions'] = $this->question_model->getQuestions();
      var_dump($data['questions'][0]);
        // // Paginationライブラリ
        // $this->load->library('pagination');
        // $config['base_url'] = 'http://localhost:8080/report';			// 基準URL
        // $config['per_page'] = 10;			// 1ページあたりのレコード数

        // $perPage = $config['per_page'];
        // $pageNum = $this->input->get('page');
        // if (isset($pageNum)) {
        //   $pageNum -- ;
        // } else {
        //   $pageNum = 0;
        // }

        // $data['serchDate'] = $this->input->get('reporting_time');

        // $data['dailyReports'] = $this->daily_report_model->serchDailyReports($perPage, $pageNum);

        // $config['total_rows'] = $this->daily_report_model->countDailyReports();	// ページ数
        // $this->pagination->initialize($config);
        // $data['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/user_header');
        $this->load->view('user/question/index', $data);
        $this->load->view('templates/user_footer');
    }
}