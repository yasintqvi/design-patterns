<?php

/*
 * The Singleton design pattern is one of the creational patterns used to ensure that a class has only one instance of
 itself.
 *
 */

class ConnectDB
{
    // hold the object
    private static ConnectDB $instance;

    // connect database info
    private string $servername = "localhost";
    private string $dbUsername = "root";
    private string $dbPassword = "root";
    private string $dbName = "experiment";

    // to ensure that only one object of the class is created.
    private function __construct(){}

    // create instance
    public static function getInstance(): ConnectDB
    {
        if (is_null(self::$instance))
            self::$instance = new self();

        return self::$instance;
    }

    // connect to database
    public function connect(): bool|PDO
    {
        try {
            $dsn = "mysql:host={$this->servername};dbname={$this->dbName}";

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            return new PDO($dsn, $this->dbUsername, $this->dbPassword, $options);

        } catch (PDOException $exception) {
            echo "the connection to the database failed. " . $exception->getMessage();
            return false;
        }
    }

}

// Perform basic database operations
class CRUD
{
    private bool|PDO $dbConnection;

    public function __construct()
    {
        $this->dbConnection = ConnectDB::getInstance()->connect();
    }

    public function insert(string $table, array $fields, array $values): void
    {
        $fields = implode(',', $fields);

        $query = "INSERT INTO {$table} ({$fields}) VALUES(?, ?, ?)";

        $stmt = $this->dbConnection->prepare($query);
        $stmt->execute($values);
    }

    public function select(string $table, array $conditions = null): bool|array
    {
        $query = "SELECT * FROM {$table}";
        $sth = $this->dbConnection->prepare($query);
        $sth->execute();

        return $sth->fetchAll();
    }

    public function remove(string $table): void
    {
        $query = "DELETE FROM {$table}";
        $sth = $this->dbConnection->prepare($query);
        $sth->execute();
    }

}


$dbOperation = new CRUD();

$dbOperation->insert('users', ['name', 'email', 'password'], ['hassan', 'hassan@yahoo.com', '1234']);
$dbOperation->insert('users', ['name', 'email', 'password'], ['yasin', 'yasin@yahoo.com', '1234']);
$dbOperation->insert('users', ['name', 'email', 'password'], ['majid', 'majid@yahoo.com', '1234']);
$dbOperation->insert('users', ['name', 'email', 'password'], ['mehdi', 'mehdi@yahoo.com', '1234']);

$usersData = $dbOperation->select('users');

foreach ($usersData as $user) {
    echo "<p class='font-weight:bold'>{$user['name']} - {$user['email']}</p><br>";
}