<?php
include('admin/connection.php');

$sql = "SELECT * FROM studentdata";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic CRUD</title>
</head>

<body>
    <div>
        <section>
            <h1 class="">
                Php Practice Basic CRUD
            </h1>

            <div>
                <a href="admin/addstudent.php">
                    <button>
                        Add Student
                    </button>
                </a>
            </div>
            <br>
            <div>
                <table border="1">
                    <th>
                        Student Image
                    </th>
                    <th>
                        Student Name
                    </th>
                    <th>
                        Student ID
                    </th>
                    <th>
                        Course
                    </th>
                    <th>
                        Action
                    </th>
                    <tbody>
                        <?php
                        // Loop through the result set and output data into the table
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td> <img src='upload/" . $row["image"] . "' alt='image' style= width:60px;></td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["student_id"] . "</td>";
                            echo "<td>" . $row["course"] . "</td>";
                            echo "<td>
                            <a href='admin/editstudent.php?id=" . $row["id"] . "'>Edit</a>   
                            <a href='admin/deletestudent.php?id=" . $row["id"] . "' style='color:red'>Delete</a>
                            </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>

</html>