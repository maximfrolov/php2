<?php

namespace App;

use \PDO;

class Db
{

    use Singleton;

    protected $dbh;

    protected function __construct()
    {
        $config = include __DIR__ . '/../config.php';
        $dsn = $config['driver'] . ':dbname=' . $config['dbname'] . ';host=' . $config['host'];
        $this->dbh = new PDO(
            $dsn,
            $config['user'],
            $config['password'],
            [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',]
        );
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }

    public function execute($sql, $arr = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($arr);
        return $res;
    }

    public function query($sql, $class, $arr = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($arr);
        if (false !== $res) {
            return $sth->fetchAll(PDO::FETCH_CLASS, $class);
        }
        return [];
    }
}