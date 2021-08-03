<?php

/**
 * 
 */
class Firewall extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MLogin', 'DbLogin');
    $this->load->model('MBlokir');
  }


  public function Readuseractive()
  {
    $datalogin = $this->DbLogin->show();

    $Code['command'] = "/ip/hotspot/active/print"; //perntah
    echo  $this->mikapi->Read($Code, $datalogin);
  }

  public function index()
  {
    $data = $this->DbLogin->show();
    if ($this->mikapi->Connect($data['ip'], $data['username'], $data['password']) != "Connected") {
      redirect(site_url('Login'));
    }
    $this->indexOri();
  }



  public function indexOri()
  {
    $d['dataBlokir'] =  $this->MBlokir->DaftaraBlokir();

    $template = array(
      'menu' => $this->load->view('MENU/menu', '', TRUE),
      'judul' => 'Firewall Remote',
      'konten' => $this->load->view('KONTEN/blokir', $d, TRUE),
    );
    $this->parser->parse('template/template2', $template);
  }



  public function Tambahblokir()
  {
    $nameid = $this->AutomatasiIDName();
    $Param = $this->input->post(null, TRUE);
    $url = $Param['adduri'];


    $this->WriteUrl($Param['adduri'], $nameid);
    $this->blokUrl($Param['adduri'], $nameid);
    $idfilter = $this->ambilnumFilter($nameid);
    if ($id = $this->ambilnumLayer7($nameid)) {
      $this->MBlokir->insertLayer7Proto($id, $nameid, $url);
      $this->MBlokir->insertFirewallChain($nameid, $idfilter);
      // $this->index();
      redirect(site_url('Firewall'));
    } else {
      echo "Gagal read data from Mikrotik";
    }
  }

  public function AutomatasiIDName()
  {
    $data = $this->MBlokir->countL7ID();
    return $data['qty'];
  }




  public function removeBlok()
  {
    $id = $_GET['id'];
    $idfilter = $_GET['idfilter'];
    echo "Liahat Id Layer 7 <br>";
    echo $id;
    echo "Liahat Id Firewall <br>";
    echo $idfilter;

    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/firewall/layer7-protocol/remove"; //perntah1

    $Code['ArrayValue'] = array(         //value dari perintah
      '.id' => $id,
    );
    $data2 = $this->DbLogin->show();
    $Code2['command'] = "/ip/firewall/filter/remove"; //perntah1
    $Code2['ArrayValue'] = array(         //value dari perintah
      '.id' => $idfilter,
    );
    $this->mikapi->write($Code2, $data);
    $this->mikapi->write($Code, $data);
    // if () {
      // if () {
        if ($this->MBlokir->DeleteLayer7Proto($id)) {
          redirect(site_url('Firewall'));
        } else {
          echo "Hapus database gagal";
        }

      // }  else {
      //     echo "Hapus data Layer 7 Gagal";
      //   }
    //   echo "hapuas Filter berhasil";
    // } else {
    //   echo "Hapus Filter Gagar";
    // }
  }
  public function ambilnumFilter($i)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/firewall/filter/print"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      '?layer7-protocol' => $i,
    );
    $datax = $this->mikapi->write($Code, $data);
    $d = $datax[0];
    // echo $d['.id'];
    return $d['.id'];
  }
  public function ambilnumLayer7($i)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/firewall/layer7-protocol/print"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      '?name' => $i,
    );
    $datax = $this->mikapi->write($Code, $data);
    $d = $datax[0];
    return $d['.id'];
  }

  public function WriteUrl($url, $i)
  {
    $data = $this->DbLogin->show();
    $Code['command'] = "/ip/firewall/layer7-protocol/add"; //perntah
    $Code['ArrayValue'] = array(         //value dari perintah
      'name' => $i,
      'regexp' => '^.+(' . $url . ').*$'
    );;
    $this->mikapi->write($Code, $data);
  }
  public function blokUrl($url, $i)
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
