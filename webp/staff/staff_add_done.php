<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ろくまる農園</title>
    </head>
    <body>
        <?php
        try {
            $staff_name = $_POST["name"];
            $staff_pass = $_POST["pass"];

            $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, "UTF-8");
            $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, "UTF-8");
            
            $dsn = "mysql:dbname=shop;host=localhost;charset=utf8";
            $user = "root";
            $password = "";
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "insert into mst_staff(name, password) values(?, ?)";
            $stmt = $dbh->prepare($sql);
            $data[] = $staff_name;
            $data[] = $staff_pass;
            $stmt->execute($data);

            $dbh = null;

            print $staff_name;
            print "さんを追加しました。<br />";
        } catch(Exception $e) {
            print "ただいま障害により大変ご迷惑をおかけしております。";
            print "<br>" .$e->getMessage();
            exit();
        }
        ?>
        
        <a href="staff_list.php">戻る</a>
    </body>
</html>
