<?php
include('connection.php');


function getID($input)
{
    global $conn;
    return $conn->real_escape_string($input);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = getID($_POST['id']);
    $newName = $_POST['newName'];
    $newID = $_POST['newID'];
    $newCourse = $_POST['newCourse'];

    $update_sql = "UPDATE `studentdata` SET `name`='$newName',`student_id`='$newID',`course`='$newCourse' WHERE id = $id";
    $conn->query($update_sql);

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
    <title>Basic CRUD | Edit Student</title>
</head>

<body>
    <div>
        <section>
            <h2>Edit Form</h2>
            <div>
                <form action="" method="post">
                    <input type="text" name="id" value="<?php echo $row['id']; ?>" hidden>
                    <div>
                        <label for="newName">New Name:</label>
                        <input type="text" name="newName" value="<?php echo $row['name']; ?>">
                    </div>
                    <br>
                    <div>
                        <label for="newID">New Student ID:</label>
                        <input type="text" name="newID" value="<?php echo $row['student_id']; ?>">
                    </div>
                    <br>
                    <div>

                        <label for="newCourse">New Student ID:</label>
                        <select name="newCourse" id="">
                            <option value="<?php echo $row['course']; ?>" selected><?php echo $row['course']; ?></option>
                            <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                            <option value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering</option>
                            <option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering</option>
                            <option value="Bachelor of Science in Electrical Engineering">Bachelor of Science in Electrical Engineering</option>
                            <option value="Bachelor of Science in Mechanical Engineering">Bachelor of Science in Mechanical Engineering</option>
                            <option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
                        </select>
                    </div>
                    <br>
                    <input type="submit" value="Save">

                    <a href="/index.php"><button>Home</button></a>
                </form>
            </div>
        </section>
    </div>
</body>

</html>