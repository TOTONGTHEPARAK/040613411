<?php include "connect.php" ?>
<html>
    <head><meta charset="utf-8"></head>
<body>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM product");
    $stmt->execute();
    $i = 0;
    while ($row = $stmt->fetch()) {
        $pid[$i] = $row["pid"];
        $pname[$i] = $row["pname"];
        $pdetail[$i] = $row["pdetail"];
        $price[$i] = $row["price"];
        $i++;
    }
    echo "
    <table border='1' width='auto'>
        <tr>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>รายละเอียดสินค้า</th>
            <th>ราคา</th>
        </tr>";
    for ($j = 0; $j < $i; $j++) {
        echo "<tr><td>" . $pid[$j] . "</td><td>" . $pname[$j] . "</td><td>" . $pdetail[$j] . "</td><td>" . $price[$j] . " บาท" . "</td></tr>";
    }
    echo "
        </table>
    ";
    ?>
</body>
</html>