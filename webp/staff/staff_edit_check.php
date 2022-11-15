<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ろくまる農園</title>
</head>

<body>
    <?php

    $staff_code  = $_POST["code"];
    $staff_name  = $_POST["name"];
    $staff_pass  = $_POST["pass"];
    $staff_pass2 = $_POST["pass2"];
    
    $staff_name  = htmlspecialchars($staff_name, ENT_QUOTES, "UTF-8");
    $staff_pass  = htmlspecialchars($staff_pass, ENT_QUOTES, "UTF-8");
    $staff_pass2 = htmlspecialchars($staff_pass2, ENT_QUOTES, "UTF-8");

    $errorFlag = false;

    if ($staff_name == "") {
        print "スタッフ名が入っていません。<br />";
        $errorFlag = true;
    } else {
        print "スタッフ名：";
        print $staff_name;
        print "<br />";
    }

    if ($staff_pass == "") {
        print "パスワードが入力されていません。<br />";
        $errorFlag = true;
    } 

    if ($staff_pass != $staff_pass2) {
        print "パスワードが一致しません<br />";
        $errorFlag = true;
    }

    if ($errorFlag) {
        print '<button type="button" onclick="history.back()">戻る</button>';
    } else {
        $staff_pass = md5($staff_pass);
        print '<form method="post" action="staff_edit_done.php">';
        print '<input type="hidden" name="code" value="' .$staff_code .'">';
        print '<input type="hidden" name="name" value="' .$staff_name .'">';
        print '<input type="hidden" name="pass" value="' .$staff_pass .'">';
        print "<br />";
        print '<button type="button" onclick="history.back()">戻る</button>';
        print '<button type="submit">ＯＫ</button>';
        print "</form>";
    }
?>
</body>

</html>