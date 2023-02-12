<?php

define('DB_PERSISTENCY', 'true');
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'postgres');
define('DB_PASSWORD', 'sadwqe312');
define('DB_DATABASE', 'Films');
define('PDO_DSN', 'pgsql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE);




class DataBase
{

    private static $dbConnect;

    // Clear the PDO class instance
    public static function Close()
    {
        self::$dbConnect = null;
    }

    protected function createTable(PDO $dbConnect)
    {       
        
    }


    public function openDataBase()
    {
        if (!isset(self::$dbConnect)) {
            // Execute code catching potential exceptions
            try {
                $options = array(PDO::ATTR_PERSISTENT => DB_PERSISTENCY);
                self::$dbConnect = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD, $options);
                self::$dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // $this->createTable(self::$dbConnect);

            } catch (PDOException $e) {
                // Close the database handler and trigger an error
                self::Close();
                trigger_error($e->getMessage(), E_USER_ERROR);
            }
        }
        return self::$dbConnect;
    }



    public function lastInsertId(){
	    $dbConnect = $this->openDataBase();
	    return $dbConnect->lastInsertId();
    }

    public function setDataBase($string)
    {
        $dbConnect = $this->openDataBase();
        $dbConnect->exec($string);
    }

    public function setBasePrepare($query, $data)
    {
        $dbConnect = $this->openDataBase();
        $stmt = $dbConnect->prepare($query);
        $stmt->execute($data);
    }

    public function getDataBase($string)
    {
        $dbConnect = $this->openDataBase();
        $query = $dbConnect->query($string);
        if ($query) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }        
    }
    

    public function rowCount($query, $data)
    {
        $dbConnect = $this->openDataBase();
        $stmt = $dbConnect->prepare($query);
        $stmt->execute($data);
        return $stmt->rowCount();
    }

    public function getBasePrepare($query, $data)
    {
        $dbConnect = $this->openDataBase();
        $stmt = $dbConnect->prepare($query);
        $stmt->execute($data);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}