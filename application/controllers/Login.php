<?php
class Login extends CI_Controller {

    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Users_Model");
    }

    public function index()
    {
        $this->load->view("Login_View");
    }

    public function authenticate()
    {
        /* $user = $this->Login_Model->getUser($email, $password); */

        $user = $this->Users_Model->get(
            array(
                "email" => $this->input->post("email"),
                "password" => $this->input->post("password"),
            )
        );

        


        if($user)
        {
            $this->session->set_userdata("user", $user);

            redirect(base_url("Welcome"));
        } else 
        {
            $this->session->set_flashdata("error", "Geçersiz Kullanıcı Adı veya Şifre");z
            redirect(base_url("Login"));
        } 
    }
}
?>
