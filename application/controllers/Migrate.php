<?php

class Migrate extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //ターミナルからの実行でなければ処理しない。
        if(! $this->input->is_cli_request()) {
            show_404();
            exit;
        }
        $this->load->library('migration');
    }

    public function index()
    {
        if ($this->migration->latest() === FALSE)
        {
            show_error($this->migration->error_string());
        }
    }

      public function rollback($version)
    {
        if ($this->migration->version($version)) {
            echo  "Migration Success.\n";
        } else {
            show_error($this->migration->error_string());
        }
    }
}