<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <?php
    $pdo = new PDO("mysql:host=localhost;dbname=blueshop;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        echo "username : " . $row["username"] . "<br>";
        echo "password : " . $row["password"] . "<br>";
        echo "name : " . $row["name"] . "<br>";
        echo "address : " . $row["address"] . "<br>";
        echo "tel : " . $row["mobile"] . "<br>";
        echo "email : " . $row["email"] . "<br>";
        echo "<a href='edit.php?username=" . $row["username"] . "'>edit</a> ";
        echo "<hr>\n";
    }
    ?>
</body>
</html>
