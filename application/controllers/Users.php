<?php

class Users extends CI_Controller {

	public $viewFolder = "";
	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "Users_v";
		$this->load->model("Users_Model");
	}

	public function index()
	{
		$items = $this->Users_Model->getAll();
		$viewData = new stdClass();
		$viewData->items = $items;
		$viewData->subViewFolder = "list";
		$viewData->viewFolder = $this->viewFolder;
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}

	public function new_form()
	{
		$viewData = new stdClass();
		$viewData->subViewFolder = "add";
		$viewData->viewFolder = $this->viewFolder;
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}

	public function update_form($id)
	{
		$item = $this->Users_Model->get(
			array(
				"id" => $id
			)
		);

		$viewData = new stdClass();
		$viewData->subViewFolder = "update";
		$viewData->viewFolder = $this->viewFolder;
		$viewData->item = $item;
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}

	public function update($id)
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules(
			"email",
			"Kullanıcı adı",
			"required|trim|valid_email|callback_is_unique_email[$id]"
		);
		$this->form_validation->set_rules("name", "İsim", "required|trim");
		$this->form_validation->set_rules("surname", "Soyisim", "required|trim");

		if (!empty($this->input->post("password"))) {
			$this->form_validation->set_rules("password", "Şifre", "required|trim");
			$this->form_validation->set_rules("re-password", "Şifre Tekrarı", "required|trim|matches[password]");
		}

		$this->form_validation->set_message(
        array(
            "required" => "<b>{field}</b> alanı doldurulmalıdır.",
            "valid_email" => "<b>{field}</b> geçerli bir e-posta değildir.",
            "is_unique" => "<b>{field}</b> daha önceden sistemde kayıtlıdır.",
            "matches" => "Şifreler birbiriyle uyuşmuyor."
        )
		);
	
		$validate = $this->form_validation->run();
	
		if($validate)
		{
			$data = array(
				"email"     => $this->input->post("email"),
				"name"      => $this->input->post("name"),
				"surname"   => $this->input->post("surname"),
				"password"   => md5($this->input->post("password")),
				"is_active" => 1
			);

			$update = $this->Users_Model->update(
			array(
				"id" => $id), $data
			);

			if ($update) {
				redirect(base_url("Users"));
			} else {
				echo "Başarısız...";
			}
		}
		else
		{
			$item = $this->Users_Model->get(
				array(
					"id" => $id
				)
			);

				$viewData = new stdClass();
				$viewData->viewFolder = $this->viewFolder;
				$viewData->subViewFolder = "update";
				$viewData->formError = true;

				$this->load->view("($viewData->viewFolder)/($viewData->subViewFolder)/index", $viewData);	
			}
	}

	public function is_unique_email($email, $id)
	{
		$existing_email = $this->Users_Model->get(array("id !=" => $id,"email" => $email));

		if($existing_email)
		{
			$this->form_validation->set_message("is_unique_email", "The {field} is already registered");
			return false;
		} else {
			return true;
		}

	}

	public function save()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Kullanıcı Adı", "required|trim|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("name", "İsim", "required|trim");
		$this->form_validation->set_rules("surname", "Soyisim", "required|trim");
		$this->form_validation->set_rules("password", "Şifre", "required|trim");
		$this->form_validation->set_rules("re-password", "Şifre Tekrarı", "required|trim|matches[password]");
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır.",
				"valid_email" => "<b>{field}</b> alanı geçerli bir eposta adresi değildir.",
				"is_unique" => "<b>{field}</b> alanı daha önceden kayıtlı bir eposta ile eşleşmektedir.",
				"matches" => "<b>{field}</b> alanı şifreyle aynı olmalıdır."
			)
		);
	
		$validate = $this->form_validation->run();
	
		if($validate)
		{
			$data = array(
				"email" => $this->input->post("email"),
				"name" => $this->input->post("name"),
				"surname" => $this->input->post("surname"),
				"password" => $this->input->post("password"),
				"is_active" => $this->input->post("status") ? 1 : 0
			);
	
			$insert = $this->Users_Model->add($data);

			if($insert) 
			{
				redirect(base_url("Users"));
			} else
			{
				echo "Kayıt Ekleme Sırasında Bir Hata Oluştu.";
			}
		} else
		{
			$viewData = new stdClass();
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "add";
			$viewData->formError = true;
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}
	}

	public function delete($id)
	{
		$data = array(
			"id" => $id);
		
		$this->Users_Model->delete($data);

		redirect(base_url("Users"));
	}
	
}




?>