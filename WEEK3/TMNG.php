<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magic Number Game</title>
</head>
<body>
    <h1>Magic Number Game</h1>
    <form method="post" action="">
        <label for="number">Enter a number:</label>
        <input type="number" id="number" name="number" required>
        <input type="submit" value="Check Magic Number">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the input number
        $number = intval($_POST['number']);

        // Determine the magic number
        if ($number % 3 == 0 && $number % 5 == 0) {
            echo "<p>The magic number is: FizzBuzz</p>";
        } elseif ($number % 3 == 0) {
            echo "<p>The magic number is: Fizz</p>";
        } elseif ($number % 5 == 0) {
            echo "<p>The magic number is: Buzz</p>";
        } else {
            echo "<p>The magic number is: $number</p>";
        }
    }
    ?>
</body>
</html>
