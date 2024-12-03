<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Livre d'or</h1>

        <?php
        // Kết nối cơ sở dữ liệu
        include 'inc/connect.inc.php';

        // Xử lý form (thêm tin nhắn)
        include 'inc/inserer.inc.php';

        // Biểu mẫu nhập tin nhắn
        include 'inc/form.inc.php';

        // Hiển thị danh sách tin nhắn
        include 'inc/afficher.inc.php';

        // Ngắt kết nối cơ sở dữ liệu
        include 'inc/deconnect.inc.php';
        ?>
    </div>
</body>

</html>