<?php
class Database
{
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'oppphp';
    private $conn = false;
    private $mysqli = "";
    public $result = array();

    // creating the database connection here
    public function __construct()
    {
        if (!$this->conn) {
            $this->mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
            $this->conn = true;
            if ($this->mysqli->connect_error) {
                array_push($this->result, $this->mysqli_connect_error);
                return false;
            }
        } else {
            return true;
        }
    }

    public function select($table)
    {
        $record = array();
        $sql = "SELECT * FROM $table";
        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            $record[] = $row;
        }
        return $record;
    }
    public function insert($table, $params = array())
    {
        if ($this->isTableExists($table)) {
            $table_columns = implode(', ', array_keys($params));
            $table_values = implode("', '", $params);

            $sql = "INSERT into $table($table_columns) VALUES('$table_values');";
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->insert_id);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }
    }
    public function update()
    {
    }
    public function delete($table, $record_id)
    {
        $sql = "DELETE FROM $table WHERE `$table`.`id` = $record_id";
        $result = $this->mysqli->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    private function isTableExists($table)
    {
        $sql = "SHOW TABLES FROM $this->dbname LIKE '$table'";
        $is_table = $this->mysqli->query($sql);
        if ($is_table) {
            if ($is_table->num_rows == 1) {
                return true;
            } else {
                array_push($this->result, $table . " table does not exits in this database");
                return false;
            }
        }
    }
    // closing the database connection here
    public function __destruct()
    {
        if ($this->conn) {
            if ($this->mysqli->close()) {
                $this->conn = false;
                return true;
            }
        } else {
            return false;
        }
    }
}
