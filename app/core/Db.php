<?php

class Db
{

    function __construct()
    {
        $this->dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        return $this;
    }


    public function query($sql)
    {
        $sth = $this->dbh->prepare($sql);

        if ( $sth->execute() )
        {
            if ( strpos($sql, "SELECT") === 0 )
            {
                $return_array = array();

                while ( $data = $sth->fetch(PDO::FETCH_ASSOC) )
                {
                    $return_array[] = $data;
                }

                return $return_array;
            }

            if ( strpos($sql, "INSERT INTO") !== FALSE )
            {
                return $this->dbh->lastInsertId();
            }
        }

        return true;
    }


    public function getTableColumns($table)
    {
        $sth = $this->dbh->prepare("SHOW COLUMNS FROM `" . $table . "`");

        if ( $sth->execute() )
        {
            $return_array = array();

            while ( $data = $sth->fetch(PDO::FETCH_ASSOC) )
            {
                $return_array[] = $data['Field'];
            }

            return $return_array;
        }

        return array();
    }

}