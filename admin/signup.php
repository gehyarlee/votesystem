<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['signup'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$photo = $_POST['photo'];
		$created_on = $_POST['created_on'];

		// Add additional form fields and validation as needed

		// Check if the username already exists in the database
		$sql = "SELECT * FROM admin WHERE username = '$username'";
		$query = $conn->query($sql);

        // Check if a photo was uploaded
		if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK){
			$photo = $_FILES['photo']['name'];
			$photo_tmp = $_FILES['photo']['tmp_name'];
			$photo_path = '../images/profile.jpg' . $photo; // Adjust the path as per your requirement

			// Move the uploaded photo to the desired location
			move_uploaded_file($photo_tmp, $photo_path);
        }
		if($query->num_rows > 0){
			$_SESSION['error'] = 'Username already exists';
		}
		else{
			// Hash the password before storing it in the database
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

			// Insert the new user into the database
			$insertSql = "INSERT INTO admin (username, password, firstname, lastname, photo, created_on) VALUES ('$username', '$hashedPassword', '$firstname', '$lastname', '$photo_path', '$created_on')";
			if($conn->query($insertSql)){
				$_SESSION['success'] = 'Signup successful. You can now log in.';
			}
			else{
				$_SESSION['error'] = 'Signup failed. Please try again.';
			}
		}
	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}

	header('location: signup_index.php');
?>