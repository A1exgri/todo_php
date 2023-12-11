<?php

namespace App\Models;
use PDO;

class Task
{
    public function allTasks($table)
    {
        $query = "SELECT * FROM {$table}";
        try {
            $stm = connect()->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);

        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function insert($table, $data)
    {
        $query = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $table,
            implode(', ', array_keys($data)),
            ":" . implode(', :', array_keys($data))
        );

        try {
            $stm = connect()->prepare($query);
            $stm->execute($data);
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function update($table, $id)
    {
        $query = "SELECT status FROM {$table} WHERE id = ?";
        try {
            $stm = connect()->prepare($query);
            $stm->execute([$id]);
            $result = $stm->fetch(PDO::FETCH_COLUMN);
            $value = 0;
            if ($result === 0) {
                $value = 1;
            }
            $this->updateQuery($table, $value, $id);
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function updateQuery($table, $value, $id)
    {
        $query = "UPDATE {$table} SET status =?  WHERE id = ?";
        $stm = connect()->prepare($query);
        return $stm->execute([$value, $id]);
    }

    public function delete($table, $id)
    {
        $query = "DELETE FROM {$table} WHERE id = ?";

        try {
            $stm = connect()->prepare($query);
            return $stm->execute([$id]);
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}
