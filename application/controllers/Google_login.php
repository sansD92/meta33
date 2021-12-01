<?php 

class Google_login extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  $this->load->model('google_login_model');
 }

 function login()
 {
  include_once APPPATH . "libraries/vendor/autoload.php";

  $google_client = new Google_Client();

  $google_client->setClientId('621256497357-9g6a2m80l056hdmoalirqb4ktrjqi14u.apps.googleusercontent.com'); //Define your ClientID

  $google_client->setClientSecret('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'); //Define your Client Secret Key

  $google_client->setRedirectUri('http://localhost/meta33/google_login/login'); //Define your Redirect Uri

  $google_client->addScope('email');

  $google_client->addScope('profile');

  if(isset($_GET["code"]))
  {
   $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

   if(!isset($token["error"]))
   {
    $google_client->setAccessToken($token['access_token']);

    $this->session->set_userdata('access_token', $token['access_token']);

    $google_service = new Google_Service_Oauth2($google_client);

    $data = $google_service->userinfo->get();

    $current_datetime = date('Y-m-d H:i:s');

    if($this->google_login_model->Is_already_register($data['id']))
    {
     //update data
     $user_data = array(
      'nama_lengkap' => $data['given_name'] . " " . $data['family_name'],
      'username'  => $data['email'],
      'email' => $data['email'],
     
      'updated_at' => $current_datetime
     );

     $this->google_login_model->Update_user_data($user_data, $data['id']);
    }
    else
    {
     //insert data
     $user_data = array(
      'login_oauth_uid' => $data['id'],
      'nama_lengkap' => $data['given_name'] . " " . $data['family_name'],
      'username'  => $data['email'],
	  'password' => md5("12345"),
      'email' => $data['email'],
	  'level'=>'user',
	  'blokir'=>'N',
      'foto' => $data['picture'],
      'created_at'  => $current_datetime
     );

     $this->google_login_model->Insert_user_data($user_data);
    }
    $this->session->set_userdata('user_data', $user_data);
   }
  }
  $login_button = '';
  if(!$this->session->userdata('access_token'))
  {
   $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="'.base_url().'asset/sign-in-with-google.png" /></a>';
   $data['login_button'] = $login_button;
   $this->load->view('google_login', $data);
  }
  else
  {
   $this->load->view('google_login', $data);
  }
 }

 function logout()
 {
  $this->session->unset_userdata('access_token');

  $this->session->unset_userdata('user_data');

  redirect('google_login/login');
 }
 
}
?>
