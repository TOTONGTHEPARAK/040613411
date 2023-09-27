<?php include "connect.php" ?>

<?php
    $stmt = $pdo->prepare("UPDATE member SET name=?, password=?, address=?, mobile=?, email=? WHERE username=?"); // เตรียมค าสง่ SQL ส าหรับแก้ไข
    $stmt->bindParam(1, $_POST["name"]); // ก าหนดค่าลงในต าแหน่ง ?
    $stmt->bindParam(2, $_POST["password"]);
    $stmt->bindParam(3, $_POST["address"]);
    $stmt->bindParam(4, $_POST["mobile"]);
    $stmt->bindParam(5, $_POST["email"]);
    $stmt->bindParam(6, $_POST["username"]);
if ($stmt->execute()) // เริ่มแก้ไขข้อมูล หากแก้ไขส าเร็จเงื่อนไขจะเป็ นจริง
    echo "แก้ไข " . $_POST["username"] . " สำเร็จ";
?>