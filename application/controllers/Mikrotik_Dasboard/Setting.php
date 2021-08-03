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
      $ip='192.168.200.1/24';
      $etherWAN='ether1';
   $this->MembuatBridgebaru($bridgename);
//    $this->MenambahportBridgeLocal($bridgename,'ether2');
   $this->MenambahportBridgeLocal($bridgename,'ether3');
   $this->MenambahportBridgeLocal($bridgename,'ether4');
   $this->MenambahportBridgeLocal($bridgename,'wlan1');
   $this->Settingip($bridgename,$ip);
   $this->SettingWANdanRouteAuto($etherWAN);
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
  public function Settingip($bridgename,$ip)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/address/add"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      'address' => $ip,
      'interface'=>$bridgename,
    );;
    $this->mikapi->write($Code, $data);
  }
  public function SettingWANdanRouteAuto($ether)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/dhcp-client/add"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      'interface' => $ether,
    );
    $this->mikapi->write($Code, $data);
    $this->enableSettingWANdanRouteAuto();
  }
  public function enableSettingWANdanRouteAuto()
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/dhcp-client/enable"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      'number' => 0,
    );
    $this->mikapi->write($Code, $data);
  }
}
