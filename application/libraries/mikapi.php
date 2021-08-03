<?php 
/**
 * 
 */

class mikapi 
{
 function __construct()
{
include_once('routeros_api.php');
	    

}
	public function Connect($ip,$us,$pas)
	{
		$API = new RouterosAPI();
	    $API->debug = false;
	    $API->conn = true;
	    $API->attempts = 1;
	    $API->delay = 0;

	    if ($API->connect($ip, $us,$pas)) {
		  		return "Connected";
	    	}else{
		  		return "Disconnect";
	    	}	
	}

	public function write($CodeVar,$par)
	{	
		$API = new RouterosAPI();
	    $API->debug = true;
	    $API->conn = true;
	    $API->attempts = 1;
	    $API->delay = 0;
	    $API->connect($par['ip'], $par['username'],$par['password']);
		$get_hots_active = $API->comm($CodeVar['command'],$CodeVar['ArrayValue']);
		//   echo json_encode($get_hots_active);
		return $get_hots_active;			
	      // $API->comm('/Tulis /String /commnad  /biasa', array('type'=>'data'));

	}

		public function Read($CodeVar,$par)
	{	
		$API = new RouterosAPI();
	    $API->debug = false;
	    $API->conn = true;
	    $API->attempts = 1;
	    $API->delay = 0;
	    $API->connect($par['ip'], $par['username'],$par['password']);
	
		$get_hots_active = $API->comm($CodeVar['command']);
	
	      $a=json_encode($get_hots_active);

	      return $a;			

	}


}

 ?>

