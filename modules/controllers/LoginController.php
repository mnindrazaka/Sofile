<?php

class LoginController extends Controller
{
  public function __construct() {
    $this->model('User');
  }

  public function index()
  {
    $this->view("login");
  }

  public function login()
  {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $data = $this->User->where("username = '$username' AND '$password'");

    if(count($data) == 1) {
      $this->setSession('user', $data[0]);
    }
    $this->redirect(SITE_URL);
  }

  public function logout()
  {
    $this->unsetSession('user');
    $this->redirect(SITE_URL);
  }
}

?>
