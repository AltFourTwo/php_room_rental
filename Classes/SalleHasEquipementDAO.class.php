<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('./configs/config.php');
include_once('./Classes/Database.class.php');
include_once('./Classes/Salle.class.php');
include_once('./Classes/Equipement.class.php');

class SalleHasEquipementDAO
{
    public function __construct()
    {
    }

    public function create($x)
    {
        try {
            $db = Database::getInstance();
            var_dump($x);
            $pstmt = $db->prepare(
                "INSERT INTO " . Config::DB_TABLE_SALEQ . " (
                Salle_Id,
                Equipement_Id
                )
            VALUES (:salle, :equip)");

            $n = $pstmt->execute(array(
                ':salle' => $x->getSalleId(),
                ':equip' => $x->getEquipementId()));

            $pstmt->closeCursor();
            //$db->close();
            return $n;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public static function getSalleId($equipId)
    {
        {
            try {
                $res = '';
                $db = Database::getInstance();

                $res = $db->query("SELECT Salle_Id FROM " . Config::DB_TABLE_SALEQ . " WHERE Equipement_Id = '" . $equipId . "'");
                return $res;
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br>";
                return $res;
            }
        }
    }
    
    public static function getAllEquipmentOfSalle($salleId)
    {
        {
            try {
                $res = '';
                $db = Database::getInstance();

                $res = $db->query("SELECT Equipement_Id FROM " . Config::DB_TABLE_SALEQ . " WHERE Salle_Id = '" . $salleId . "'");
                return $res;
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br>";
                return $res;
            }
        }
    }

    public function delete($x, $y)
    {
        try {
            $db = Database::getInstance();

            $pstmt = $db->prepare("DELETE FROM " . Config::DB_TABLE_SALEQ . " 
            WHERE 
            Salle_Id = :x 
            AND 
            Equipement_Id = :y");
            $n = $pstmt->execute(array(
                ':x' => $x,
                ':y' => $y));

            $pstmt->closeCursor();
            //$db->close();
            return $n;
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
