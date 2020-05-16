<?php
    namespace app\controllers;
    use app\core\View;
    use app\models\Akun;
    use app\core\FlashMessage;
    class AkunController
    {
        public function index()
        {
            session_start();
            if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true)
            {
                header('Location: ' . BASE_URL . '/akun/profile');
                exit;
            }
            else
            {
                View::render("akun/index.html");
            }
        }
        public function login()
        {
            if(Akun::check($_POST) > 0)
            {
                session_start();
                $_SESSION["logged"] = true;
                $_SESSION["id"] = $_POST["id"];
                $_SESSION["pass"] = $_POST["pass"];
                header('Location: ' . BASE_URL . '/akun/profile');
            }
            else
            {
                View::render("akun/index.html");
            }

        }
        public function register()
        {
            if(Akun::insert($_POST) > 0) 
            {
                FlashMessage::setFlash('berhasil', 'ditambahkan', 'success');
                View::render("akun/index.html");
            } 
            else
            {
                FlashMessage::setFlash('gagal ditambahkan.', 'id/ktp telah digunakan', 'danger');
                View::render("akun/index.html");
            }    
        }
        public function profile()
        {
            session_start();
            if(!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true)
            {
                header('Location: ' . BASE_URL . '/akun');
                exit;
            }
            else
            {
                $profil = Akun::account($_SESSION["id"]);
                View::render("akun/profile.html", ["profil" => $profil]);
            }
        }
        public function ubah()
        {
            session_start();
            if(!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true)
            {
                header('Location: ' . BASE_URL . '/akun');
                exit;
            }
            else
            {
                if(Akun::change($_SESSION["id"], $_POST) > 0)
                {
                    $profil = Akun::account($_SESSION["id"]);
                    FlashMessage::setFlash('berhasil', 'diubah', 'success');
                    View::render("akun/profile.html", ["profil" => $profil]);
                }
                else
                {
                    $profil = Akun::account($_SESSION["id"]);
                    FlashMessage::setFlash('gagal', 'diubah', 'danger');
                    View::render("akun/profile.html", ["profil" => $profil]);
                }
            }
        }
        public function exit()
        {
            session_start();
            session_unset();
            $_SESSION["logged"] = false;
            session_destroy();
            View::render("akun/index.html");
            exit;
        }
    }
?>