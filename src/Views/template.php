<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($requestTitle, ENT_QUOTES, 'UTF-8') ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($requestTitle, ENT_QUOTES, 'UTF-8') ?></h1>
    <p><strong>User Name:</strong> <?= htmlspecialchars($userName, ENT_QUOTES, 'UTF-8') ?></p>
    <p><strong>Generated Date:</strong> <?= htmlspecialchars($date, ENT_QUOTES, 'UTF-8') ?></p>
    <p><strong>Description:</strong> <?= htmlspecialchars($requestDescription, ENT_QUOTES, 'UTF-8') ?></p>
</body>
</html>
