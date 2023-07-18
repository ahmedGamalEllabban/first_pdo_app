<?php
session_start();
include('dbconnection.php');

if (isset($_POST['delete_data_btn'])) {
    $student_id = $_POST['student_id'];

    try {

        $query = "DELETE FROM students WHERE id = :stud_id";
        $statement = $connect->prepare($query);

        $data = [
            ':stud_id' => $student_id
        ];

        $query_executer = $statement->execute($data);

        if ($query_executer) {
            $_SESSION['message'] = 'Deleted Successfully';
            header("Location: index.php");
            exit;
        } else {
            $_SESSION['message'] = 'Failed To Update';
            header("Location: index.php");
            exit;
        }
    } catch (PDOException $o) {
        "Failed to Delete" . $o->getMessage();
    }
}

if (isset($_POST['update_data_btn'])) {
    $student_id = $_POST['student_id'];
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    try {

        $query = "UPDATE students SET fullname=:fullname, email=:email, phone=:phone, course=:course WHERE id=:stud_id LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':fullname' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':course' => $course,
            ':stud_id' => $student_id
        ];

        $query_executer = $statement->execute($data);

        if ($query_executer) {
            $_SESSION['message'] = 'Updated Successfully';
            header("Location: index.php");
            exit;
        } else {
            $_SESSION['message'] = 'Failed To Update';
            header("Location: index.php");
            exit;
        }
    } catch (PDOException $e) {
        "Failed to Update" . $e->getMessage();
    }
}




if (isset($_POST['save_data_btn'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $query = "INSERT INTO `students`(`fullname`, `email`, `phone`, `course`) VALUES (:fullname, :email, :phone, :course)";
    $query_run = $connect->prepare($query);

    $data = [
        ':fullname' => $name,
        ':email' => $email,
        ':phone' => $phone,
        ':course' => $course,
    ];

    $query_executer = $query_run->execute($data);

    if ($query_executer) {
        $_SESSION['message'] = 'Inserted Successfully';
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['message'] = 'Not Inserted';
        header("Location: index.php");
        exit;
    }
}
