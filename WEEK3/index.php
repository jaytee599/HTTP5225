<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 3</title>
</head>
<body>
    <?php
    // Get the current hour in 24-hour format
    $hour = date('G');

    // Determine the appropriate greeting based on the hour
    if ($hour >= 5 && $hour < 12) {
        echo 'Good Morning!';
    } elseif ($hour >= 12 && $hour < 18) {
        echo 'Good Afternoon!';
    } elseif ($hour >= 18 && $hour < 21) {
        echo 'Good Evening!';
    } else {
        echo 'Good Night!';
    }
    ?>
</body>
</html>
