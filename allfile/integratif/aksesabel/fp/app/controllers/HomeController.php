<?php
    namespace app\controllers;
    use app\core\View;
    use app\models\Home;
    use app\core\FlashMessage;
    class HomeController {
        public function index($params)
        {
            $log_sumbangan = Home::findSumbangan();
            $log_penyaluran = Home::findPenyaluran();
            View::render("home/index.html", ["log_sumbangan" => $log_sumbangan, "log_penyaluran" => $log_penyaluran]);       
        }
    }
?>