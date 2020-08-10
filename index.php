<?php
    //各変数等の宣言
    include './init.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <h1>AtCoder Contest Result</h1>
    </header>
    <main class="mainInner">
        <form action="./index.php" method="post">
            <strong>UserName</strong><br>
            <input type="text" name="username" class="name" placeholder="chokudai">
            <input type="submit" class="submit">
        </form>

        <?php if($username != ''){ ?>
            <h2><?php echo $username; ?>さんのコンテスト成績表</h2>
            <table class="contestTable">
                <tr>
                    <th>コンテスト</th>
                    <th>順位</th>
                    <th>パフォーマンス</th>
                    <th>Rating</th>
                    <th>差分</th>
                </tr>

                <?php for($i = 0; $i < $contestNum; $i++){ ?>
                    <tr>
                        <td>
                            <a href="https://<?php echo $ContestScreenName[$i]; ?>/" target="_blank">
                                <?php echo $ContestName[$i]; ?>
                            </a>
                        </td>
                        <td><?php echo $Place[$i]; ?></td>
                        <td><?php echo $Performance[$i]; ?></td>
                        <td><?php echo $NewRating[$i]; ?></td>
                        <td>
                            <?php if($RatingDifference[$i] > 0) echo "+"; echo $RatingDifference[$i]; ?>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        <?php } ?>

    </main>
</body>
</html>