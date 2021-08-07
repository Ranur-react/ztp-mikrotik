<?php 
/**
 * 
 */
class Login extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MLogin','DbLogin');
		$this->load->library(array('session','form_validation'));
	}

public function index()
{
	$data = $this->DbLogin->show();
	
		 if ($this->mikapi->Connect($data['ip'],$data['username'],$data['password'])=="Connected") {
	                redirect(site_url('Home'));
	     }else{
					$this->Login();

	     }
}

 
	public function Loginmik()
    {    
	     $ip=$this->input->post('ip',true);
	     $us=$this->input->post('un',true);
	     $pas=$this->input->post('pw',true);
	     if ($this->mikapi->Connect($ip,$us,$pas)=="Connected") {
	     			
					 if($this->DbLogin->insert($ip,$us,$pas)){
						//  redirect(site_url('Home'));
						 echo "Berhasil Login";
					 }else{
						echo	"data login gagal disimpan";
					 }
	     }else{
					echo "IP , Password &  username tidak diterima Perangkat";

	     }
 }
 	public function Login(){

		$template = array (
				'menu' => $this->load->view('MENU/kosong','',TRUE),
				'judul' => 'Login TO Mikrotik ',
				'konten' => $this->load->view('KONTEN/Connect','',TRUE)
		);
		$this->parser->parse('template/template2',$template);

            
	}
	
	
	public function logout(){

		$template = array (
				'menu' => $this->load->view('MENU/kosong','',TRUE),
				'judul' => 'Login TO Mikrotik ',
				'konten' => $this->load->view('KONTEN/Connect','',TRUE)
		);
		$this->parser->parse('template/templateawal',$template);

            
	}
 // public function Cetak()
 // {
 //   // $this->mikapi->write("/ip/address/print");
 //   $this->mikapi->write("/ip/hotspot/user/add/name=aaaa");
 	
 // }


}

 ?>