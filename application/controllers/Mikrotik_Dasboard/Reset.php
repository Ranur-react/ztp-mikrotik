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

  public function index()
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/firewall/filter/add"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      'chain' => 'forward',
      'layer7-protocol' => $i,
      'action' => 'drop',
      'comment' => $i
    );;
    $this->mikapi->write($Code, $data);
  }
}
