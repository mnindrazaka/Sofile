<?php

class PositionController extends Controller
{
  public function __construct() {
    $this->model('Position');
  }

  public function index() {
    if(!$this->checkSession('user'))
    {
      $this->redirect(SITE_URL . '?page=admin/Login');
    }
    $template['page'] = $this->view('admin/position/index', array(), TRUE);
    $this->view("admin/template", $template);
  }

  public function all() {
    $data = $this->Position->all();
    echo json_encode($data);
  }

  public function store() {
    $this->Position->create($_POST);
  }

  public function update($id) {
    $this->Position->update($_POST, $id);
  }

  public function destroy($id) {
    $this->Position->destroy($id);
  }
}

?>