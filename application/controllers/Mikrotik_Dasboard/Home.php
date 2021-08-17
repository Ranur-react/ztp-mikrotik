<?php

/**
 * 
 */
class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MLogin', 'DbLogin');
		$this->load->model('MLogin', 'DbLogin');
	}
	public function index()
	{
		$query['ipinfo'] = $this->IpInfo();
		// $query['interfaceinfo'] = $this->InterfaceInfo();	
		$query['boardinfo'] = $this->RouterBoardInfo();
		$query['bridgeinfo'] = $this->BridgeInfo();

		$data = $this->DbLogin->show();
		$query['loginInfo'] = $this->DbLogin->show();
		$template = array(
			'menu' => '',
			'judul' => 'Mikrotik ZTP Setup',
			'konten' => 'Create your device be ready just one touch provisioning',
			'konten2' => $this->load->view('ZTP/setup', $query, TRUE),
		);
		$this->parser->parse('template/template2', $template);
	}
	public function RouterBoardInfo()
	{
		$data = $this->DbLogin->show();
		$Code['command'] = "/system/routerboard/print"; //perntah

		// echo  $this->mikapi->Read($Code, $data);
		$datax =  json_decode($this->mikapi->Read($Code, $data));
		// $d = $datax[0];
		// echo $datax[0];
		// foreach ($datax[0] as $key) {
		// 	# code...
		// 	echo $key;
		// }
		// var_dump($datax[0]);
		return $datax[0];
	}

	public function BridgeInfo()
	{
		$data = $this->DbLogin->show();
		$Code['command'] = "/interface/bridge/port/print"; //perntah

		// echo  $this->mikapi->Read($Code, $data);
		$datax =  json_decode($this->mikapi->Read($Code, $data));
		// $d = $datax[0];
		// echo $datax[0];
		// foreach ($datax[0] as $key) {
		// 	# code...
		// 	echo $key;
		// }
		// var_dump($datax[0]);
		return $datax;
	}

	public function IpInfo()
	{
		$data = $this->DbLogin->show();
		$Code['command'] = "/ip/address/print"; //perntah

		// echo  $this->mikapi->Read($Code, $data);
		$datax =  json_decode($this->mikapi->Read($Code, $data));
		// var_dump($datax);
		// $d = $datax[0];
		// echo $datax[0];
		// foreach ($datax[0] as $key) {
		// 	# code...
		// 	echo $key;
		// }
		// var_dump($datax[0]);
		return $datax;
	}
}
