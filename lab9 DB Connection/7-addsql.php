<?php include "connect.php" ?>
<?php
    $filename = $_POST["username"].".jpg"; //เปลี่ยนชื่อ file ให่เป็น .jpg
    $tempname = $_FILES["image"]["tmp_name"];  //จะเก็บไว้ใน tempname
    $folder = "./img/" . $filename; //folder ที่เก็บรูป จะเอารูปมาเก็บไว้ที่ folder
    //print_r($_FILES["image"]);
    move_uploaded_file($tempname, $folder); //ย้ายไฟล์ จาก tempname ไปยัง folder
    $stmt = $pdo->prepare("INSERT INTO member VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $_POST["username"]);
    $stmt->bindParam(2, $_POST["password"]);
    $stmt->bindParam(3, $_POST["name"]);
    $stmt->bindParam(4, $_POST["address"]);
    $stmt->bindParam(5, $_POST["mobile"]);
    $stmt->bindParam(6, $_POST["email"]);
    $stmt->execute(); // เริ่มเพิ่มข้อมูล
    $pid = $pdo->lastInsertId(); // ขอคีย์หลักที่เพิ่มส าเร็จ

    header("location: 5.php?username=" . $_POST["username"]);
?>
<html>
<head><meta charset="UTF-8"></head>
<body>
</body>
</html>