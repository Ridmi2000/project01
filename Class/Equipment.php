<?php

   include_once "Class/DbConnection.php";  

	class Equipment extends DbConnection
	{
		
		// Insert data into equipment table
		public function storeData($post)
		{
			$sports_name = $this->con->real_escape_string($_POST['sports_name']);
			$equipment_type = $this->con->real_escape_string($_POST['equipment_type']);
			$qty = $this->con->real_escape_string($_POST['qty']);
			
			$query="INSERT INTO equipment(sports_name,equipment_type,qty) VALUES('$sports_name','$equipment_type','$qty')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:EquipmentStock.php?msg1=insert");
			}else{
			    echo "Failed try again!";
			}
		}
        
		// Fetch equipment records for show listing
		public function displayData()
		{
		    $query = "SELECT * FROM equipment";
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

		// Fetch single data for edit from equipment table
		public function displyaRecordById($id)
		{
		    $query = "SELECT * FROM equipment WHERE id = '$id'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Record not found";
		    }
		}

		// Update data in equipment table
		public function updateRecord($postData)
		{
		    $sports_name = $this->con->real_escape_string($_POST['sports_name']);
		    $equipment_type = $this->con->real_escape_string($_POST['equipment_type']);
		    $qty = $this->con->real_escape_string($_POST['qty']);
		    $id = $this->con->real_escape_string($_POST['id']);
		
            if (!empty($id) && !empty($postData)) {
                $query = "UPDATE equipment SET sports_name = '$sports_name', equipment_type = '$equipment_type', qty = '$qty' WHERE id = '$id'";
                $sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:EquipmentStock.php?msg2=update");
			}else{
			    echo "Update failed try again!";
			}
		    }
			
		}
		// Delete data from equipment table
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM equipment WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:EquipmentStock.php?msg3=delete");
		}else{
			echo "Record does not delete try again";
		    }
		}
	}
?>