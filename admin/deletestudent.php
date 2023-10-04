<?php
include('connection.php');


function getID($input)
{
    global $conn;
    return $conn->real_escape_string($input);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = getID($_POST['id']);
    $delete_sql = "DELETE FROM `studentdata` WHERE id = $id";
    $conn->query($delete_sql);

    header("Location: /index.php");
    exit();
}

if (isset($_GET['id'])) {
    $edit_id = getID($_GET['id']);
    $edit_sql = "SELECT * FROM studentdata WHERE id = $edit_id";
    $result = $conn->query($edit_sql);
    $row = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <section>
            <div>
                <h2>Deletion Form</h2>
                <form action="" method="post">
                    <input type="text" name="id" value="<?php echo $row['id']; ?>" hidden readonly>
                    <div>
                        <label for="newName">New Name:</label>
                        <input type="text" name="newName" value="<?php echo $row['name']; ?>" readonly>
                    </div>
                    <br>
                    <div>
                        <label for="newID">New Student ID:</label>
                        <input type="text" name="newID" value="<?php echo $row['student_id']; ?>" readonly>
                    </div>
                    <br>
                    <div>

                        <label for="newCourse">New Student ID:</label>
                        <select name="newCourse" id="">
                            <option value="<?php echo $row['course']; ?>" selected><?php echo $row['course']; ?></option>
                        </select>
                    </div>
                    <br>
                    <input type="submit" value="Delete" style="background-color: red; color: white">
                    <a href="/index.php"><button>Cancel</button></a>
                </form>
            </div>
        </section>
    </div>
</body>

</html>