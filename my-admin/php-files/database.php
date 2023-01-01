<?php
    class database{
        private $db_name = "myportfolio";
        private $db_host = "localhost";
        private $db_user = "root";
        private $db_pass = "";

        private $conn = false;
        private $result = array();
        private $mysqli ="";


        
        public function __construct(){
            if(!$this->conn){
                $this->mysqli = new mysqli ($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
                $this->conn = true;

                if($this->mysqli->connect_error){
                     array_push($this->result, $this->mysqli->connect_error."");
                     return false;
                }else{
                    return true;
                }
            }
        }

        // insert method from database
        public function insert($table, $params = array()){
            if($this->tableExist($table)){
                $tableColumns = implode(", ", array_keys($params));
                $table_value = implode("', '", $params);
                $sql = "INSERT INTO $table ($tableColumns) VALUES ('$table_value')";

                if($this->mysqli->query($sql)){
                    array_push($this->result, $this->mysqli->insert_id);
                    return true;
                }else{
                    array_push($this->result, $this->mysqli->error);
                    return false;
                }
            }else{
                return false;
            }
        }



        // select method from database
        public function select($table, $rows = '*', $join = null, $where = null, $order = null, $limit = null){
             if($this->tableExist($table)){
                $sql = "SELECT $rows FROM $table";
                
                if($join != null){
                    $sql .= ' JOIN '.$join;
                }
                if($where != null){
                    $sql .= ' WHERE '.$where;
                }
                if($order != null){
                    $sql .=  ' ORDER BY '.$order;
                }
                
                if($limit != null){
                    if(isset($_GET["page"])){
                          $page = $_GET["page"];
                          }
                          else{
                            $page = 1;
                          }
                          $start = ($page-1) * $limit;
      
                  $sql .= ' LIMIT '.$start.','.$limit;
              } 
                $this->myQuery = $sql;

                $query = $this->mysqli->query($sql);
                if($query){
                    $this->result = $query->fetch_all(MYSQLI_ASSOC);
                    return true;
                }else{
                    array_push($this->result, $this->mysqli->error);
                    return false;
                }
             }else{
                 return false;
             }
        }


        public function sql($sql){ // Pass back the SQL
            $query = $this->mysqli->query($sql);
    
            if($query){
          $sql_array = explode(' ',$sql);
          switch ($sql_array[0]) {
            case "INSERT":
              array_push($this->result,$this->mysqli->insert_id);
              break;
            case "UPDATE":
              array_push($this->result,$this->mysqli->affected_rows);
              break;
            case "DELETE":
              array_push($this->result,$this->mysqli->affected_rows);
              break;
            case "SELECT":
              array_push($this->result,$query->fetch_all(MYSQLI_ASSOC));
              break;
          }
                // $this->result = $query->fetch_all(MYSQLI_ASSOC);
                return true; // Query was successful
            }else{
                array_push($this->result,$this->mysqli->error);
                return false; // No rows where returned
            }
        }


        // Update methord from database
        public function update($table,$params=array(),$where = null){
            // Check to see if table exists
            if($this->tableExist($table)){
                // Create Array to hold all the columns to update
                $args=array();
                        foreach($params as $key=>$value){
                            // Seperate each column out with it's corresponding value
                            // $args[]=$key.'="'.$value.'"';
                            $args[]="$key='$value'";
                        }
                        // print_r($params);
                        // print_r($args);
                        // Create the query
                        //$sql='UPDATE '.$table.' SET '.implode(',',$args).' WHERE '.$where;
                        $sql="UPDATE $table SET " . implode(',',$args);
                        if($where != null){
                    $sql .= " WHERE $where";
                        }
                        $this->myQuery = $sql; // Pass back the sql
                 // Make query to database
              if($query = $this->mysqli->query($sql)){
                  array_push($this->result,$this->mysqli->affected_rows);
                  return true; // Update has been successful
              }else{
                  array_push($this->result,$this->mysqli->error);
                  return false; // Update has not been successful
              }
            }else{
                return false; // The table does not exist
            }
        }

        // delete method for database
        public function delete ($table, $where = null){
            if($this->tableExist($table)){
                $sql = "DELETE * FROM $table";

                if($where != null){
                    $sql .= " WHERE $sql";
                }
                if($this->mysqli->query($sql)){
                    array_push($this->result, $this->mysqli->affected_rows);
                    return true;
                }else{
                    array_push($this->result, $this->mysqli->error);
                }
            }else{
                return false;
            }
        }

        public function getResult(){
            $val = $this->result;
            $this->result = array();
            return $val;
        }

        public function escapeString($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $this->mysqli->real_escape_string($data);
          }

        // tabkle exit
        private function tableExist($table){
            $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
            $tableInDb = $this->mysqli->query($sql);
            if($tableInDb){
                if($tableInDb->num_rows == 1){
                    return true;
                }
            }else{
                array_push($this->result, $table."dose not exist in database");
                return false;
            }
        }
        // cloese connection
        public function __destruct(){
            if($this->conn){
                if($this->mysqli->close()){
                    $this->conn = false;
                    return true;
                }
            }
            return false;
        }
    }
?>