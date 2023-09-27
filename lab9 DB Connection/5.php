<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8"></head>
<?php
    // 1. ก าหนดค าสงั่ SQL ให ้ดึงสนค ้าตามรหัสส ิ นค ้า ิ
    $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
    $stmt->bindParam(1, $_GET["username"]); // 2. น าค่า pid ที่สงมากับ ่ URL ก าหนดเป็นเงื่อนไข
    $stmt->execute(); // 3. เริ่มค ้นหา
    $row = $stmt->fetch(); // 4. ดึงผลลัพธ์ (เนื่องจากมีข ้อมูล 1 แถวจึงเรียกเมธอด fetch เพียงครั้งเดียว)
?>

<div style="display:flex">
    <div>
        <img src='img/<?=$row["username"]?>.jpg' width='200'>
    </div>
    <div style="padding: 15px">
        <h2><?=$row["username"]?></h2>
        ชื่อ :<?=$row["name"]?><br>
        พาสเวิด : <?=$row["password"]?><br>
        ที่อยู่ : <?=$row["address"]?><br>
        เบอร์ : <?=$row["mobile"]?><br>
        อีเมล : <?=$row["email"]?><br>
    </div>
</div>
</body>
</html>