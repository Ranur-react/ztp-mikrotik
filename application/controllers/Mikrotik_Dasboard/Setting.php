<?php

/**
 * 
 */
class Setting extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MLogin', 'DbLogin');
    $this->load->model('MBlokir');
  }


  public function index()
  {
      $bridgename='bridgelocal';
   $this->MembuatBridgebaru($bridgename);
   $this->MenambahportBridgeLocal($bridgename,'ether3');
   $this->MenambahportBridgeLocal($bridgename,'ether4');
   $this->MenambahportBridgeLocal($bridgename,'ether5');
  }
  public function MembuatBridgebaru($bridgename)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/interface/bridge/add"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      'name' => $bridgename
    );;
    $this->mikapi->write($Code, $data);
  }
  public function MenambahportBridgeLocal($bridgename,$ether)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/interface/bridge/port/add"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      'interface' => $ether,
      'bridge'=>$bridgename,
    );;
    $this->mikapi->write($Code, $data);
  }
}
