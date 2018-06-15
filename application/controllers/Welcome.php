<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	
	 
	public function index()
	{	
		$this->load->helper('url');
		if ( $this->input->post('employee_name'))
		{
			// Load the SmartGrid Library
			$this->load->library('SmartGrid/Smartgrid');
			 $url = 'http://127.0.0.1:5000/tasks/' . $this->input->post('employee_name');
			//  Initiate curl
			$ch = curl_init();
			// Disable SSL verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			// Will return the response, if false it print the response
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Set the url
			curl_setopt($ch, CURLOPT_URL,$url);
			// Execute
			$result=curl_exec($ch);
			// Closing
			curl_close($ch);
			#var_dump(json_decode($result, true));
			// Will dump a beauty json :3
			$data = json_decode($result,true);
			
			// Column settings
			$data_list = array(
			);
			
			$data['cout_anger'] = $data[1]["ASD"]['anger'];
			$data['cout_joy'] = $data[1]["ASD"]['joy'];
			$data['cout_sadness'] = $data[1]["ASD"]['sadness'];
			$data['cout_fear'] = $data[1]["ASD"]['fear'];
			$data['cout_surprise'] = $data[1]["ASD"]['surprise'];
			$data['cout_disgust'] = $data[1]["ASD"]['disgust'];
			
			foreach($data[0]["tasks"] as $item) { //foreach element in $arr
				$data_list[] =  array("id"=> $item['id'], "data_asli"=> $item['komen'], "data_pp1"=> $item['asdqwe'], "data_pp"=> $item['komen_edit'], "data_prediksi"=> $item['prediksi'],
				);
				
			}
			
			// Column settings
			$columns = array(
				"id"=>array("header"=>"ID", "type"=>"label", "align"=>"left", "width"=>"70px"),
				"data_asli"=>array("header"=>"Komentar Asli", "type"=>"label", "align"=>"left", "width"=>"100px"),
				"data_pp1"=>array("header"=>"Komentar Pre-Processing", "type"=>"label", "align"=>"left", "width"=>"100px"),
				"data_pp"=>array("header"=>"Komentar Olahan", "type"=>"label", "align"=>"left", "width"=>"100px"),
				"data_prediksi"=>array("header"=>"Prediksi Emosi", "type"=>"label", "align"=>"left", "width"=>"100px")
			);
			// Config settings, optional
			$config = array("page_size"=> 100);
			
			// Set the grid
			$this->smartgrid->set_grid($data_list, $columns, $config);
			
			// Render the grid and assign to data array, so it can be print to on the view
			$data['grid_html'] = $this->smartgrid->render_grid();
			
			// Load view
			$this->load->view('example_smartgrid', $data);
		}
		else{
			// Load view
			$this->load->view('example_smartgridz');
		}
		
	}
}
