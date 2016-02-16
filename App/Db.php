<?php

namespace App;

use \PDO;
use \PDOException;
use \App\Exceptions\Db as DbException;

class Db
{

    use TSingleton;

    protected $dbh;

    protected function __construct()
    {
        $config = Config::instance();

        $dsn = $config->data['db']['driver'] . ':dbname=' .
               $config->data['db']['dbname'] . ';host=' .
               $config->data['db']['host'];

        try {
            $this->dbh = new PDO(
                $dsn,
                $config->data['db']['user'],
                $config->data['db']['password'],
                [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',]
            );
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            throw new DbException(
                'Нет соединения с БД, ошибка в запросе! ' .
                $e->getMessage()
            );
        }

    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        return $res;
    }

    public function query($sql, $class, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        if (false !== $res) {
            return $sth->fetchAll(PDO::FETCH_CLASS, $class);
        }
        return [];
    }

    public function getLastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}