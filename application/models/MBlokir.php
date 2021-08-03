<?php 
/**
 * 
 */
defined('BASEPATH') OR exit('No direct script acces allowed');

class MBlokir extends CI_Model
{

    function insertLayer7Proto($id,$nameid,$url)
	{
			 return $this->db->query("INSERT INTO `layer7protokol` VALUES ('$nameid','$url','$id');");		
    }
    function DeleteLayer7Proto($id)
	{
			 return $this->db->query("DELETE FROM `layer7protokol` WHERE `id`='$id';");		
    }
    function insertFirewallChain($i,$idfilter)
	{
			 return $this->db->query("INSERT INTO `firewallfilter`VALUES ( 'forward','$i','drop','$i',NULL,'$idfilter');");		
    }
    function countL7ID()
	{
			 return $this->db->query("SELECT COUNT(NAME) AS qty FROM layer7protokol;")->row_array();		
    }
    function DaftaraBlokir()
	{
			 return $this->db->query("SELECT*FROM firewallfilter JOIN layer7protokol ON NAME=layer7protokol;")->result_array();		
	}
}
?>