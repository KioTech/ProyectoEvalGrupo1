<?php
class C_usuarios extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('m_usuario');
    date_default_timezone_set('America/Mexico_City');
  }

  public function _remap($method, $params = array())
	{
    // $method = 'process_'.$method;
    if (method_exists($this, $method))
    {
      $_SESSION['item'] = "the session is ON.";
      return call_user_func_array(array($this, $method), $params);
    }
    show_404();
	}

  public function index()
  {
    $data['item'] = $this->session->item;
    $this->load->view('usuarios/v_add', $data);
  }

  public function add()
  {
    var_dump($this->m_usuario->add());
  }

  public function getAll()
  {
    return $this->m_usuario->getAll();
  }

  public function checkIfExist()
  {
    // echo json_encode($this->m_usuario->checkIfExist($_POST['tableName'], $_POST['field'], $_POST['value']));
    echo json_encode($this->m_usuario->checkIfExist());
  }

}