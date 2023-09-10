<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .list {
            padding: 10px;
        }
        button {
            padding: 10px 15px;
            background: orange;
            border: 3px solid black;
        }
    </style>
</head>

<body>
    <?php

    include 'database.php';

    if (isset($_POST["submit"])) {
        $name = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST["email"];
        $contact = $_POST['phoneNumber'];
        $pass = $_POST['psw'];
        $confirpassword = $_POST['confirmPassword'];
        $gender = $_POST['gender'];
        
    }
    
    $data = array('full_name' => $name, 'username' => $username, 'email' => $email, 'phone_number' => $contact, 'password' => $pass, 'confirm_password' => $confirpassword, 'gender' => $gender);

    $table = 'form';
    $db = new Database();
    $query = $db->inserts($table, $data);
    if($query== "true"){
        echo "Record inserted successfully.";
        echo '<a class= list href = "list.php"><button>Show list</button> </a>';
    } else {
        echo "Error: " . $query;
    }
    ?>
</body>
</html>



