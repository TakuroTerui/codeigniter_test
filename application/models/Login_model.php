<?php

class Login_model extends CI_Model{
    // バリデーション
    function validate($email, $password) {
        $this->db->where('email',$email); // SELECT * FROM users WHERE email = '$email'と同義
        $this->db->where('password', $password); // SELECT * FROM users WHERE password = '$password'と同義
        $result = $this->db->get('users',1);  // usersテーブルから情報を取得。第2引数は LIMIT 1。
        return $result;
    }
}