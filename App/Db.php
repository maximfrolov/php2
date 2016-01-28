<?php

namespace App;

use \PDO;

class Db
{
    protected $dbh;

    public function __construct()
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

    public function execute($sql)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute();
        return $res;
    }
}