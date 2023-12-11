<?php

class CreateTasksTable
{
    public static function tasksTable($pdo)
    {
        try {
            $query = "CREATE TABLE IF NOT EXISTS todos(
                id INT AUTO_INCREMENT PRIMARY KEY,
                task TEXT NOT NULL,
                user VARCHAR(250) NOT NULL,
                email VARCHAR(100) NOT NULL UNIQUE ,
                status TINYINT(1) default 0,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";
            $stm = $pdo->prepare($query);
            $stm->execute();
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}
