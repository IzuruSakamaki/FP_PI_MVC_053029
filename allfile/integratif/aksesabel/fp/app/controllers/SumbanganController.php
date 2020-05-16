<?php
    namespace app\controllers;
    use app\core\View;
    use app\models\Sumbangan;
    use app\core\FlashMessage;
    class SumbanganController
    {
        public function index()
        {
            $sumbangan = Sumbangan::findAll();
            View::render("sumbangan/index.html", ["sumbangan" => $sumbangan]);
        }
        public function listed()
        {
            $sumbangan = Sumbangan::findAllListed();
            View::render("sumbangan/listed.html", ["sumbangan" => $sumbangan]);
        }
        public function add()
        {
            session_start();
            if(!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true)
            {
                FlashMessage::setFlash('gagal ditambahkan.', 'loginlah terlebih dahulu', 'danger');
                View::render("akun/index.html");
                exit;
            }
            else
            {
                if(Sumbangan::insert($_SESSION["id"], $_POST) > 0)
                {
                    if(Sumbangan::update($_POST) > 0)
                    {
                        $sumbangan = Sumbangan::findAll();
                        FlashMessage::setFlash('berhasil', 'ditambahkan', 'success');
                        View::render("sumbangan/index.html", ["sumbangan" => $sumbangan]);
                    }
                }
                else
                {
                    header('Location: ' . BASE_URL . '/sumbangan');
                }
            }
        }
        public function donatur()
        {
            View::render("sumbangan/donatur.html");
        }
        public function donate()
        {
            session_start();
            if(!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true)
            {
                FlashMessage::setFlash('gagal ditambahkan.', 'loginlah terlebih dahulu', 'danger');
                View::render("akun/index.html");
                exit;
            }
            else
            {
                if(Sumbangan::insertAll($_SESSION["id"], $_POST) > 0)
                {
                    if(Sumbangan::updateAll($_POST) > 0)
                    {
                        $sumbangan = Sumbangan::findAll();
                        FlashMessage::setFlash('berhasil', 'ditambahkan', 'success');
                        View::render("sumbangan/index.html", ["sumbangan" => $sumbangan]);
                    }
                }
                else
                {
                    header('Location: ' . BASE_URL . '/');
                }
            }
        }
    }
?>