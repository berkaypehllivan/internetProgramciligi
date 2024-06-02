<?php

class Users_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add($data = array()) {
        return $this->db->insert("users", $data);
    }

    public function getAll($order="id ASC") {
        return $this->db->order_by($order)->get("users")->result();
    }

    public function get($where=array()) {
        return $this->db->where($where)->get("users")->row();
    }

    public function delete($where=array()) {
        return $this->db->where($where)->delete("users");
    }

    public function update($where = array(), $data = array()) {
        return $this->db->where($where)->update("users", $data);
    }

    public function check_login($email, $password) {
        // Kullanıcıyı e-posta adresine göre bul
        $this->db->where('email', $email);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            $user = $query->row();
            // Veritabanındaki MD5 hash ile karşılaştır
            if ($user->password == md5($password)) {
                return $user;
            }
        }
        return false;
    }
}
