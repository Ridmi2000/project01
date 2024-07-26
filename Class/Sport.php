<?php

    include_once "DbConnection.php";  

	class Sport extends DbConnection
	{
		
        public function getAllSports() 
        {
            $query = "SELECT * FROM sports";
		    $result = $this->con->query($query);
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
         
                }else{
                echo "No found records";
            }
        }

	}
?>