<?php
    namespace app\models;
    use app\core\Model;
    use PDO;
    use PDOException;
    class Home extends Model
    {
        public static function findSumbangan()
        {
            try 
            {
                $db = static::getDb();    
                $stmt = $db->query('SELECT * FROM log_sumbangan ORDER BY no DESC');
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $results;
            }
            catch (PDOException $e) 
            {
                echo "Terjadi kegagalan koneksi ke database.";
            }
        }
        public static function findPenyaluran()
        {
            try
            {
                $db = static::getDb();
                $stmt = $db->query('SELECT * FROM log_penyaluran ORDER BY no DESC');
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $results;
            }
            catch (PDOException $e) 
            {
                echo "Terjadi kegagalan koneksi ke database.";
            }
        }      
    }
?>