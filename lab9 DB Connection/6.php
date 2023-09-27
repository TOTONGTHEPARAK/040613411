<?php include "connect.php" ?>
<html>
    <head>
        <meta charset="utf-8">
        <script>
            function confirmDelete(username) { // ฟังก์ชนจะถูกเรียกถ้าผู้ใช ั คลิกที่ ้ link ลบ
                var ans = confirm("ต้องการลบ" + username); // แสดงกล่องถามผู้ใช ้
                if (ans==true) // ถ้าผู้ใชกด ้ OK จะเข ้าเงื่อนไขนี้
                document.location = "6-delete.php?username=" + username; // สงรหัสส ่ นค ้าไปให ้ไฟล์ ิ delete.php
            }
        </script>
    </head>
<body>
<form>
    <input type="text" name="keyword">
    <input type="submit" value="ค้นหา">
    <a href='7-addform.php'>add</a>
</form>
<div style="display:flex">
<?php
    $stmt = $pdo->prepare("SELECT * FROM member WHERE username LIKE ?");
    if (!empty($_GET)) // ถ ้ามีค่าที่สงมาจากฟอร์ม ่
        $value = '%' . $_GET["keyword"] . '%'; // ดึงค่าที่สงมาก าหนดให ้กับตัวแปรเงื่อนไข ่
    $stmt->bindParam(1, $value); // ก าหนดชอตัวแปรเงื่อนไขที่จุดที่ก าหนด ื่ ? ไว ้
    $stmt->execute(); // เริ่มค ้นหา
?>

<?php while ($row = $stmt->fetch()) : ?>
    <div style="padding: 15px; text-align: center">
        <img src='img/<?=$row["username"]?>.jpg' width='100'><br>
        <?=$row ["username"]?><br><?=$row ["name"]?><br>
        <?php
            echo "<a href='9-editform.php?username=" . $row ["username"] . "'>แก้ไข</a> | ";
            echo "<a href='#' onclick='confirmDelete(`" . $row["username"] . "`)'>ลบ</a>"
        ?>
    </div>
    
<?php endwhile; ?>
    
</div>

</body>
</html>