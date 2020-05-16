<?php
    namespace app\models;
    use app\core\Model;
    use PDO;
    use PDOException;
    class Dompet extends Model
    {
        public static function findAll($data)
        {
            try
            {
                $db = static::getDb();
                $stmt = $db->prepare('SELECT * FROM log_sumbangan WHERE id=:id ORDER BY no DESC');
                $stmt->execute(['id' => $data]); 
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