<?php
include 'database.php';

if (isset($_POST["submit"])) {
    $id = $_POST['id'];
    $name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST["email"];
    $contact = $_POST['phone_number'];
    $pass = $_POST['password'];
    $confirmpassword = $_POST['confirm_password'];
    $gender = $row['gender'];
   
}
$id= $_GET['id'];
$table = 'form';
$db = new Database();
$query =$db->delete($table, $id);

if($query== "true"){
    echo "Record deleted successfully.";
    echo '<a class= list href = "list.php"><button>Show list</button> </a>';
} else {
    echo "Error: " . $query;
}
?>
