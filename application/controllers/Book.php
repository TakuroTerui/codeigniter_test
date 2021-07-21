<?php
class Book extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('daily_report_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index()
    {
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
        $tmp_name = $_FILES['csvfile']['tmp_name'];
        var_dump(file_get_contents($tmp_name));
        $this->load->view('templates/admin_header');
        $this->load->view('admin/book/index', array('error' => ' ' ));
        $this->load->view('templates/admin_footer');
    }

    public function do_upload()
    {
        $config['upload_path']          = '../';
        $config['allowed_types']        = 'csv|text';
        $config['max_size']             = 10000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        // if ( ! $this->upload->do_upload('csvfile'))
        if (true)
        {
                $error = array('error' => $this->upload->display_errors());

                // $this->load->view('upload_form', $error);
                $this->load->view('templates/admin_header');
                $this->load->view('admin/book/index', array('error' => ' ' ));
                $this->load->view('templates/admin_footer');
        }
        else
        {
                // $data = array('upload_data' => $this->upload->data());

                redirect('success');
        }
    }
}