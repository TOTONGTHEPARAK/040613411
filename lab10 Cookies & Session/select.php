<html>
<body>
    <?php
    $lang = $_GET["language"];
    if($lang=="en"){
        setcookie("lang", "en", time() + 3600 * 24);
    }
    if($lang=="th"){
        setcookie("lang", "th", time() + 3600 * 24);
    }
    ?>
</body>
</html>