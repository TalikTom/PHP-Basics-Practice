<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1><?= $greeting; ?></h1>


    <?php if ($score >= 90) :?>
        <strong>A</strong>
    <?php elseif ($score >= 80) :?>
        <strong>B</strong>
    <?php elseif ($score >= 70) :?>
        <strong>C</strong>
    <?php elseif ($score >= 60) :?>
        <strong>D</strong>
    <?php else :?>
        <strong>F</strong>
    <?php endif ?>

</body>
</html>