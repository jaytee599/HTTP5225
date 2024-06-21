<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
        $connect = mysqli_connect('localhost', 'root', 'root', 'colours');
        if (!$connect) {
            echo 'Error code: ' . mysqli_connect_errno();
            exit;
        }
        $query = 'SELECT Name, Hex FROM colors';
        $result = mysqli_query($connect, $query);

        function hexToRgb($hex) {
            $hex = str_replace("#", "", $hex);
            if (strlen($hex) == 3) {
                $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
                $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
                $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
            } else {
                $r = hexdec(substr($hex, 0, 2));
                $g = hexdec(substr($hex, 2, 2));
                $b = hexdec(substr($hex, 4, 2));
            }
            return [$r, $g, $b];
        }

        function getBrightness($r, $g, $b) {
            return ($r * 299 + $g * 587 + $b * 114) / 1000;
        }
    ?>
    <div class="container">
        <div class="row">
            <?php
            if (!$result) {
                echo '<div class="alert alert-danger">Error: ' . mysqli_error($connect) . '</div>';
                exit;
            } else {
                echo '<div class="alert alert-success">The query found ' . mysqli_num_rows($result) . ' results.</div>';

                foreach ($result as $color) {
                    list($r, $g, $b) = hexToRgb($color['Hex']);
                    $brightness = getBrightness($r, $g, $b);
                    $textColor = $brightness > 128 ? '#000000' : '#FFFFFF';
                    echo '<div class="col-md-3">
                            <div class="card mt-2 mb-2">
                                <div class="card-header text-center">'
                        . ($color['Name']) .
                        '</div>
                                <div class="card-body" style="background-color:' . ($color['Hex']) . '; color:' . $textColor . '">
                                    <p class="card-text text-center">' . ($color['Hex']) . '</p>
                                </div>
                            </div>
                        </div>';
                }
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
