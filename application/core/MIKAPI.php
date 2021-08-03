<?php 

    include_once('routeros_api.class.php');

    $API = new RouterosAPI();
    $API->debug = true;
    $API->conn = true;
    $API->attempts = 1;
    $API->delay = 0;

    $API->connect('192.168.18.29', 'api','123');

      $get_hots_active = $API->comm("/ip/address/print");
  
  
      echo json_encode($get_hots_active);

 ?>