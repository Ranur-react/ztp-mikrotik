<?php

/**
 * 
 */
defined('BASEPATH') or exit('No direct script acces allowed');

class MLogin extends CI_Model
{

	function insert($ip, $us, $pw)
	{
		$count = $this->count();
		if ($count['val'] > 0) {
			# code...
			$this->db->query("DELETE FROM `tb_remotelogin`");
			return  $this->db->query("INSERT INTO `tb_remotelogin` VALUES ( NULL,'$ip','$us','$pw');");
		} else {

			return	$this->db->query("INSERT INTO `tb_remotelogin` VALUES ( NULL,'$ip','$us','$pw');");
		}
		// echo $ip;
		// echo $us;
		// echo $pw;
		//  $this->db->query("INSERT INTO `tb_remotelogin`  VALUES ( NULL,'$ip','$us','$pw');");
	}
	// public function update($ip,$us,$pw)
	// {
	// 	return $this->db->query("UPDATE `tb_remotelogin` SET `username`='$us',`password`='$pw',`ip`='$ip' WHERE `no`='2';");
	// }
	public function show()
	{
		return $this->db->query("SELECT*FROM `tb_remotelogin`")->row_array();
	}
	public function count()
	{
		return $this->db->query("SELECT COUNT(NO) as val FROM tb_remotelogin")->row_array();
	}
}
