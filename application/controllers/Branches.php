<?php

class Branches extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "branches_v";
		$this->load->model("Branches_Model");
	}

	public function index()
	{
		$items = $this->Branches_Model->getAll();
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

	public function save()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("title", "Şubenin adı", "required|trim|is_unique[branches.title]");
		$this->form_validation->set_rules("location", "Şubenin konumu", "required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır.",
				"is_unique" => "<b>{field}</b> daha önceden kullanılmış."
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			$data = array(
				"title" => $this->input->post("title"),
				"is_active" => $this->input->post("status") ? 1 : 0,
				"location" =>$this->input->post("location")
			);

			$insert = $this->Branches_Model->add($data);

			if($insert)
			{
				redirect(base_url("Branches"));
			} else {
				echo "Şube Ekleme İşlemi Sırasında Bir Hata Oluştu.";
			}
		} else {
			$viewData = new stdClass();
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "add";
			$viewData->formError = true;
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}
	}
}




?>