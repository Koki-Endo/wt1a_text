<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ろくまる農園</title>
    </head>
    <body>
        <?php
        try {
            $dsn = "mysql:dbname=shop;host=localhost;charset=utf8";
            $user = "root";
            $password = "";
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sql = "select code, name from mst_staff where 1";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
    
            $dbh = null;
    
            print "スタッフ一覧<br /><br />\n";

            print '<form method="post" action="staff_branch.php">' ."\n";
            while(true) {
                $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($rec == false) {
                    break;
                }
                print '<input type="radio" name="staffcode" value="' .$rec["code"] .'">';
                print $rec["name"];
                print "<br />\n";
            }
            print '<button type="submit" name="disp">参照</button>' ."\n";
            print '<button type="submit" name="add">追加</button>' ."\n";
            print '<button type="submit" name="edit">修正</button>' ."\n";
            print '<button type="submit" name="delete">削除</button>' ."\n";
            print "</form>\n";
        } catch(Exception $e) {
            print "ただいま障害により大変ご迷惑をおかけしております。";
            print "<br>" .$e->getMessage();
            exit();
        }
    ?>
    </body>
</html>
