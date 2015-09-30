<?php
class C_login extends CI_Controller {

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

  public function index() {
    // Include two files from google-php-client library in controller
    include_once "content/vendor/google/Client.php";
    include_once "content/vendor/google/autoload.php";
    include_once "content/vendor/google/Service/Oauth2.php";

    // Store values in variables from project created in Google Developer Console
    $client_id = '1043073601869-b6oqhm8jn82q3f07j65r7q4vmvoa04bv.apps.googleusercontent.com';
    $client_secret = 'ybvIK0EgtKZ9iWR4SPwn5pkI';
    $redirect_uri = 'http://localhost/work/ProyectoEvalGrupo1/c_login';
    $simple_api_key = 'AIzaSyAZvLokUG5iLTp8WXASLJAfkk8dhrUsQfY';

    // Create Client Request to access Google API
    $client = new Google_Client();
    $client->setApplicationName("KicStarter");
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setRedirectUri($redirect_uri);
    $client->setDeveloperKey($simple_api_key);
    $client->addScope("https://www.googleapis.com/auth/userinfo.email");

    // Send Client Request
    $objOAuthService = new Google_Service_Oauth2($client);

    // Add Access Token to Session
    if (isset($_GET['code'])) {
      $client->authenticate($_GET['code']);
      $_SESSION['access_token'] = $client->getAccessToken();
      header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    }

    // Set Access Token to make Request
    if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
      $client->setAccessToken($_SESSION['access_token']);
    }

    // Get User Data from Google and store them in $data
    if ($client->getAccessToken()) {
      $userData = $objOAuthService->userinfo->get();
      var_dump($userData);
      $data['userData'] = $userData;
      $_SESSION['access_token'] = $client->getAccessToken();
    } else {
      $authUrl = $client->createAuthUrl();
      $data['authUrl'] = $authUrl;
    }
    // Load view and send values stored in $data
    $data['views_list'] = array(
      $this->load->view('main/login', $data, TRUE)
    );
    $data['footer'] = $this->load->view('template/footer', '', TRUE);
    $this->load->view('main/layout', $data);
  }

  // Unset session and logout
  public function logout() {
    unset($_SESSION['access_token']);
    redirect(base_url());
  }

}