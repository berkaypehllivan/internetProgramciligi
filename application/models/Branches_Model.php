<?php

class Branches_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add($data = array()) {

        return $this->db->insert("branches", $data);
}

public function getAll($order="id ASC") {
    return $this->db->order_by($order)->get("branches")->result();
}

}