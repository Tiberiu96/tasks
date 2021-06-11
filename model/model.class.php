<?php
Class Model{
    private $host = "localhost";
    private $name = "root";
    private $password = "";
    private $db_name = "tasks";

    public function db_connect(){
       $db= mysqli_connect($this->host, $this->name, $this->password, $this->db_name);
       return $db;
    }

    public function is_user_exist($email){
        $db = $this->db_connect();
        $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $query = mysqli_query($db, $sql);
        if(mysqli_num_rows($query) > 0){
            return true;
        }

    } 

    public function add_user_to_db($email, $name, $password){
        $db = $this->db_connect();
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(`email`, `name`, `password`, `img`, `admin`) VALUES ('$email', '$name', '$password', 'default', 0)";
        $query = mysqli_query($db, $sql);
    }

    public function login_verify($email, $password){
        $db = $this->db_connect();
        $sql = "SELECT `email`, `password` FROM users WHERE `email`='$email' LIMIT 1";
        $query = mysqli_query($db, $sql);
        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            if(password_verify($password,$row['password'])){
                return true;
            }
        }
    }

    public function get_user_data($email){
        global $db;
        $sql = "SELECT * FROM users WHERE `email` = '$email'";
        $query = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($query);
        
        return $row;
    }

    public function add_task($title, $description, $id){
            global $db;
            $sql = "INSERT INTO tasks(`title`, `description`, `userID`, `checked`) VALUES ('$title', '$description', '$id', '0')";
            $query = mysqli_query($db, $sql);
    }

    public function show_all_tasks($userID){
        global $db;
        $sql = "SELECT tasks.title, tasks.description,tasks.taskID, tasks.checked, users.name FROM tasks  JOIN users ON tasks.userID = users.id WHERE tasks.userID ='$userID' AND users.id ='$userID'"; 
        $query = mysqli_query($db, $sql);
        $row = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $row;
    }

    public function delete_task($taskID){
        $db = $this->db_connect();
        $sql = "DELETE FROM tasks WHERE `taskID` = '$taskID'";
        $query = mysqli_query($db, $sql);
        return true;
    }

    public function update_task($title, $description, $id){
        global $db;
        $sql = "UPDATE tasks SET `title` = '$title', `description` = '$description' WHERE `taskID` = '$id'";
        $query = mysqli_query($db, $sql);
        return true;

    }

    public function upload_file($random, $id){
        $db = $this->db_connect();
        $sql = "UPDATE users SET `img` = '$random' WHERE `id` = '$id'";
        $query = mysqli_query($db, $sql);
    }

    public function change_password($hashed, $id){
        $db = $this->db_connect();
        $sql = "UPDATE users SET `password` = '$hashed' WHERE `id` = '$id'";
        $query = mysqli_query($db, $sql);
    }

    public function set_check($taskID){
        $db = $this->db_connect();
        $sql = "UPDATE tasks SET `checked` = '1' WHERE `taskID` = '$taskID'";
        $query = mysqli_query($db, $sql);
    }

    public function show_all_users(){
        $db = $this->db_connect();
        $sql = "SELECT * from users JOIN tasks ON  users.id = tasks.userID ORDER BY users.name";
        $query = mysqli_query($db, $sql);
        $row = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $row;

    }
}

?>