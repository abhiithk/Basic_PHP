<?php
class dbOperation
{
    private $conn;
    function __construct()
    {

        $host = 'localhost:3306';
        $user = 'root';
        $pass = 'password';
        $dbname = 'form';
        $this->conn = mysqli_connect($host, $user, $pass, $dbname);
        //print_r($conn); exit;
        //return $conn;
    }

    function insert($table, $fields, $values)
    {

        $sql = "INSERT into $table ($fields) VALUES ($values)";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            return mysqli_affected_rows($this->conn);
        } else {
            return 0;
        }
    }

    function getTable($table, $arrWhere = array(), $arrValue = array(), $orderField = false)
    {
        //print_r($conn); exit;
        $sql = "Select * from $table";
        if (!empty($arrWhere)) {
            $sql .= ' Where ';
            foreach ($arrWhere as $key => $value) {
                if ($key != 0) {
                    $sql .= " AND ";
                }
                $sql .= " $value = $arrValue[$key]";
            }
        }
        if ($orderField) {
            $sql .= " ORDER BY $orderField";
        }
        //echo $sql;exit;

        $result = mysqli_query($this->conn, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    }

    function getRow($table, $field, $id)
    {
        $sql = "Select * from $table where $field = $id ";
        $result = mysqli_query($this->conn, $sql);
        $data = mysqli_fetch_assoc($result);
        return $data;
    }

    function getCount($table, $column, $arrWhere = array(), $arrValue = array())
    {
        $sql =  "SELECT COUNT($column) as count FROM $table";
        if (!empty($arrWhere)) {
            $sql .= ' Where ';
            foreach ($arrWhere as $key => $value) {
                if ($key != 0) {
                    $sql .= " AND ";
                }
                $sql .= " $value = $arrValue[$key]";
            }
            //echo $sql; exit;
            $result = mysqli_query($this->conn, $sql);
            $data = mysqli_fetch_assoc($result);
            return $data;
        }
    }


    function update($table, $fieldValues, $wField, $wValue)
    {
        $sql = "UPDATE $table SET $fieldValues WHERE $wField = $wValue";
        //echo $sql; exit;
        $result = mysqli_query($this->conn, $sql);
        
        if($result){
             return  mysqli_affected_rows($this->conn);;
        } else{
            return 0;
        }
       
    }

    function delete($table, $field, $value)
    { 
        $sql = "DELETE FROM $table WHERE $field = $value";
        $result = mysqli_query($this->conn, $sql);
        //echo $sql; exit;
        if ($result) {
            return mysqli_affected_rows($this->conn);
        } else {
            return 0;
        }
    }
    
}
