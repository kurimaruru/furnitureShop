<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>ワークショップ</title>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <ul>
                <li class="size">WorkShop</li>
                <li class="list">ITEMS</li>
                <li class="list">FEATURE</li>
                <li class="list">COORDINATE</li>
                <li class="list">SHOP</li>
                <li class="list">CONTENT</li>
                <li class="space"><img src="icon/hart.png" class="icon"></li>
                <li><img src="icon/man.png" class="icon"></li>
                <li><img src="icon/cart.png" class="icon"></li>
                <li><input type="text" placeholder="Search"></li>
                <li><img src="icon/search.png" class="icon"></li>
            </ul>
        </div>
        <div class="main">
            <?php
            // 作成したdb_connect.phpを読み込む
            require_once('db_connect.php');

            // 実行したいSQL文を準備
            $sql = "SELECT * FROM items";
            // 関数db_connect()からPDOを取得する
            $pdo = db_connect();
            try {
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
                die();
            }
            ?>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                <div class="items clearfix">
                    <img src="img/<?php echo $row['image_url']; ?>" class="items-img">
                    <p><?php echo $row['name']; ?></p>
                    <p>¥<?php echo $row['price']; ?> (税込み) </p>
                </div>
            <?php endwhile; ?>

        </div>
    </div>
</body>

</html>