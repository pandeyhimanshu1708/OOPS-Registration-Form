<?php
if (isset($_POST["submit"])) {
    $id = $_POST['id'];
    $name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST["email"];
    $contact = $_POST['phoneNumber'];
    $pass = $_POST['psw'];
    $confirmpassword = $_POST['confirmPassword'];
    $gender = $_POST['gender'];
    
}
include 'database.php';
$table = 'form';
// $ids = $id; 
$data = array( 'full_name' => $name, 'username' => $username, 'email' => $email,'phone_number' => $contact, 'password' => $pass, 'confirm_password' => $confirmpassword, 'gender' => $gender);

$db = new Database();
$queryy= $db->update($table, $data, $id);
if($query = "true"){
    echo "Record updated successfully.";
    echo '<a class= list href = "list.php"><button>Show list</button> </a>';
} 
else {
    echo "Error: " . $query;
}
?>



