<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $pdo = new PDO("mysql:host=localhost;dbname=blueshop;charset=utf8", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
        $stmt->bindParam(1, $_GET["username"]); 
        $stmt->execute();  
        $row = $stmt->fetch();
    ?>

    <form action="update.php" method="post" enctype="multipart/form-data">
        username :<input type="text" name="username" value="<?=$row["username"]?>"><br>
        password :<input type="text" name="password" value="<?=$row["password"]?>"><br>
        name :<input type="text" name="name" value="<?=$row["name"]?>"><br>
        address : <br>
        <textarea name="address" rows="3" cols="40"><?=$row["address"]?></textarea><br>
        tel : <input type="text" name="mobile" value="<?=$row["mobile"]?>"><br>
        email :<input type="text" name="email" value="<?=$row["email"]?>"><br>
        upload image : <br>
        <img src='member_photo/<?=$row["username"]?>.jpg' width='250'> <br>
        <input type="file" name="profile"> <br> <br>

        <input type="submit" value="edit">
    </form>

</body>
</html>
