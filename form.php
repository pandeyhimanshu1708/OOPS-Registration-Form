<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include 'database.php';
    $db = new Database();
    $id = $_GET['id'];
    $table = 'form';
    $result = $db->form($table,$id);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $name = $row['full_name'];
        $username = $row['username'];
        $email = $row["email"];
        $contact = $row['phone_number'];
        $pass = $row['password'];
        $confirmpassword = $row['confirm_password'];
        $gender = $row['gender'];
//         echo
//             '<div class=main_conatiner>
//     <div class="container">
//         <h1 id="heading">Registration form</h1>
//         <form method="post" action="update.php" id="form">
//             <input type="hidden" name="id" value="' . $id . '">

// 
//             <label for="name">Full Name:</label>
//             <input type="text" name="name" id="name" value ="' . $name . '">

//             <label for="username">Username :</label>
//             <input type="text" name="username" id="username" value ="' . $username . '">

//             <label for="email">Email:</label>
//             <input type="email" name="email" id="email" value= "' . $email . '">
            
//             <label for="contact">Contact No. :</label> 
//             <input type="text" name="number" value ="' . $contact . '">

//             <label for="pass">Password :</label>
//             <input type="text" name="name" value ="'. $pass . '">

//             <label for="confirmpass">Confirm Password : </label>
//             <input type="text" name="confirmPassword" id="confirmPassword" value="' . $confirmpassword . '">

//             <label for="gender">Gender: </label>
//             <input type= "text" name="gender" value="'.$gender.'">
            
//             <input type="submit" id="submit" name="submit">
//         </form>
//     </div>
//    </div>';

   echo '
   <div class="container">
      <h1 class="form-title">Registration</h1>
      <form action="update.php" method="post" id="form" name="myForm" onsubmit=" return valid()">
        <div class="main-user-info">
          <div class="user-input-box">

            <label for="fullName">Full Name:<span style="color:red;">*</span></label>
            <input type="text"
                    id="fullName"
                    name="fullname"
                    value="' .$name .'" maxlength ="100">
                    <span id="require" class="required"> *Name should only contain letters and spaces!</span>        
          </div>
          <div class="user-input-box">
            <label for="username">Username:<span style=color:red;>*</label>
            <input type="text"
                    id="username"
                    name="username"
                    value = "'.$username.'"maxlength="10">
                    <span id="pandey" class="required">* Username should only contain letters and spaces!!</span>
          </div>
          <div class="user-input-box">
            <label for="email">Email:<span style=color:red;>*</label>
            <input type="email"
                    id="email"
                    name="email"
                    maxlength="50"
                    value="'.$email.'">
                    <span id="mail" class="required">*Please enter a valid email!!</span>
          </div>

          <div class="user-input-box">
            <label for="phoneNumber">Phone Number:<span style=color:red;>*</label>
            <input type="text"
                    id="phone_Number";
                    name="phoneNumber"
                    maxlength="10"
                    value="'.$contact.'">
                    <span id="contact_span" class="required">*Please insert a valid phone number!!</span>
          </div>
          <div class="user-input-box">
            <label for="psw">Password:<span style=color:red;>*</label>
            <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value ="'.$pass.'" required>
            <span id="pass" class="required">*Please enter a matched password!!</span>
          </div>

        <!-- 
          <div id="message">
          <h3>Password must contain the following:</h3>
          <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
          <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
          <p id="number" class="invalid">A <b>number</b></p>
          <p id="length" class="invalid">Minimum <b>8 characters</b></p>
          </div> --> 

          <div class="user-input-box">
            <label for="confirmPassword">Confirm Password:<span style=color:red;>*</label>
            <input type="password"
                    id="confirmPassword"
                    name="confirmPassword"
                    value="'.$confirmpassword.'">
                    <span id="c_pass" class="required">*Please enter the same password!!</span>
          </div>
        </div>
        <div class="gender-details-box">
          <span class="gender-title">Gender</span>
          <div class="gender-category">
            <input type="radio" name="gender" id="male" value="male"  required>
            <label for="male">Male</label>
            <input type="radio" name="gender" id="female" value="female">
            <label for="female">Female</label>
            <input type="radio" name="gender" id="other" value="other">
            <label for="other">other</label>
            <!-- <span id="Gender" class="required">*Please select the gender!!</span> -->
          </div>
        </div>
        <div class="form-submit-btn">
          <input type="submit" value="Register" name="submit">
       </div>
      </form>
    </div> 
  
<script>
//var mail_span = document.querySelector("#mail_span");
var span = document.querySelector("#require"); 
var span_user = document.querySelector("#pandey");
var span_email = document.querySelector("mail");
var contact_span = document.querySelector("#contact_span");
var span_pass = document.querySelector("#password");
// var span_cpass = document.querySelector("c_pass");


function valid() {

var user_fullname = document.forms.myForm.fullName.value;
// console.log(user_fullname);
if (user_fullname.trim() == ""){
  if (span.style.display = "none") {
      span.style.display = "block";
    };
  return false;
};

var user_username = document.forms.myForm.username.value;
// console.log(user_username);
if(user_username.trim() == ""){
  if(span_user.style.dispaly = "none"){
    span_user.style.display = "block";
  }
  return false;
}
var user_email = document.forms.myForm.email.value;
// console.log(user_email);
if (!user_email || user_email.trim() === "") {
                if (span_email.style.display = "none") {
                    span_email.style.display = "block";
                }
                return false;
            }
var user_contact = document.forms.myForm.phoneNumber.value;          
if (!validateContactNumber(user_contact)) {
  if (contact_span.style.display = "none") {
      contact_span.style.display = "block";
      }
      return false;
      }
var user_password =document.forms.myForm.psw.value;
var c_pass = document.forms.myForm.confirmPassword.value;
console.log(user_password);
console.log(c_pass);
if(user_password!= c_pass)
{
return false;
}
};

function validateContactNumber(contactNumber) {
// Define the regex pattern for a valid contact number (0-9, excluding 10 digits)
var pattern = /^\d{10,}$/;
// Test the input against the regex pattern
return pattern.test(contactNumber);
}
</script>';
} else {
        echo "No data found.";
    }

    ?>

</body>
</html>