<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Firebase\Firebase;

class CFirebase extends CI_Controller {
    var $firebase_url;
    var $firebase_secret;

	public function __construct()
    {
        parent::__construct();
	    $this->load->model('Mdata');  
        $this->firebase_url="https://trukonet-12a70-default-rtdb.asia-southeast1.firebasedatabase.app";
        $this->firebase_secret='ttc90v6OxoZtic5ggTgCIIE6cAAXjvJBFZk0x9MO';
    }
	public function index()
	{
		$this->load->view('firebase');

	}
	public function add_data()
	{
		$fb = Firebase::initialize($this->firebase_url, $this->firebase_secret);
	    $d = [
	        "notif" => "0",
	        "tipe" => "0",
	    ];
	    $a = $fb->push('/data', $d);
		echo json_encode($a);
		
	}
	public function get_data()
	{
		$fb = Firebase::initialize($this->firebase_url, $this->firebase_secret);
	    $a = $fb->get('/data');
		echo json_encode($a);
		
	}
	public function update_data()
	{
		$key = $this->input->get("key");
		$fb = Firebase::initialize($this->firebase_url, $this->firebase_secret);
		 $d = [
	        "notif" => "1",
	        "tipe" => "0",
	    ];
	    $a = $fb->update('/data/'.$key, $d);
		echo json_encode($a);
		
	}
	public function delete_data()
	{
		$key = $this->input->get("key");
		$fb = Firebase::initialize($this->firebase_url, $this->firebase_secret);
		 $d = [
	        "notif" => "1",
	        "tipe" => "0",
	    ];
	    $a = $fb->delete('/data/'.$key, $d);
		echo json_encode($a);
		
	}
}
