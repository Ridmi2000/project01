<?php

include_once "DbConnection.php";  

class Events extends DbConnection{

      // Fetch equipment records for show listing
		public function displayData()
		{
		    $query = "SELECT * FROM events ORDER BY id";
		    $result = $this->con->query($query);
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                
                return json_encode($data);
                
            }
        }



        public function displayDataFortable()
		{
		    $query = "SELECT * FROM events ORDER BY id";
		    $result = $this->con->query($query);
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                
                return $data;
            }
        }


        // Insert data into event table
		public function storeData($post)
		{
			$title= $this->con->real_escape_string($_POST['title']);
			$description = $this->con->real_escape_string($_POST['description']);
			// $start= $this->con->real_escape_string($_POST['start_date']);
            // $end= $this->con->real_escape_string($_POST['end_date']);

            $start = date('Y-m-d 00:00:00', strtotime($_POST['start_date']));
            $end= date('Y-m-d 23:59:59', strtotime($_POST['end_date']));

        
			$query="INSERT INTO events (title,description,start,end) VALUES ('".$title."','".$description."', '".$start."','".$end ."')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:admin_event.php");
			}else{
			    echo "Failed try again!";
			}
		}


		public function deleteEvent($eventId)
{
    $query = "DELETE FROM events WHERE id = ?";
    $statement = $this->con->prepare($query);
    
    if ($statement) {
        $statement->bind_param('i', $eventId);
        $statement->execute();
        
        if ($statement->affected_rows > 0) {
            // Deletion successful
            return true;
        } else {
            // Deletion failed or no rows were affected
            return false;
        }
    } else {
        // Error in preparing the statement
        return false;
    }
}


}

?>