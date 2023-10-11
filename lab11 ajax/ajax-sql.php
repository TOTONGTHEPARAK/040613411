<?php
$keyword = $_GET["keyword"];
$mysqli = new mysqli("localhost", "root", "", "blueshop");

if ($mysqli->connect_error) {
    echo "Connection failed: " . $mysqli->connect_error;
    die();
}

$keyword = $mysqli->real_escape_string($keyword); // Sanitize the input for security.

$sql = "SELECT * FROM member WHERE username LIKE '%$keyword%'";
$result = $mysqli->query($sql);
?>

<table border="1">
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><a href="5.php?username=<?php echo $row["username"]?>"><?php echo $row["name"]?></a></td>
        <td><?php echo $row["address"]?></td>
        <td><img src="img/<?php echo $row["username"] ?>.jpg" width="100"></td>
        <td><?php echo $row["mobile"]?></td>
        <td><?php echo $row["email"]?></td>
    </tr>
    <?php endwhile; ?>
</table>
