<?php

class User extends Controller
{
    public function index()
    {
        $data['judul'] = "User";
        $data['users'] = $this->model('User_model')->getAllUser();
        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        if ($this->model('User_model')->createUser($_POST) > 0) {
            Flasher::setFlash('User', 'successfully', 'added', 'success');
            header('Location: ' . BASE_URL . '/user');
            exit;
        } else {
            Flasher::setFlash('User', 'failed', 'to add', 'danger');
            header('Location: ' . BASE_URL . '/user');
            exit;
        }
    }
}
