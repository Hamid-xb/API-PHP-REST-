<?php

namespace core;
class Post
{

    //db stuff
    private $conn;

    //post properties
    public $user_id;
    public $task;
    public $description;
    public $date;
    public $from;
    public $to;

    //constructor width db connection
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    //getting tasks from our database
    public function read()
    {

        $query = 'SELECT * FROM todos';

        //prepare statement
        $stmt = $this->conn->prepare($query);
        //execute query
        $stmt->execute();

        return $stmt;
    }
}

?>