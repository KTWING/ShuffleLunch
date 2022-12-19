<?php

class Employee extends DatabaseModel
{
    public function fetchAllNames()
    {
        return $this->fetchAll('SELECT id, name FROM employees');
    }

    public function insert($name)
    {
        $this->execute('INSERT INTO employees (name) VALUES (?)', ['s', $name]);
    }

    public function delete($deleteName)
    {
        $this->execute('DELETE FROM employees WHERE name = (?)', ['s', $deleteName]);
    }
}
