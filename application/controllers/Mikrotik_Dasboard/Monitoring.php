<?php 
/**
 * 
 */
class Monitoring extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
       $this->load->model('MLogin','DbLogin');
		
	}

       
 public function index(){
        
        $template = array (
                'menu' => $this->load->view('MENU/menu','',TRUE),
                'judul' => 'Client Identification <i class="fas fa-signal"></i>',
                'konten' => $this->load->view('KONTEN/monitorclient','',TRUE)
        );
        $this->parser->parse('template/template2',$template);
            }

public function Hostlog(){
        
        $template = array (
                'menu' => $this->load->view('MENU/menu','',TRUE),
                'judul' => 'Client Connecting Log <i class="fas fa-info"></i>',
                'konten' => $this->load->view('KONTEN/monitorclient_log','',TRUE)
        );
        $this->parser->parse('template/template2',$template);
            }




          public function Readuseractive()
          {
            $datalogin = $this->DbLogin->show();

              $Code['command']="/ip/hotspot/active/print"; //perntah
                echo  $this->mikapi->Read($Code,$datalogin);
          }
          public function ReaduserCookie()
          {
            $datalogin = $this->DbLogin->show();

              $Code['command']="/ip/hotspot/cookie/print"; //perntah
                echo  $this->mikapi->Read($Code,$datalogin);
          }    
           public function ReaduserLog()
          {
            $datalogin = $this->DbLogin->show();

              $Code['command']="/ip/hotspot/host/print"; //perntah
                echo  $this->mikapi->Read($Code,$datalogin);
          }    


}

 ?>