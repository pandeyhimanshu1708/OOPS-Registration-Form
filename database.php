<?php
class Database
{

    private $host = 'localhost';
    private $user = 'root';
    private $password = '123456';
    private $database = 'ginger';
    private $connection;


    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        } else {
            echo "database connected";
        }
    }

    public function inserts($table, $data)
    {

        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $query = "INSERT INTO $table ($columns) VALUES ($values)";

        if ($this->connection->query($query) === TRUE) {
            $query = "true";
            return $query;
    }}
    public function select($table ,$column)
    {
        $values = implode(",", $column);
        $query = "SELECT $values FROM $table";
        $result = $this->connection->query($query);
        return $result;   
    }

    public function update($table, $data, $id) {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= "$key = '$value', ";
        }
        $set = rtrim($set, ", ");
        $query = "UPDATE $table SET $set WHERE id = $id";
        
       if ($this->connection->query($query) === TRUE) {
        $query = "true";
        return $query;
    }}


public function form($table,$id){
    $sql = "SELECT * FROM $table WHERE id = '$id'";
    // echo $sql;
    
    $result = $this->connection->query($sql);
    return $result;
}
public function delete($table, $id) {
    $query = "DELETE FROM $table WHERE ID = '$id'";
    
    if ($this->connection->query($query) === TRUE) {
        $query = "true";
        return $query;
}
}
    public function __distruct()
    {
        $this->connection->close();
    }

}

?>




