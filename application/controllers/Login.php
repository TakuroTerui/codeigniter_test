<?php

class Login extends CI_Controller{

    function __construct(){
        parent::__construct();
        // モデルの読み込み
        $this->load->model('Login_model');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->helper('url');
    }

    function index(){

        // ログイン判定
        if($this->session->userdata('logged_in') !== TRUE){
            // ログインビューを読み込み
            $this->load->view('user/login_view');

        }else{
            // ログイン済みの場合はダッシュボードへリダイレクト
            redirect('question');
        }
    }

    function auth(){

        // POSTされたデータを格納
        $email      =   $this->input->post('email', TRUE);
        $password   =   $this->input->post('password', TRUE);
        // $password   =   md5($this->input->post('password', TRUE));
        // バリデーション
        $validate   =   $this->Login_model->validate($email, $password);

        if($validate->num_rows() > 0){

            $data           =   $validate->row_array(); // バリデーション結果を配列にして格納
            $user_id        =   $data['id'];       // ユーザーIDを格納
            $name           =   $data['name'];          // 名前を格納
            $email          =   $data['email'];         // メールアドレスを格納
            $logged_in      =   $data['logged_in'];     // ログイン状態TRUE FALSE

            // セッション配列に格納
            $sesdata = array(

                'user_id'       =>  $user_id,
                'name'          =>  $name,
                'email'         =>  $email,
                'logged_in'     =>  TRUE

            );
            // セッションのユーザーデータにセット
            $this->session->set_userdata($sesdata);
            // ダッシュボードにリダイレクト
            redirect('question');
        }else{
            // ログイン情報が一致しない場合はflashdataでメッセージを表示
            echo $this->session->set_flashdata('msg','ログイン情報に誤りがあります。');
            redirect('/login');
        }
    }

    // ログアウト用
    function logout(){

        // セッションを破棄
        $this->session->sess_destroy();
        redirect('login');
    }
}