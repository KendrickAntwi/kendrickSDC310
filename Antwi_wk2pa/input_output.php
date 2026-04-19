<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kendrick Antwi wk2pa</title>
</head>
<body>
    <form method="POST" action="">
        Enter your name: <input type="text" name="name" /><br><br>
        Enter your birthdate: <input type="text" name="birthdate" /><br><br>
        Enter your favorite color: <input type="text" name="color" /><br><br>
        Enter your favorite place to visit: <input type="text" name="place" /><br><br>
        Enter your nickname: <input type="text" name="nickname" /><br><br>
        <input type="submit" name="submit"  value="Submit Values" />
    </form>

    <?php
        if (isset($_POST['submit'])) {
            echo "Debug: Form was submitted";
            $name = $_POST['name'];
            $birthdate = $_POST['birthdate'];
            $color = $_POST['color'];
            $place = $_POST['place'];
            $nickname = $_POST['nickname'];
        }

        var_dump($_POST);

        // Name
        if (!empty($name)) {
            echo "<p><strong>The name you entered is: $name</strong></p>";
        } else {
            echo "<p><strong>You didn't enter a name!</strong></p>";
        }
        // Birthday
        if (!empty($birthdate)) {
            echo "<p><strong>The birthdate you gave is: $birthdate</strong></p>";
        } else {
            echo "<p><strong>You didn't enter a birthdate!</strong></p>";
        }
        // color
        if (!empty($color)) {
            echo "<p><strong>Your favorite color you entered is: $color</strong></p>";
        } else {
            echo "<p><strong>You didn't enter a favorite color!</strong></p>";
        }
        // place
        if (!empty($color)) {
            echo "<p><strong>Your favorite place you entered is: $place</strong></p>";
        } else {
            echo "<p><strong>You didn't enter a favorite place!</strong></p>";
        }
        // nickname
        if (!empty($nickname)) {
            echo "<p><strong>Your nickname is: $nickname</strong></p>";
        } else {
            echo "<p><strong>You didn't enter a nickname!</strong></p>";
        }
    ?>
</body>
</html>