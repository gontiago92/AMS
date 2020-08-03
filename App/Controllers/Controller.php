<?php 

namespace App\Controllers;

use App\Auth;

class Controller {

    protected $homeController = HomeController::class;
    protected $model;
    protected $modelName;
    protected $viewpath = "Views/";

    public function __construct()
    {
        if($this->modelName != NULL) {
            $this->model = new $this->modelName();
        }

    }

    public function index() {
        if(isset($this->homeController)) {
            if(class_exists($this->homeController)) {
                $this->render('home/index');
                /*
                if(Auth::isLogged()) {
                    $this->redirect('home/index');
                } else {
                    $this->redirect('auth/login');
                }
                */
            }
        }

        $this->render('index', ['pageTitle' => 'Homepage', 'controller' => __CLASS__]);
    }

    public function render($path, $variables = []) {
        ob_start();

        $variables['server'] = \App\Request::getServer();

        extract($variables);

        require_once ROOT . "$this->viewpath/$path.php";

        $pageContent = ob_get_clean();

        require_once ROOT . "$this->viewpath/layout.php";
    }

    public function redirect($file)
    {
        header("Location: $file");
        exit();
    }
}