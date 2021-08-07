<?php

/**
 * 
 */
class Reset extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MLogin', 'DbLogin');
    $this->load->model('MBlokir');
  }


  public function BridgeDefault()
  {
    $id = $this->ambilnumBRDG('bridge');
    $this->disableBRIDGEDEFAULT($id);
  }
  public function index()
  {
    // $id1 = $this->ambilnumBRDGPort('ether3');
    // $id2 = $this->ambilnumBRDGPort('ether4');
     $id3 = $this->ambilnumBRDGPort('wlan1');
     
    // $this->disableBRIDGEPort($id1);
    // $this->disableBRIDGEPort($id2);
    // $this->disableBRIDGEPort($id3);
  }
  public function ambilnumBRDGPort($i)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/interface/bridge/port/print"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      '?interface' => $i,
    );
    $datax = $this->mikapi->write($Code, $data);
    $d = $datax[0];
    return $d['.id'];
  }
  public function disableBRIDGEPort($i)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/interface/bridge/port/disable"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      '.id' => $i,
    );;
    $this->mikapi->write($Code, $data);
  }
  public function disableBRIDGEDEFAULT($i)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/interface/bridge/disable"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      '.id' => $i,
    );;
    $this->mikapi->write($Code, $data);
  }
  public function ambilnumBRDG($i)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/interface/bridge/print"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      '?name' => $i,
    );
    $datax = $this->mikapi->write($Code, $data);
    $d = $datax[0];
    return $d['.id'];
  }
}
