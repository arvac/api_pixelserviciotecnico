<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'/libraries/REST_Controller.php');
use Restserver\libraries\REST_Controller;
class Prueba extends REST_Controller {
public function __construct(){
	header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
	header("Access-Control-Allow-Origin: *");
	parent::__construct();
	$this->load->database();
}
	
	public function index()
	{
		echo "de prueba";
	}
	public function arreglo_get($index=0){
		if($index > 2){
		 $repuesta=array('error'=>TRUE,'mensaje'=>'No existe este elemento'.$index);
		 $this->response($repuesta,REST_Controller::HTTP_BAD_REQUEST);
		}else{
			$arreglo=array("pilas","cargadores","micas");
			//echo json_encode($arreglo[$index]);
			$repuesta=array('error'=>FALSE,'repuesto'=>$arreglo[$index]);
			$this->response($repuesta);
		}
		//$this->response($repuesta);
	}
	public function obtener_get($codigo){
	
		$query = $this->db->query("SELECT * FROM `productos` where codigo = '".$codigo."'");
		echo json_encode($query->result());
	}
}
