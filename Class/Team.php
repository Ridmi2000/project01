<?php

    include_once "DbConnection.php";  

	class Team extends DbConnection
	{
		
		// Insert data into team table
		public function storeData($post)
		{
			$sport = $this->con->real_escape_string($_POST['sport']);
			$fullName = $this->con->real_escape_string($_POST['fullname']);
			$position = $this->con->real_escape_string($_POST['position']);
			$description = $this->con->real_escape_string($_POST['description']);

			$imagePath = '';

			if (isset($_FILES['profile_img'])) {
				$file_tmp = $_FILES['profile_img']['tmp_name'];
				$file_name = $_FILES['profile_img']['name'];
				$file_size = $_FILES['profile_img']['size'];
		
				if ($file_size > 2097152) {
					echo "File size is too large. Max size is 2MB.";
					exit();
				}
		
				$target_dir = "uploads/Teams/";
				if (move_uploaded_file($file_tmp, $target_dir . $file_name)) {
					$imagePath = $target_dir . $file_name;
				} else {
					echo "File upload failed.";
				}
			}
		
		
			$query="INSERT INTO teams(sport,fullname,position,image_path,description) VALUES('$sport','$fullName','$position','$imagePath','$description')";
				$sql = $this->con->query($query);
				if ($sql==true) {
					header("Location:Teams.php");
				}else{
					echo "Failed try again!";
				}
			
		}

		public function displayDataSportPage($sportID)
		{
			$query = "select * from teams where sport = '$sportID'";
			$result = $this->con->query($query);
			if ($result->num_rows > 0) {
				$data = array();
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				return $data;
			
			}else{
				 echo "No data found";
			}
		}

		public function showSport($sportID)
		{
			$query = "select * from sports where id = '$sportID'";
			$result = $this->con->query($query);
			if ($result->num_rows > 0) {
				$data = array();
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				return $data;
			
			}else{
				 echo "No data found";
			}
		}

		public function getCpatains($sport)
		{ 
			$query = "select * from teams where position = 'Captain' and sport = '$sport' ";
			$result = $this->con->query($query);
			if ($result->num_rows > 0) {
				$data = array();
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				return true;
			
			}else{
				return false;
			}
			
		}
        
		// Fetch equipment records for show listing
		public function displayData()
		{
		    $query = "SELECT teams.id as team_id, teams.fullname,teams.description,teams.image_path,teams.position,sports.name  FROM teams INNER JOIN sports ON teams.sport = sports.id";
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
		    $query = "SELECT * FROM teams WHERE id = '$id'";
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
		    $sport = $this->con->real_escape_string($_POST['sport']);
			$fullName = $this->con->real_escape_string($_POST['fullname']);
			$position = $this->con->real_escape_string($_POST['position']);
			$description = $this->con->real_escape_string($_POST['description']);
		    $id = $this->con->real_escape_string($_POST['id']);

			$imagePath = '';
			

			if (isset($_FILES['profile_img']) && $_FILES['profile_img']['size'] > 0) {
				$file_tmp = $_FILES['profile_img']['tmp_name'];
				$file_name = $_FILES['profile_img']['name'];
				$file_size = $_FILES['profile_img']['size'];
		
				if ($file_size > 2097152) {
					echo "File size is too large. Max size is 2MB.";
					exit();
				}
		
				$target_dir = "uploads/Teams/";
				if (move_uploaded_file($file_tmp, $target_dir . $file_name)) {
					$imagePath = $target_dir . $file_name;
				} else {
					echo "File upload failed.";
				}

				if (!empty($id) && !empty($postData)) {
					$query = "UPDATE teams SET fullname = '$fullName', position = '$position', sport = '$sport', image_path='$imagePath', description='$description' WHERE id = '$id'";
					$sql = $this->con->query($query);
				if ($sql==true) {
					header("Location:Teams.php");
				}else{
					echo "Update failed try again!";
				}
				}
			}

			if (!empty($id) && !empty($postData)) {
				$query = "UPDATE teams SET fullname = '$fullName', position = '$position', sport = '$sport', description='$description' WHERE id = '$id'";
				$sql = $this->con->query($query);
			if ($sql==true) {
				header("Location:Teams.php");
			}else{
				echo "Update failed try again!";
			}
			}
		
          
			
		}
		// Delete data from equipment table
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM teams WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:Teams.php");
		}else{
			echo "Record does not delete try again";
		    }
		}
	}
?>