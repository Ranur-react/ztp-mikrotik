<?php 
/**
 * 
 */
class Home extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
       $this->load->model('MLogin','DbLogin');
	}
	public function index()
	{
		
          	$template = array (
				'menu' => $this->load->view('MENU/menu','',TRUE),
				'judul' => 'Mikrotik Firewall ',
				'konten' => '----LOGIN BERHASIl----'
		);
		$this->parser->parse('template/template2',$template);
	}



}
       ?>