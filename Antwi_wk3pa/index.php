<?php
session_start();

$conn = mysqli_connect("localhost", "ecpi_user", "ecpi_pass", "sdc310_wk3pa");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM personal_info WHERE id = $id");
    $_SESSION['message'] = "Record deleted successfully.";
    header("Location: index.php");
    exit();
}

// ADD
if (isset($_POST['add'])) {
    $name   = $_POST['Name'];
    $dob    = $_POST['DateOfBirth'];
    $color  = $_POST['FavoriteColor'];
    $place  = $_POST['FavoritePlace'];
    $nick   = $_POST['Nickname'];

    mysqli_query($conn, "INSERT INTO personal_info (Name, DateOfBirth, FavoriteColor, FavoritePlace, Nickname)
                         VALUES ('$name', '$dob', '$color', '$place', '$nick')");
    $_SESSION['message'] = "Record added successfully.";
    header("Location: index.php");
    exit();
}

// UPDATE
if (isset($_POST['update'])) {
    $id     = $_POST['id'];
    $name   = $_POST['Name'];
    $dob    = $_POST['DateOfBirth'];
    $color  = $_POST['FavoriteColor'];
    $place  = $_POST['FavoritePlace'];
    $nick   = $_POST['Nickname'];

    mysqli_query($conn, "UPDATE personal_info SET
        Name='$name', DateOfBirth='$dob', FavoriteColor='$color',
        FavoritePlace='$place', Nickname='$nick'
        WHERE id=$id");
    $_SESSION['message'] = "Record updated successfully.";
    header("Location: index.php");
    exit();
}

// Load record into edit form if Edit is clicked
$editRow = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM personal_info WHERE id = $id");
    $editRow = mysqli_fetch_assoc($result);
}

// Get all records
$result = mysqli_query($conn, "SELECT * FROM personal_info");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kendrick Antwi Wk 3 Performance Assessment</title>
    <style>
        table { border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 6px 12px; }
    </style>
</head>
<body>

<h1>Your Name Wk 3 Performance Assessment</h1>

<?php
if (isset($_SESSION['message'])) {
    echo "<p><b>" . $_SESSION['message'] . "</b></p>";
    unset($_SESSION['message']);
}
?>

<!-- TABLE -->
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Favorite Color</th>
        <th>Favorite Place To Visit</th>
        <th>Nickname</th>
        <th>Actions</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['Name']; ?></td>
        <td><?php echo $row['DateOfBirth']; ?></td>
        <td><?php echo $row['FavoriteColor']; ?></td>
        <td><?php echo $row['FavoritePlace']; ?></td>
        <td><?php echo $row['Nickname']; ?></td>
        <td>
            <a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
            |
            <a href="index.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

<br>

<!-- ADD FORM -->
<h2>Add New Record</h2>
<form method="POST" action="index.php">
    Name: <input type="text" name="Name"><br><br>
    Date of Birth: <input type="text" name="DateOfBirth"><br><br>
    Favorite Color: <input type="text" name="FavoriteColor"><br><br>
    Favorite Place To Visit: <input type="text" name="FavoritePlace"><br><br>
    Nickname: <input type="text" name="Nickname"><br><br>
    <input type="submit" name="add" value="Add Record">
</form>

<br>

<!-- EDIT FORM -->
<?php if ($editRow) { ?>
<h2>Edit Record</h2>
<form method="POST" action="index.php">
    <input type="hidden" name="id" value="<?php echo $editRow['id']; ?>">
    Name: <input type="text" name="Name" value="<?php echo $editRow['Name']; ?>"><br><br>
    Date of Birth: <input type="text" name="DateOfBirth" value="<?php echo $editRow['DateOfBirth']; ?>"><br><br>
    Favorite Color: <input type="text" name="FavoriteColor" value="<?php echo $editRow['FavoriteColor']; ?>"><br><br>
    Favorite Place To Visit: <input type="text" name="FavoritePlace" value="<?php echo $editRow['FavoritePlace']; ?>"><br><br>
    Nickname: <input type="text" name="Nickname" value="<?php echo $editRow['Nickname']; ?>"><br><br>
    <input type="submit" name="update" value="Update Record">
</form>
<?php } ?>

</body>
</html>