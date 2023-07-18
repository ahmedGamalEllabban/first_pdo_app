<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('dbconnection.php');
?>

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD System</title>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-4">

        <?php if (isset($_SESSION['message'])) : ?>
          <h5 class="alert alert-success"><?php echo $_SESSION['message']; ?></h5>
        <?php
          unset($_SESSION['message']);
          header("Refresh:3; url=index.php");
        endif ?>
        <div class="card">


          <div class="card-header">

            <h3>PHP PDO CRUD
              <a href="student-add.php" class="btn btn-primary float-end">Add Student</a>
            </h3>

          </div>

          <div class="card-body">
            <table class="table table-bordered table-striped">

              <thead>
                <tr>
                  <td>ID</td>
                  <td>Name</td>
                  <td>Email</td>
                  <td>Phone</td>
                  <td>Course</td>
                  <td>Edit</td>
                  <td>Delete</td>
                </tr>
              </thead>

              <tbody>
                <?php
                $query = "SELECT * FROM students ";
                $statement = $connect->prepare($query);
                $statement->execute();

                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                if ($result) {
                  foreach ($result as $row) {
                ?>
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['fullname']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['phone']; ?></td>
                      <td><?php echo $row['course']; ?></td>
                      <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                      </td>
                      <td>
                        <form action="process.php" method="POST">
                          <input type="hidden" name="student_id" value="<?= $row['id'] ?>">
                          <button name="delete_data_btn" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                  <?php
                  }
                } else {
                  ?>
                  <tr>
                    <td colspan="5">No Records Found</td>
                  </tr>
                <?php } ?>
              </tbody>

            </table>
          </div>

        </div>


      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>