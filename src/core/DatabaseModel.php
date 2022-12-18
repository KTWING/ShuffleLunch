<?php

class DatabaseModel
{
    protected $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function fetchAll($sql)
    {
        $result = $this->mysqli->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function execute($sql, $params = [])
    {
        $stmt = $this->mysqli->prepare($sql);
        if ($params) {
            $stmt->bind_param(...$params);
        }
        $stmt->execute();
        $stmt->close();
    }
}
