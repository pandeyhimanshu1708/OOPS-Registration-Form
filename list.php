<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        th {
            padding: 20px;
            border: 1px solid black;
        }
        td {
            padding: 10px;
            border: 1px solid black;
            font-size: 12px;
        }
        .btn-success {
            padding: 4px 8px;
            color: red;
            background-color: yellow;
            text-decoration: none;
            border: 1px solid red;
            /* font-size: 18px; */
        }
    </style>
</head>
<body>
    <table style="border:2px solid black; padding:15px; background:#ff45001c; width:100vw;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Password</th>
                <th>Confirm Passoword</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'database.php';
            $db = new Database();
            $table = 'form';
            $column = array('*');
            $selected_data = $db->select($table,$column);
if ($selected_data->num_rows > 0) {
            // Output data of each row
            while ($row = $selected_data->fetch_assoc()) {
                echo
                    "<tr?>" .
                    "<td>" . $row["id"] . "</td>" .
                    "<td>" . $row["full_name"] . "</td>" .
                    "<td>" . $row["username"] . "</td>" .
                    "<td>" . $row["email"] . "</td>" .
                    "<td>" . $row["phone_number"] . "</td>" .
                    "<td>" . $row["password"] . "</td>" .
                    "<td>" . $row["confirm_password"] . "</td>" .
                    "<td>" . $row["gender"] . "</td>" .
                    "<td> <a href='form.php?id={$row["id"]}' class='btn btn-success'>Edit</a></td>" .
                    "<td> <a href='delete.php?id={$row["id"]}' class='btn btn-success'>delete</a></td>" . "</tr>";
            }

        } else {
            echo "No data found";
        }
             // Close the connection
        ?>

        </tbody>
    </table>

</body>

</html>