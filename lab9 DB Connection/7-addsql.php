<?php include "connect.php" ?>
<?php
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