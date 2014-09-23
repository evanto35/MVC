<?php
namespace PetrAurora\Controller;

use PetrAurora\loginService;
use PetrAurora\View;

class Controller {

    public $model;
    public $view;
    public $loginService;
    public $url;

    public function __construct() {
        $this->view = new View\View();
        $this->loginService = new loginService();
        $this->url = explode('/', $_SERVER['REQUEST_URI']);
        $this->url = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $this->url[1];
    }

    public function indexAction() {
    }
}