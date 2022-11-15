<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ろくまる農園</title>
</head>

<body>
    <?php
    try {
        $staff_code = $_GET["staffcode"];

        $dsn = "mysql:dbname=shop;host=localhost;charset=utf8";
        $user = "root";
        $password = "";
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "select name from mst_staff where code=?";
        $stmt = $dbh->prepare($sql);
        $data[] = $staff_code;
        $stmt->execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $staff_name = $rec["name"];

        $dbh = null;

    } catch (Exception $e) {
        print "ただいま障害により大変ご迷惑をおかけしております。";
        print "<br>" . $e->getMessage();
        exit();
    }
    ?>

    スタッフ修正<br />
    <br />
    スタッフコード<br />
    <?php print $staff_code; ?>
    <br />
    <br />
    <form method="post" action="staff_edit_check.php">
        <input type="hidden" name="code" value="<?php print $staff_code; ?>">
        スタッフ名<br />
        <input type="text" name="name" style="width:200px" value="<?php print $staff_name; ?>"><br />
        パスワードを入力してください<br />
        <input type="password" name="pass" style="width:100px"><br />
        パスワードをもう一度入力してください<br />
        <input type="password" name="pass2" style="width:100px"><br />
        <br />
        <button type="button" onclick="history.back()">戻る</button>
        <button type="submit">ＯＫ</button>
    </form>
</body>

</html>