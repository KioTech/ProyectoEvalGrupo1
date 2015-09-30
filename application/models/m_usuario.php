<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_usuario extends CI_Model
{
	public function __construct()
  {
    // Call the CI_Model constructor
    parent::__construct();
  }

  public function getAll()
  {
  	$query = $this->db->query('SELECT * FROM t001_usuarios_ma');

		foreach ($query->result() as $row)
		{
      echo $row->Nombre_TXT;
      echo $row->Username_TXT;
      echo $row->Email_TXT;
		}

		echo 'Total Results: ' . $query->num_rows();
  }

  public function add()
  {
    $dt = new DateTime();
    return $this->db->insert('t001_usuarios_ma', array(
      // 'ID' => ,
      'Nombre_TXT' => $_POST['txtNombre'],
      'ApPaterno_TXT' => $_POST['txtApPaterno'],
      'ApMaterno_TXT' => $_POST['txtApMaterno'],
      'Username_TXT' => $_POST['txtUsername'],
      'DescripcionPersonal_TXT' => $_POST['txtDescripcion'],
      'Password_TXT' => md5($_POST['txtPassword']),
      'Email_TXT' => $_POST['txtCorreo'],
      'Telefono_TXT' => $_POST['txtTelefono'],
      'ImagenPerfil_TXT' => $_POST['txtImagenUrl'],
      'FechaRegistro_DT' => $dt->format('Y-m-d H:i:s'),
      'Direccion_TXT' => $_POST['txtDireccion'],
      'T004_E_ID' => 1
    ));
  }

  public function checkIfExist()
  {
    // return $this->db->get_where($tableName, array($field => $value), 1)->num_rows() > 0 ? false : true;
    return $this->db->get_where($_POST['tableName'], array($_POST['field'] => $_POST['value']), 1)->num_rows() > 0 ? false : true;
  }
}