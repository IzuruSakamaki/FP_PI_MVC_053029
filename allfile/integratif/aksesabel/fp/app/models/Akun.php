<?php
    namespace app\models;
    use app\core\Model;
    use PDO;
    use PDOException;
    class Akun extends Model
    {
        public static function account($data)
        {
            try 
            {
                $db = static::getDb();
                $stmt = $db->prepare('SELECT nama, alamat, usia, pekerjaan FROM identitas WHERE id=:id');
                $stmt->execute(['id' => $data]); 
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                return $results;
            }
            catch (PDOException $e)
            {
                echo "Terjadi kegagalan koneksi ke database.";
            }
        }
        public static function insert($data)
        {
            try
            {
                $db = static::getDb();
                $sql = "INSERT INTO identitas (id, pass, nama, alamat, usia, pekerjaan, ktp) VALUES(:id, :pass, :nama, :alamat, :usia, :pekerjaan, :ktp);";
                $stmt = $db->prepare($sql);
                $stmt->bindParam('id', $data["id"]);
                $stmt->bindParam('pass', $data["pass"]);
                $stmt->bindParam('nama', $data["nama"]);
                $stmt->bindParam('alamat', $data["alamat"]);
                $stmt->bindParam('usia', $data["usia"]);
                $stmt->bindParam('pekerjaan', $data["pekerjaan"]);
                $stmt->bindParam('ktp', $data["ktp"]);
                $stmt->execute();
                return $stmt->rowCount();
            }
            catch (PDOException $e) 
            {
                echo "Terjadi kegagalan saat menyimpan data";
            }
        }
        public static function check($data)
        {
            try
            {
                $db = static::getDb();
                $stmt = $db->prepare("SELECT id, pass FROM identitas WHERE id=:id AND pass=:pass");
                $stmt->execute(['id' => $data["id"], 'pass' => $data["pass"]]); 
                $user = $stmt->fetch();
                return $stmt->rowCount();
            } 
            catch (PDOException $e) 
            {
                echo "Terjadi kegagalan saat menyimpan data";
            }
        }
        public static function change($id ,$data)
        {
            try
            {
                $db = static::getDb();
                $sql = "UPDATE identitas SET nama=:nama, alamat=:alamat, usia=:usia, pekerjaan=:pekerjaan WHERE id = :id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam('id', $id);
                $stmt->bindParam('nama', $data["nama"]);
                $stmt->bindParam('alamat', $data["alamat"]);
                $stmt->bindParam('usia', $data["usia"]);
                $stmt->bindParam('pekerjaan', $data["pekerjaan"]);
                $stmt->execute();
                return $stmt->rowCount();
            }
            catch (PDOException $e) 
            {
                echo "Terjadi kegagalan saat menyimpan data";
            }
        }        
    }
?>
