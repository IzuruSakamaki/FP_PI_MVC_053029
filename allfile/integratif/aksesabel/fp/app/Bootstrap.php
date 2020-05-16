<?php
    spl_autoload_register (function($class)
    {
        /**
         * 1. Menambahkan prefiks '\' di depan nama namespace
         * Contoh: App\Core menjadi \App\Core
         * Hal ini dilakukan karena hasil dirname(__DIR__) tidak memiliki tanda '\' di belakangnya.
        */
        $prefix = '/';
        /**
         * 2. Mendapatkan root directory dari aplikasi*
         * Contoh: D:\xampp\htdocs\phpmvc2
        */
        $root = dirname(__DIR__);
        /**
        * 3. Menempelkan nama namespace dengan direktori dan ekstensi '.php'
        * Contoh:
        * - nama kelas: App\Core\Router
        * - folder: D:\xampp\htdocs\phpmvc2
        * - Hasil akhir: D:\xampp\htdocs\phpmvc2\App/Core/Router.php
        */
        $file = $root.$prefix.str_replace('\\','/',$class).'.php';
        /**
        * 4. Melakukan require_once file kelas yang diperlukan apabila kelasnya ada
        */
        if(is_readable($file))
        {
            require_once $file;
        }
    });