<?php include('dbconnection.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit & Update Data With PHP Using PDO</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit & Update Data With PHP Using PDO
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $std_id = $_GET['id'];
                            $query = "SELECT * FROM students WHERE id=:stud_id";
                            $statement = $connect->prepare($query);
                            $data = [':stud_id' => $std_id];
                            $statement->execute($data);
                            $result = $statement->fetch();
                        }
                        ?>
                        <form action="process.php" method="POST">
                            <input type="hidden" name="student_id" value="<?= $result['id'] ?>">
                            <div class="mb-3">
                                <label>Edit Name</label>
                                <input type="text" name="fullname" value="<?php $result['fullname'] ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Edit E-mail</label>
                                <input type="email" name="email" value="<?php $result['email'] ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Edit Phone Number</label>
                                <input type="text" name="phone" value="<?php $result['phone'] ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Edit Course Name</label>
                                <input type="text" name="course" value="<?php $result['course'] ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_data_btn" class="btn btn-primary">Update Data</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>