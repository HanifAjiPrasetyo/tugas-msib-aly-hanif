<?php
class Event extends Controller
{
    public function index()
    {
        $data['judul'] = "Event";
        $data['events'] = $this->model('Event_model')->getAllEvent();
        $data['users'] = $this->model('User_model')->getAllUser();
        $this->view('templates/header', $data);
        $this->view('event/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = "Event Detail";
        $data['event'] = $this->model('Event_model')->getEventById($id);
        $this->view('templates/header', $data);
        $this->view('event/detail', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        if ($this->model('event_model')->createEvent($_POST) > 0) {
            Flasher::setFlash('Event', 'successfully', 'added', 'success');
            header('Location: ' . BASE_URL . '/event');
            exit;
        } else {
            Flasher::setFlash('Event', 'failed', 'to add', 'danger');
            header('Location: ' . BASE_URL . '/event');
            exit;
        }
    }

    public function delete()
    {
        if ($this->model('Event_model')->deleteEvent($_POST) > 0) {
            Flasher::setFlash('Event', 'successfully', 'removed', 'success');
            header('Location: ' . BASE_URL . '/event');
            exit;
        } else {
            Flasher::setFlash('Event', 'failed', 'to delete', 'danger');
            header('Location: ' . BASE_URL . '/event');
            exit;
        }
    }

    public function edit()
    {
        echo json_encode($this->model('Event_model')->getEventById($_POST['id']));
    }

    public function update()
    {
        if ($this->model('Event_model')->updateEvent($_POST) > 0) {
            Flasher::setFlash('Event', 'successfully', 'updated', 'success');
            header('Location: ' . BASE_URL . '/event');
            exit;
        } else {
            Flasher::setFlash('Event', 'failed', 'to update', 'danger');
            header('Location: ' . BASE_URL . '/event');
            exit;
        }
    }

    public function search()
    {
        $data['judul'] = "Event";
        $data['events'] = $this->model('event_model')->searchEvent();
        $this->view('templates/header', $data);
        $this->view('event/index', $data);
        $this->view('templates/footer');
    }

    public function registered()
    {
        $data['judul'] = "Registered User";
        $data['registered'] = $this->model('Event_model')->getAllRegisteredUser();
        $this->view('templates/header', $data);
        $this->view('event/registered', $data);
        $this->view('templates/footer');
    }

    public function register()
    {
        if ($this->model('Event_model')->registerEvent($_POST) > 0) {
            Flasher::setFlash('User', 'successfully', 'registered to event', 'success');
            header('Location: ' . BASE_URL . '/event/registered');
            exit;
        } else {
            Flasher::setFlash('User', 'failed', 'to registered to event', 'danger');
            header('Location: ' . BASE_URL . '/event/registered');
            exit;
        }
    }
}
