<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = "Home";
        $data['nama'] = "Hanif Aji Prasetyo";
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
