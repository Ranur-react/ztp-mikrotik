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
      $ipaddress='192.168.200.1';
      $networkAddress='192.168.200.0/24';
      $range='192.168.200.2-192.168.200.254';
      $ipNetworkTimeProtocol='202.162.32.12';
      $etherWAN='ether1';
      $poolname='hotspotpool';
      $profileHotspotName='HotspotProf';
      $HotspotName='HotspotAuto';
      $dhcpname='dhcpAuto';
      $domain='rifki.com';
      $outinterface='ether1';
   $this->MembuatBridgebaru($bridgename);
//    $this->MenambahportBridgeLocal($bridgename,'ether2');
   $this->MenambahportBridgeLocal($bridgename,'ether3');
   $this->MenambahportBridgeLocal($bridgename,'ether4');
   $this->MenambahportBridgeLocal($bridgename,'wlan1');
   $this->Settingip($bridgename,$ip);
   $this->addNetworkDHCP($networkAddress,$ipaddress);
   $this->addpool($poolname,$range);
   $this->addDHCPServer($dhcpname,$bridgename,$poolname);
   $dhcpid=$this->ambilnumDHCP($dhcpname);
   $this->enableDHCP($dhcpid);
   $this->SettingWANdanRouteAuto($etherWAN);
   $id= $this->ambilnumDHCPCLIENT($outinterface);
   $this->setFirewallNat($outinterface);
   $this->setNTPClient($ipNetworkTimeProtocol);
   $this->enableSettingWANdanRouteAuto($id);
  //  $this->SetupHotspot($bridgename);
   $this->addProfileHotspot($profileHotspotName,$ipaddress,$domain);
   $this->addHotspot($profileHotspotName,$HotspotName,$bridgename,$poolname);
   $idhotspot= $this->ambilnumHotspot($HotspotName);
   $this->enableHotspot($idhotspot);
   $this->addUserHotspot('adminx','1234',$HotspotName);
   
  }
  public function setNTPClient($ipNetworkTimeProtocol)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/system/ntp/client/set"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      'primary-ntp' => $ipNetworkTimeProtocol,
      'secondary-ntp' => $ipNetworkTimeProtocol,
      'enabled' => 'yes',
    );;
    $this->mikapi->write($Code, $data);
  }
  public function setFirewallNat($outinterface)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/firewall/nat/add"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      'chain' => 'srcnat',
      'out-interface' => $outinterface,
      'action' => 'masquerade',
    );;
    $this->mikapi->write($Code, $data);
  }
  public function enableDHCP($e)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/dhcp-server/enable"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      '.id' => $e,
    );
    $this->mikapi->write($Code, $data);
  }
  public function ambilnumDHCP($i)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/dhcp-server/print"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      '?name' => $i,
    );
    $datax = $this->mikapi->write($Code, $data);
    $d = $datax[0];
    return $d['.id'];
  }
  public function addDHCPServer($dhcpname,$interface,$poool)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/dhcp-server/add"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      'name' => $dhcpname,
      'interface' => $interface,
      'address-pool' => $poool,
    );;
    $this->mikapi->write($Code, $data);
  }
  public function addNetworkDHCP($networkAddress,$gateway)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/dhcp-server/network/add"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      'address' => $networkAddress,
      'gateway' => $gateway,
    );;
    $this->mikapi->write($Code, $data);
  }
  public function addUserHotspot($username,$password,$HotspotName)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/hotspot/user/add"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      'name' => $username,
      'password' => $password,
      'server' => $HotspotName,
      'profile' => 'default',
    );;
    $this->mikapi->write($Code, $data);
  }
  public function enableHotspot($e)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/hotspot/enable"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      '.id' => $e,
    );
    $this->mikapi->write($Code, $data);
  }
  public function ambilnumHotspot($i)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/hotspot/print"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      '?name' => $i,
    );
    $datax = $this->mikapi->write($Code, $data);
    $d = $datax[0];
    return $d['.id'];
  }
  public function addHotspot($profileHotspotName,$HotspotName,$bridgename,$poolname)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/hotspot/add"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      'profile' => $profileHotspotName,
      'name' => $HotspotName,
      'interface' => $bridgename,
      'address-pool' => $poolname,
    );;
    $this->mikapi->write($Code, $data);
  }
  public function addpool($poolname,$range)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/pool/add"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      'name' => $poolname,
      'ranges' => $range,
    );;
    $this->mikapi->write($Code, $data);
  }
  public function addProfileHotspot($profileHotspotName,$ipaddress,$domain)
  {
    // ip hotspot profile add name=hotspotp hotspot-address=192.168.20
    // 0.1 dns-name=hotspot.com login-by=http-chap,cookie http-cookie-lifetime=1d
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/hotspot/profile/add"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      'name' => $profileHotspotName,
      'hotspot-address' => $ipaddress,
      'dns-name' => $domain,
      'login-by' => 'http-chap,cookie',
      'http-cookie-lifetime' => '1d',
    );;
    $this->mikapi->write($Code, $data);
  }
  public function SetupHotspot($bridgename)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/hotspot/setup"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      'interface' => $bridgename,
      'network' => '192.168.200.1/24',
      'masquerade' => 'yes',
      'pool' => '192.168.200.2-192.168.200.254',
      'certificate' => 'none',
      'smtp server' => '0.0.0.0',
      'dns servers' => '8.8.8.8,8.8.4.4',
      'dns name' => 'hotspot.com',
      'user' => 'admin',
      'password' => 'admin',
    );;
    $this->mikapi->write($Code, $data);
  }
  public function ambilnumDHCPCLIENT($i)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/dhcp-client/print"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      '?interface' => $i,
    );
    $datax = $this->mikapi->write($Code, $data);
    $d = $datax[0];
    return $d['.id'];
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
  }
  public function enableSettingWANdanRouteAuto($e)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/dhcp-client/enable"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      '.id' => $e,
    );
    $this->mikapi->write($Code, $data);
  }
}
