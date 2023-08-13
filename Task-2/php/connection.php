<?php
$server = "localhost:3307";
$username = "root";
$password = "";
$database = "users";
$connection = mysqli_connect("$server", "$username", "$password");
$select_db = mysqli_select_db($connection, $database);
if (!$select_db) {
    echo ("connection terminated!");
}

$email = $_POST['email'];
$password = $_POST['password'];

$select_query = mysqli_query($connection, "select * from user where email = '$email' and password = '$password'");
$row = $select_query->fetch_array();
$result = mysqli_num_rows($select_query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arvo;
            background-color: #F2EAD3;
        }
    </style>
</head>

<body>
    <?php
    if ($result > 0) {
        echo "<h1 style='text-align: center; color: #3F2305'> Welcome {$row['name']} 👋🏻</h1>";
    } else { ?>
        <script>
            alert("Invalid login credentials! Try Again!");
            history.go(-1);
        </script>
    <?php
    }
    ?>
</body>

</html>