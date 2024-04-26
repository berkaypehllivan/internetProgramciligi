<?php

class Brands extends CI_Controller {

	public $viewFolder = "";
	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "Brands_v";
		$this->load->model("Brands_Model");
	}

	public function index()
	{
		$items = $this->Brands_Model->getAll();
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
		$item = $this->Brands_Model->get(
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
		$this->form_validation->set_rules("title", "Marka adı", "required|trim");
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
				"is_active" => $this->input->post("status") ? 1 : 0
			);

			$update = $this->Brands_Model->update(
			array(
				"id" => $id), $data
			);
			if($update)
			{
				redirect(base_url("Brands"));
			} else
			{
				$item = $this->Brands_Model->get(
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
		$this->form_validation->set_rules("title", "Marka Adı", "required|trim|is_unique[brands.title]");
		$this->form_validation->set_rules("rank", "Marka Değeri", "required|trim");
		$this->form_validation->set_rules("price", "Marka Fiyatı", "required|trim");
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
				"rank" => $this->input->post("rank"),
				"price" => $this->input->post("price"),
				"is_active" => $this->input->post("status") ? 1 : 0
			);
	
			$insert = $this->Brands_Model->add($data);

			if($insert) 
			{
				redirect(base_url("Brands"));
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
		
		$this->Brands_Model->delete($data);

		redirect(base_url("Brands"));
	}
	
}




?>