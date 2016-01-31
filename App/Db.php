<?php

namespace App;

use \PDO;

class Db
{

    use Singleton;

    protected $dbh;

    protected function __construct()
    {
        $config = Config::instance();

        $dsn = $config->data['db']['driver'] . ':dbname=' .
               $config->data['db']['dbname'] . ';host=' .
               $config->data['db']['host'];

        $this->dbh = new PDO(
            $dsn,
            $config->data['db']['user'],
            $config->data['db']['password'],
            [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',]
        );
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }

    public function execute($sql, $param = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($param);
        return $res;
    }

    public function query($sql, $class, $param = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($param);
        if (false !== $res) {
            return $sth->fetchAll(PDO::FETCH_CLASS, $class);
        }
        return [];
    }
}