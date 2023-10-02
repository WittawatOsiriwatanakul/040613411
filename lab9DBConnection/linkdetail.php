<!DOCTYPE html>
<html lang="en">
<body>
<?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];

    $profilePicture = $_FILES["profile"];

    if (!empty($profilePicture["name"])) {
        $uploadDirectory = "member_photo/";

        $profilePictureName = $username . ".jpg";

        if (move_uploaded_file($profilePicture["tmp_name"], $uploadDirectory . $profilePictureName)) {
            $pdo = new PDO("mysql:host=localhost;dbname=blueshop;charset=utf8", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO member (username, password, name, address, mobile, email) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $password);
            $stmt->bindParam(3, $name);
            $stmt->bindParam(4, $address);
            $stmt->bindParam(5, $mobile);
            $stmt->bindParam(6, $email);

            $stmt->execute(); 

            header("location: detail.php?username=" . $username);
        } 
    } 
?>
</body>
</html>
