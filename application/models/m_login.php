<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{

	public $title;
	public $content;
	public $date;

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	//get the username & password from tbl_usrs
	function get_user($usr, $pwd)
	{
		$sql = "select * from t001_usuarios_ma where Username_TXT = '" . $usr . "' and Password_TXT = '" . md5($pwd);
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
}