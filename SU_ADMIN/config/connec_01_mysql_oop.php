<?php 
class database{
	var $host = "localhost";
	var $uname = "root";
	var $pass = "holihks45";
	var $db = "hdesk";
	function conek(){
		$koneksi = mysqli_connect($this->host, $this->uname, $this->pass,$this->db) or die ("FAILED");
			}} ?>