<?php
/**
 * Created by PhpStorm.
 * User: mathieumoullec
 * Date: 04/03/2017
 * Time: 16:27
 */

namespace App\Controller;

use \App;
use Core\Debug\Debug;
use Core\HTML\BootstrapForm;


class UserController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('user');
        $this->loadModel('image');
    }

    public function index() {
        if ($this->loggued()) {
            $pseudo = $this->user->FindPseudoWithId($_SESSION['auth'])->pseudo;
            $photo = '<script type="text/javascript" src="js/photo.js"></script>';
            $form = new BootstrapForm($_POST);
            $this->render('user.index', compact('photo', 'pseudo', 'form'));
        }
        else
        {
            $this->forbidden();
        }
    }

    public function header($variables = []) {
        ob_start();
        extract($variables);
        require($this->viewPath . 'user/header.php');
        return (ob_get_clean());
    }

    protected function render_only ($view, $variables) {
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        echo $content;
    }

        protected function render($view, $variables = []) {
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        $header = $this->header($variables);
        $footer = $this->footer($variables);
        require($this->viewPath . 'template/' . $this->template . '.php');
    }

    public function galleryperso() {
        $images = $this->image->FindImageswithId($_SESSION['auth']);
        $this->render_only('user.gallery', compact('$images'));
    }

    public static function Userlogout () {
        unset ($_SESSION['auth']);
        Header ('Location: index.php');
    }

    public function sharephoto () {
        $_SESSION['share'] = 'yes';
        echo 'coucou';
        \Core\Debug\Debug::getInstance()->get;
    }
}