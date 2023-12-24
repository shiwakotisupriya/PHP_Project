<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" href="../css/styles.css"> 
</head>
<body>
    <div class="container">
        <nav class="middle-nav">
            <a href=<?=$home?>>Home</a>
            <a href=<?=$about?>>About Us</a>
            <a href=<?=$contact?>>Contact</a>
        </nav>

        <nav class="right-nav">
        <a href=<?=$page?>><?=$pg_title?></a>
    </nav>
    </div>
    <main>
    <?=$main?>
    </main>
</body>
</html>
