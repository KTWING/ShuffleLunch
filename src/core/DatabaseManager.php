<?php

class DatabaseManager
{
    protected $models;
    protected $mysqli;

    public function connect($params)
    {
        $mysqli = new mysqli($params['hostname'], $params['username'], $params['password'], $params['database']);

        if ($mysqli->connect_error) {
            throw new RuntimeException('mysqli接続エラー:' . $mysqli->connect_error);
        }

        $this->mysqli = $mysqli;
    }

    public function get($modelName)
    {
        if (!isset($this->models[$modelName])) {
            $model = new $modelName($this->mysqli);
            $this->models[$modelName] = $model;
        }

        return $this->models[$modelName];
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }
}
