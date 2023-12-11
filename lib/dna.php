<?php

class dna
{
    public $user;
    public $pass;
    public $dbname;
    public $db;
    public $field;

    public function config($u,$p,$dn,$db)
    {
        $this->user = $u;
        $this->pass = $p;
        $this->dbname = $dn;
        $this->db = $db;
    }
    public function son($fdna,$mdna)
    {
        $sdna = "";
        if(strlen($fdna) < strlen($mdna))
        {
            $temp = $fdna;
            $fdna = $mdna;
            $mdna = $temp;
        }
        for($i = 0;$i < strlen($fdna);$i++)
        {
            if(rand(0,1) == 0 && $i < strlen($mdna))
            {
                $sdna = $sdna.$mdna[$i];
            }
            else
            {
                $sdna = $sdna.$fdna[$i];
            }
        }
        return $sdna;
    }
    public function put_data($data)
    {
        $this->field=$data;
    }
    public function conn()
    {
        try
        {
            $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname;charset=utf8",$this->user,$this->pass);
        }
        catch (PDOException $e)
        {
            throw new PDOException($e->getMessage());
        }
        return $pdo;
    }
    public function sel()
    {
        $pdo = $this->conn();
        $sql = "SELECT * FROM `". $this->db ."` ORDER BY time DESC LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $comments = array();
        try
        {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                array_push($comments, array(
                    "id" => $row[$this->field[0]],
                    "dispatch" => $row[$this->field[1]],
                    "target" => $row[$this->field[2]],
                    "data" => $row[$this->field[3]],
                    "time" => $row[$this->field[4]],
                ));
            }
        }
        catch (PDOException $e)
        {
            die();
        }
        unset($pdo);
        return $comments;
    }
}
?>