<?php
class Question extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('question_model');
        $this->load->model('tag_category_model');
        $this->load->model('comment_model');
        $this->load->model('user_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        // // Paginationライブラリ
        $this->load->library('pagination');
        $config['base_url'] = 'http://localhost:8080/question';			// 基準URL
        $config['per_page'] = 10;			// 1ページあたりのレコード数

        $perPage = $config['per_page'];
        $pageNum = $this->input->get('page');
        if (isset($pageNum)) {
          $pageNum -- ;
        } else {
          $pageNum = 0;
        }

        $data['categories'] = $this->tag_category_model->getCategories();
        $data['questions'] = $this->question_model->serchQuestions($perPage, $pageNum);
        $config['total_rows'] = $this->question_model->countQuestions();	// ページ数
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        // $this->output->enable_profiler(TRUE);
        $this->load->view('templates/user_header');
        $this->load->view('user/question/index', $data);
        $this->load->view('templates/user_footer');
    }

    public function show($id = Null)
    {
        $data['question'] = $this->question_model->getQuestion($id);
        $data['comments'] = $this->comment_model->getComments($id);

        $this->form_validation->set_rules('comment', '100', 'required|max_length[100]',
            array(
                'max_length' => '%s文字以内で入力してください。',
                'required' => '入力必須の項目です。'));

        if (!$this->form_validation->run()) {
            $this->load->view('templates/user_header');
            $this->load->view('user/question/show', $data);
            $this->load->view('templates/user_footer');
        }
        else {
            $userId = 1;   //自分のユーザーID(仮)
            $this->comment_model->createComment($userId, $id);
            redirect('/question/' . $id);
        }
    }

    public function create()
    {
        $userId = 1;   //自分のユーザーID(仮)
        $data['categories'] = $this->tag_category_model->getCategories();
        $data['user'] = $this->user_model->getUserInfo($userId);

        $this->form_validation->set_rules('tag_category_id', 'date', 'required|callback__check_input_category_id',
            array(
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
            $this->load->view('user/question/create', $data);
            $this->load->view('templates/user_footer');
        }
        else {
          $data['input'] = $this->input->post();
            $this->load->view('templates/user_header');
            $this->load->view('user/question/confirm', $data);
            $this->load->view('templates/user_footer');
        }
    }

    public function mypage()
    {
        $userId = 1;   //自分のユーザーID(仮)
        // // Paginationライブラリ
        $this->load->library('pagination');
        $config['base_url'] = 'http://localhost:8080/question/mypage';			// 基準URL
        $config['per_page'] = 10;			// 1ページあたりのレコード数

        $perPage = $config['per_page'];
        $pageNum = $this->input->get('page');
        if (isset($pageNum)) {
          $pageNum -- ;
        } else {
          $pageNum = 0;
        }

        $data['questions'] = $this->question_model->getByUserId($perPage, $pageNum, $userId);
        $config['total_rows'] = $this->question_model->countQuestions();	// ページ数
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        // $this->output->enable_profiler(TRUE);
        $this->load->view('templates/user_header');
        $this->load->view('user/question/mypage', $data);
        $this->load->view('templates/user_footer');
    }

    public function delete($id = Null)
    {
        $this->question_model->deleteQuestion($id);

        redirect('/question/mypage');
    }

    public function edit($id = Null)
    {
        $userId = 1;   //自分のユーザーID(仮)
        $data['question'] = $this->question_model->editQuestion($id, $userId);
        $data['categories'] = $this->tag_category_model->getCategories();
        $data['user'] = $this->user_model->getUserInfo($userId);

        $this->form_validation->set_rules('tag_category_id', 'date', 'required|callback__check_input_category_id',
            array(
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
            $this->load->view('user/question/edit', $data);
            $this->load->view('templates/user_footer');
        }
        else {
            $data['input'] = $this->input->post();
            $this->load->view('templates/user_header');
            $this->load->view('user/question/confirm', $data);
            $this->load->view('templates/user_footer');
        }
    }

    public function store()
    {
        $userId = 1;   //自分のユーザーID(仮)
        $this->question_model->storeQuestion($userId);

        redirect('/question/mypage');
    }

    public function update($id = Null)
    {
        $this->question_model->updateQuestion($id);

        redirect('/question/mypage');
    }

    public function _check_input_category_id($date)
    {
        $Categories = $this->tag_category_model->getCategories();
        foreach ($Categories as $Category) {
          if ($date === $Category['id']) {
             return TRUE;
          }
        }

        $this->form_validation->set_message('_check_input_category_id', 'カテゴリが存在しません。');
        return FALSE;
    }
}