<?php

class Branches extends CI_Controller {

	public $viewFolder = "";
	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "Branches_v";
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

	public function update_form($id)
	{
		$item = $this->Branches_Model->get(
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
		$this->form_validation->set_rules("title", "Ürün kategori adı", "required|trim|is_unique[product_categories.title]");
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
				"is_active" => $this->input->post("status") ? 1 : 0
			);

			$update = $this->Branches_Model->update(
			array(
				"id" => $id), $data
			);
			if($update)
			{
				redirect(base_url("Branches"));
			} else
			{
				$item = $this->Branches_Model->get(
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
	}

	public function save()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("title", "Şubenin adı", "required|trim");
		$this->form_validation->set_rules("title", "Şubenin konumu", "required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır.",
			)
		);
	
		$validate = $this->form_validation->run();
	
		if($validate)
		{
			$data = array(
				"title" => $this->input->post("title"),
				"location" => $this->input->post("location"),
				"is_active" => $this->input->post("status") ? 1 : 0
			);
	
			$insert = $this->Branches_Model->add($data);

			if($insert) 
			{
				redirect(base_url("Branches"));
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
		
		$this->Branches_Model->delete($data);

		redirect(base_url("Branches"));
	}
	
}




?>