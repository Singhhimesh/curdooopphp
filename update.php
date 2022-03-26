<?php
include 'connection.php';

$obj = new Database();

$user_data = $obj->show_update('users','id = '.$_GET['id']);
if (isset($_GET['id']) && isset($_POST['submit'])) {
    $obj->update('users', ['name' => $_POST['name'], 'phone' => $_POST['phone'], 'email' => $_POST['email']], 'id = '.$_GET['id']);
}

?>








<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>CRUD using Oop in php</title>
</head>

<body>

    <div class="container">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" value="<?php echo $user_data['name'];?>" class="form-control" id="name" name="name" aria-describedby="name">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone address</label>
                <input type="number" value="<?php echo $user_data['phone'];?>" class="form-control" name="phone" id="phone" aria-describedby="phone">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" value="<?php echo $user_data['email'];?>" name="email" aria-describedby="email">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>