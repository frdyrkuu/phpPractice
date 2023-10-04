<?php

include('connection.php');

if (isset($_FILES['image']) && isset($_POST['studentID'])) {
    $studentName = $_POST['studentname'];
    $studentID = $_POST['studentID'];
    $studentCourse = $_POST['studentcourse'];

    $filename = $_FILES['image']['name'];
    $path = $_FILES['image']['tmp_name'];

    $newImageName = uniqid("IMG-", true) . '.' . $filename;
    $new_path = "upload/" . $newImageName;
    move_uploaded_file($path, "../" . $new_path);

    $sql = "INSERT INTO `studentdata`(`name`, `student_id`, `course`, `image`) VALUES ('$studentName','$studentID','$studentCourse', '$newImageName')";
    mysqli_query($conn, $sql);

    $response = ['status' => 'success', 'message' => 'Record updated sucessfully'];
    json_encode($response);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic CRUD | Add Student</title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
    <nav>
        <a href="/index.php">Home</a>
        <div>
            <ul>
                <a href="">Contact</a>
            </ul>

            <ul>
                <a href="">About</a>
            </ul>
        </div>
    </nav>

    <div>
        <section>
            <div>
                <h1>
                    Student Application Form
                </h1>
                <form action="" method="POST" id="form">
                    <div>
                        <label for="fullname">Full Name</label>
                        <input type="text" id="fullname" name="studentname" placeholder="Juan Dela Cruz" required>

                        <label for="image">Insert Image</label>
                        <input type="file" id="image" name="image" enctype="multipart/form-data">
                        <br>
                        <div>
                            <label for="studentid">Student ID</label>
                            <input type="text" id="studentid" name="studentID" placeholder="2023-00000" required>
                        </div>
                        <br>
                        <div>
                            <label for="course">Course</label>
                            <select name="studentcourse" id="course" required>
                                <option value="" selected disabled>Select your Course</option>
                                <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                                <option value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering</option>
                                <option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering</option>
                                <option value="Bachelor of Science in Electrical Engineering">Bachelor of Science in Electrical Engineering</option>
                                <option value="Bachelor of Science in Mechanical Engineering">Bachelor of Science in Mechanical Engineering</option>
                                <option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
                            </select>
                        </div>
                        <br>
                        <div>
                            <input type="submit" name="submit" id="submit" value="Submit"></input>
                        </div>
                </form>
            </div>
        </section>
    </div>

    <script src="addstudent_query.js"></script>
</body>

</html>