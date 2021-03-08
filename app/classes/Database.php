<?php

class Database
{
    public const DEFAULT_HOST = "localhost";

    /**
     * @var mysqli
     */
    private mysqli $connection;

    public function connect(string $host, string $username, string $password, string $database)
    {
        $this->connection = mysqli_connect($host, $username, $password, $database);

        if (!$this->connection) {
            die(mysqli_connect_error());
        }
        if (!mysqli_set_charset($this->connection, "utf8")) {
            die(mysqli_error($this->connection));
        }
    }

    public function query(string $sql): mysqli_result
    {
        $resultSet = mysqli_query($this->connection, $sql);
        if (!$resultSet) {
            die(mysqli_error($this->connection));
        }

        return $resultSet;
    }

    public function insert(string $sql): bool
    {
        $resultSet = mysqli_query($this->connection, $sql);
        if (!$resultSet) {
            die(mysqli_error($this->connection));
        }

        return TRUE;
    }

    public function fetch(mysqli_result $resultSet): ?array
    {
        return mysqli_fetch_assoc($resultSet);
    }

    public function getLastId(): int
    {
        return $this->connection->insert_id;
    }

    public function close()
    {
        mysqli_close($this->connection);
    }
}
