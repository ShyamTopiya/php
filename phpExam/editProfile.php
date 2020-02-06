<?php
require_once "connection.php";

$query = "SELECT * FROM user";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);
}
function updateData($tableName, $userId)
{
    echo "hii" . $userId;
    global $conn;

    foreach ($_POST as $key => $val) {
        if ($key != 'update' && $key != 'cpassword') {
            $userData[] = "$key = '$val'";
        }
    }
    $sql = "UPDATE $tableName SET " . implode(', ', $userData) . " WHERE user_id = '$userId'";

    $result =  mysqli_query($conn, $sql);
    if ($result) {

        echo "<script>alert('Record Updated successfully');location.href = 'dashboard.php';</script>";
    } else {
        echo mysqli_error($conn);
    }
}

if (isset($_POST['update'])) {
    updateData('user', $row['user_id']);
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regostration Form</title>
    <style>
        label {
            display: inline-block;
            width: 150px;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Registration Form</h1>
    <form action="editProfile.php" method="POST" name="form">

        <div class="userData">
            <div class="userData">
                <label>Prefix</label>
                <?php $prefix = ['Mr', 'Mrs', 'Dr', 'Er'] ?>
                <select name="prefix">

                    <?php foreach ($prefix as $items) : ?>
                        <?php $selectedValue = ($row['prefix'] == $items) ? "selected" : "" ?>
                        <option name="prefix" value="<?php echo $items; ?>" <?php echo $selectedValue ?>>
                            <?php echo $items; ?></option>
                    <?php endforeach; ?>
                </select>
            </div><br>
            <div class="firstName">
                <label>firstName</label>
                <input type="text" name="firstName" value="<?= $row['firstName'] ?>">
            </div><br>
            <div class="lastName">
                <label>lastName</label>
                <input type="text" name="lastName" value="<?= $row['lastName'] ?>">
            </div><br>

            <div class="phoneNumber">
                <label>phone Number</label>
                <input type="tel" name="mobileNumber" maxlength="10" value="<?= $row['mobileNumber'] ?>">
            </div><br>
            <div class="email">
                <label>Email</label>
                <input type="email" name="email" value="<?= $row['email'] ?>">
            </div><br>
            <div class="password">
                <label>Password</label>
                <input type="password" name="password" value="<?= $row['password'] ?>">
            </div><br>
            <div class="cpassword">
                <label>Confirm Password</label>
                <input type="password" name="cpassword">
            </div><br>
            <div class="information">
                <label>information</label>
                <textarea name="information" cols="30" rows="3"><?= $row['information'] ?></textarea>
            </div><br>
            <div class="terms&condition">
                <input type="checkbox" name="terms">
                <span>Herby,I accept Terms & Conditions.</span>
            </div><br>
            <input type="submit" value="update" name="update">

    </form>
</body>

</html>