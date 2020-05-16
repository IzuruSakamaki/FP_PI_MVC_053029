<?php
    namespace app\controllers;
    use app\core\View;
    use app\models\Dompet;
    use app\core\FlashMessage;
    class DompetController
    {
        public function index()
        {
            session_start();
            if(!isset($_SESSION["logged"]) && $_SESSION["logged"] !== true)
            {
                header('Location: ' . BASE_URL . '/akun');
                exit;
            }
            else
            {
                $dompet = Dompet::findAll($_SESSION["id"]);
                View::render("dompet/index.html", ["dompet" => $dompet]);
            }
        }
    }
?>