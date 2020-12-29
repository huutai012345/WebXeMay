<?php

class DbConnection
{
    protected static $connectionInstance=null;
    protected $userName="root";
    protected $pass="";
    protected $host="localhost";
    protected $tableName="categories";
    protected $queryParams;
    protected $dataBase="xemay";

    public function __construct()
    {
        $this->connect();
    } 

    public function connect()
    {
        if(self::$connectionInstance==null)
        {
            try
            {
                self::$connectionInstance=new PDO('mysql:host='.$this->host.';dbname='.$this->dataBase,$this->userName,$this->pass);
                self::$connectionInstance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            catch(Exception $ex)
            {
                echo "ERROR".$ex->getMessage();
                die();
            }
        }
        return self::$connectionInstance;
    }

    public function setModel($tableName)
    {
        $this->tableName=$tableName;
    } 

    public function query($sql,$param=[])
    {
        $q=self::$connectionInstance->prepare($sql);

        if(is_array($param) && $param)
        {
            $q->execute($param);
        }
        else
        {
            $q->execute();
        }
        return $q;
    }

    public function buildQueryParams($params)
    {
        $default=
        [
            "select"=>"*",
            "where"=>"",
            "other"=>"",
            "field"=>"",
            "value"=>""
        ];

        $this->queryParams=array_merge($default,$params);
        return $this;
    }

    public function buildCondition($condition)
    {
        if(trim($condition))
        {
            return " where ".$condition." ";
        }
        return " ";
    }

    public function select()
    {
        $sql="select ".$this->queryParams["select"]." from ".$this->tableName.$this->buildCondition($this->queryParams["where"]).$this->queryParams["other"];
        $query=$this->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert()
    {
        $sql="insert into ".$this->tableName." ".$this->queryParams["field"];
        $result=$this->query($sql,$this->queryParams["value"]);
        if(!empty($result))
        {
            return true;
        }
        return false;
    }

    public function update()
    {
        $sql="update ".$this->tableName." set ".$this->queryParams["value"]." ".$this->buildCondition($this->queryParams["where"])." ".$this->queryParams["other"];
        $result=$this->query($sql);
        if(!empty($result))
        {
            return true;
        }
        return false;
    }

    public function delete()
    {
        $sql="delete from ".$this->tableName." ".$this->buildCondition($this->queryParams["where"])." ".$this->queryParams["other"];
        $result=$this->query($sql);
          if(!empty($result))
        {
            return true;
        }
        return false;
    }
}