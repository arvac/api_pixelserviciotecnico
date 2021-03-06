<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'/libraries/REST_Controller.php');
use Restserver\libraries\REST_Controller;
class Productos extends REST_Controller {
public function __construct(){
	header("Access-Control-Allow-Methods:GET");
	header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
	header("Access-Control-Allow-Origin: *");
	parent::__construct();
	$this->load->database();
}
public function todos_get($pagina=0){
    $pagina=$pagina*10;
    $query = $this->db->query('SELECT * FROM `productos` limit '.$pagina.',10');
    
   $respuesta=array(
     'error'=>FALSE,
     'productos'=>$query->result_array()

 );

  $this->response($respuesta);

}

public function portipo_get($tipo=0,$pag=0){

    if($tipo ==0){
        $repuesta=array('error'=>TRUE,'mensaje'=>'No existe este elemento'.$index);
        $this->response($repuesta,REST_Controller::HTTP_BAD_REQUEST);
        return;
       }
    $pag=$pag*10;
    $query = $this->db->query('SELECT * FROM `productos` where linea_id='.$tipo.' limit '.$pag.',10');
    
   $respuesta=array(
     'error'=>FALSE,
     'productos'=>$query->result_array()

 );

  $this->response($respuesta);

}
public function buscar_get($termino="no especifico"){
    $query =$this->db->query("SELECT * FROM `productos` where producto like '%".$termino."%'");
    $repuesta=array(
        'error'=>FALSE,
        'termino'=>$termino,
        'productos'=>$query->result_array()
    );
    $this->response($repuesta);
}


  
}