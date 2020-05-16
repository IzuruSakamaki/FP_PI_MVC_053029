<?php
    namespace app\core;
    class Router
    {
        protected $controller = '\\app\\controllers\\HomeController';
        protected $method = 'index';
        protected $params = [];
        public function __construct()
        {
        }
        public function parseUrl($url)
        {
            // Bersihkan URL dari trailing '/' di belakang
            $url = rtrim($url,'/');
            // Bersihkan URL dari karakter-karakter aneh
            $url = filter_var($url,FILTER_SANITIZE_URL);
            // Explode url-nya dengan membaca pemisah '/' menjadi array
            $url = explode('/',$url);
            // return URL yang telah dipecah
            return $url;
        }
        public function dispatch($url) 
        {
            $url = $this->parseUrl($url);
            // Cek apakah file kelas Controller ada.
            if (file_exists('../app/controllers/' . ucfirst($url[0]) . 'Controller.php'))
            {
                // Jika ada, set controller sesuai yang diminta
                $this->controller =  'app\controllers\\' . ucfirst($url[0]) . 'Controller';
                // Hapus $url[0] dari array
                unset($url[0]);
            }
            // Inisialisasi kelas Controller
            $this->controller = new $this->controller;
            // Parsing method yang harus dipanggil
            if(isset($url[1])) 
            {
                // Cek apakah methodnya ada di dalam kelas controller
                if(method_exists($this->controller, $url[1])) 
                {
                    $this->method = $url[1];
                    unset ($url[1]);
                }
            }
            // params
            if(!empty($url)) {
                $this->params = array_values($url);
            }
            // Panggil method dari controller yang diminta serta kirimkan parameternya
            call_user_func([$this->controller, $this->method], $this->params);
        }
    }
?>