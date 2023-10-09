<?php
  include "connect.php"; 
  session_start();
  $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ? AND password = ?");
  $stmt->bindParam(1, $_POST["username"]);
  $stmt->bindParam(2, $_POST["password"]);
  $stmt->execute();
  $row = $stmt->fetch();
  
  if (!empty($row)) {     
    $_SESSION["fullname"] = $row["name"];   
    $_SESSION["username"] = $row["username"];
    
    if ($row["username"] == "admin") {
      $_SESSION["rule"] = "admin";
    } else {
      $_SESSION["rule"] = "user";
    }     
    echo "เข้าสู่ระบบสำเร็จ<br>";
    echo "<a href='userhome.php'>ไปยังหน้าหลักของผู้ใช้</a>"; 
  }else {
    echo "ไม่สำเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง";
    echo "<a href='loginform.php'>เข้าสู่ระบบอีกครัง</a>"; 
  }
?>
