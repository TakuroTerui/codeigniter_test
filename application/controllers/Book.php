<?php
class Book extends CI_Controller {

    const BOOKS_TABLE_COLUMN = [
      'id',
      'user_id',
      'title',
      'author',
      'publisher',
      'price',
      'purchase_date',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('book_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('session');

        if($this->session->userdata('logged_in') == false | $this->session->userdata('admin') == 0){
          redirect('login');
        }
    }

    public function index()
    {
        $data['successMessage'] = '';
        $this->load->library('pagination');

        $perPage = 10;
        $pageNum = $this->input->get('page');
        if (isset($pageNum)) {
          $pageNum -- ;
        } else {
          $pageNum = 0;
        }
        $data['books'] = $this->book_model->getBooks($perPage, $pageNum);

        $config['total_rows'] = $this->book_model->countBooks();	// ページ数
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->form_validation->set_rules('csvfile', 'csvfile', 'callback__check_file_exist|callback__check_file_size|callback__check_file_format');

        if (!$this->form_validation->run()) {
            $this->load->view('templates/admin_header');
            $this->load->view('admin/book/index', $data);
            $this->load->view('templates/admin_footer');
          }
        else {
            $insertCount = $this->upload();
            $data['successMessage'] = $insertCount . '件登録しました。';
            $this->load->view('templates/admin_header');
            $this->load->view('admin/book/index', $data);
            $this->load->view('templates/admin_footer');
        }
    }

    public function upload()
    {
        $tmp_name = $_FILES['csvfile']['tmp_name'];
        $fileName = $_FILES['csvfile']['name'];
        $file = new SplFileObject($tmp_name);
        $file->setFlags(SplFileObject::READ_CSV);
        foreach ($file as $line) {
            $records[] = $line;
          }
        $shiftRecords = array_shift($records);

        $count = 0;
        foreach ($records as $record) {
            if (!is_null($record[0])) {
                $booksArray[] = array(
                  'user_id' => $record[1],
                  'title' => $record[2],
                  'author' => $record[3],
                  'publisher' => $record[4],
                  'price' => $record[5],
                  'purchase_date' => $record[6],
                  'created_at' => date("Y-m-d H:i:s"),
                  'updated_at' => date("Y-m-d H:i:s")
                );
            }
            if (count($record) < count(self::BOOKS_TABLE_COLUMN)) {
              log_message('error', '[CSV取り込み失敗]ファイル名：' . $fileName . ', 行数：' . $count . ', 内容：カラム数が不足しています。');
              redirect('book');
            }
            $count++;
        }
        $this->book_model->storeBooks($booksArray);
        $insertCount = count($booksArray);
        log_message('info', '[CSV取り込み成功]ファイル名：' . $fileName . ', 件数：' . $insertCount . '件');
        return $insertCount;
    }

    public function _check_file_size()
    {
        $fileSize = $_FILES['csvfile']['size'];
        $upperFileSize = 110;
        if ($fileSize < $upperFileSize * 1000) {
          return TRUE;
        }

        $this->form_validation->set_message('_check_file_size', '上限：' . $upperFileSize . 'KB以内にしてください。');
        return FALSE;
    }

    public function _check_file_format()
    {
        $fileFormat = $_FILES['csvfile']['type'];
        $defaultFileFormat = 'text/csv';
        if ($fileFormat === $defaultFileFormat) {
          return TRUE;
        }

        $this->form_validation->set_message('_check_file_format', '拡張子：CSVファイルを選択して下さい。');
        return FALSE;
    }

    public function _check_file_exist()
    {
        if (isset($_FILES['csvfile'])) {
          return TRUE;
        }

        $this->form_validation->set_message('_check_file_exist', '未入力 : 入力必須の項目です。');
        return FALSE;
    }
}