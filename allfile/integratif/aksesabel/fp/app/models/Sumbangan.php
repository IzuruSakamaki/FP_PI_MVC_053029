<?php
    namespace app\models;
    use app\core\Model;
    use PDO;
    use PDOException;
    class Sumbangan extends Model
    {
        public static function findAll()
        {
            try 
            {
                $db = static::getDb();
                $stmt = $db->query('SELECT * FROM sumbangan ORDER BY jenis ASC');
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $results;

            } 
            catch (PDOException $e) 
            {
                echo "Terjadi kegagalan koneksi ke database.";
            }
        }
        public static function findAllListed()
        {
            try
            {
                $db = static::getDb();    
                $stmt = $db->query('SELECT * FROM identitas_sumbangan ORDER BY kategori ASC');
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $results;
            } 
            catch (PDOException $e) 
            {
                echo "Terjadi kegagalan koneksi ke database.";
            }
        }
        public static function insert($id, $data)
        {
            try 
            {
                $db = static::getDb();
                $sql = "INSERT INTO log_sumbangan (id, jenis, kategori, banyak, satuan) VALUES(:id, :jenis, :kategori, :banyak, :satuan)";
                $stmt = $db->prepare($sql);
                $stmt->bindParam('id', $id);
                $stmt->bindParam('jenis', $data["jenis"]);
                $stmt->bindParam('kategori', $data["kategori"]);
                $stmt->bindParam('banyak', $data["banyak"]);
                $stmt->bindParam('satuan', $data["satuan"]);
                $stmt->execute();
                return $stmt->rowCount();
            } 
            catch (PDOException $e) 
            {
                echo "Terjadi kegagalan saat menyimpan data";
            }
        }
        public static function update($data)
        {
            try 
            {
                $db = static::getDb();
                $sql = "UPDATE sumbangan SET banyak = banyak + :banyak WHERE kategori = :kategori";
                $stmt= $db->prepare($sql);
                $stmt->bindParam('banyak', $data["banyak"]);
                $stmt->bindParam('kategori', $data["kategori"]);
                $stmt->execute();
                return $stmt->rowCount();
            } 
            catch (PDOException $e) 
            {
                echo "Terjadi kegagalan saat menyimpan data";
            }
        }
        public static function insertAll($id, $data)
        {
            try 
            {
                $db = static::getDb();
                $sql = "INSERT INTO log_sumbangan (id, jenis, kategori, banyak, satuan) VALUES(:id, 'Bahan Makanan', :kategori, :banyak, 'Buah')";
                $stmt = $db->prepare($sql);
                $stmt->bindParam('id', $id);
                $stmt->bindParam('kategori', $data["bm"]);
                $stmt->bindParam('banyak', $data["banyakbm"]);
                $sql1 = "INSERT INTO log_sumbangan (id, jenis, kategori, banyak, satuan) VALUES(:id, 'Obat', :kategori, :banyak, 'Buah')";
                $stmt1 = $db->prepare($sql1);
                $stmt1->bindParam('id', $id);
                $stmt1->bindParam('kategori', $data["ob"]);
                $stmt1->bindParam('banyak', $data["banyakob"]);
                $sql2 = "INSERT INTO log_sumbangan (id, jenis, banyak, satuan) VALUES(:id, 'Uang Tunai', :banyak, 'Rupiah')";
                $stmt2 = $db->prepare($sql2);
                $stmt2->bindParam('id', $id);
                $stmt2->bindParam('banyak', $data["banyakut"]);
                $stmt->execute();
                $stmt1->execute();
                $stmt2->execute();
                return $stmt->rowCount();
                return $stmt1->rowCount();
                return $stmt2->rowCount();
            } 
            catch (PDOException $e) 
            {
                echo "Terjadi kegagalan saat menyimpan data";
            }
        }
        public static function updateAll($data)
        {
            try 
            {
                $db = static::getDb();
                $sql = "UPDATE sumbangan SET banyak = banyak + :banyakbm WHERE kategori = :bm";
                $stmt= $db->prepare($sql);
                $stmt->bindParam('banyakbm', $data["banyakbm"]);
                $stmt->bindParam('bm', $data["bm"]);
                $sql1 = "UPDATE sumbangan SET banyak = banyak + :banyakob WHERE kategori = :ob";
                $stmt1= $db->prepare($sql1);
                $stmt1->bindParam('banyakob', $data["banyakob"]);
                $stmt1->bindParam('ob', $data["ob"]);
                $sql2 = "UPDATE sumbangan SET banyak = banyak + :banyakut WHERE jenis = 'Uang Tunai'";
                $stmt2= $db->prepare($sql2);
                $stmt2->bindParam('banyakut', $data["banyakut"]);
                $stmt->execute();
                $stmt1->execute();
                $stmt2->execute();
                return $stmt->rowCount();
                return $stmt1->rowCount();
                return $stmt2->rowCount();
            } 
            catch (PDOException $e) 
            {
                echo "Terjadi kegagalan saat menyimpan data";
            }
        }        
    }
?>
