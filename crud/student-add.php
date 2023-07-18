<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert Data With PHP Using PDO</title>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-8 mt-4">
        <div class="card">
          <div class="card-header">
            <h3>Insert Data With PHP Using PDO
              <a href="index.php" class="btn btn-danger float-end">Back</a>
            </h3>
          </div>
          <div class="card-body">
            <form action="process.php" method="POST">
              <div class="mb-3">
                <label>Full Name</label>
                <input type="text" name="fullname" class="form-control">
              </div>
              <div class="mb-3">
                <label>E-mail</label>
                <input type="email" name="email" class="form-control">
              </div>
              <div class="mb-3">
                <label>Phone Number</label>
                <input type="text" name="phone" class="form-control">
              </div>
              <div class="mb-3">
                <label>Course Name</label>
                <input type="text" name="course" class="form-control">
              </div>
              <div class="mb-3">
                <button type="submit" name="save_data_btn" class="btn btn-primary">Save Data</button>
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