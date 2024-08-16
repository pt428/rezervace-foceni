<?php 
require_once __DIR__ . '/../reservation/Reservation.php';
    class Database {
        
        public function connectDB(){
            $db_host = "localhost";
            $db_name = "rezervace_foceni";
            $db_user = "root";
            $db_password="";

            $connection = "mysql:host=" . $db_host . ";dbname=" . $db_name . ";charset=utf8";

            try {
                $db= new PDO($connection,$db_user,$db_password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $db;
            } catch (PDOException $th) {
                echo $th->getMessage();
                exit;
            }

        }

        public  function getAllReservations(){
                try {
                    // SQL dotaz pro výběr všech rezervací
                    $sql = "SELECT * FROM reservations";
                    $connection=$this->connectDB();
                    // Příprava dotazu
                    $stmt = $connection->prepare($sql);
                    
                    // Vykonání dotazu
                    $stmt->execute();
                    
                    // Načtení všech výsledků
                    
                    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    
                    return $reservations;

                } catch (PDOException $e) {
                    echo "Error fetching reservations: " . $e->getMessage();
                }
        }
        public function delete($id){
               $sql = "DELETE FROM reservations WHERE id = :id";
                $connection=$this->connectDB();
                    // Příprava dotazu
                    $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        return $stmt->rowCount(); // Vrátí počet smazaných řádků
    } else {
        return false; // Pokud došlo k chybě
    }
        }
        
    
    }
    




 