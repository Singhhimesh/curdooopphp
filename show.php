<?php
include 'connection.php';

$obj = new Database();

$data = $obj->select('users');
if(isset($_POST['id'])){
    if($obj->delete('users',$_POST['id'])){
        header('Location: '.$_SERVER['REQUEST_URI']);
    }else{
        echo "Record has not been delete";
    }
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
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $value) {
                ?>
                    <tr>
                        <td><?= $value['name'] ?></td>
                        <td><?= $value['phone'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td>
                            <a href="update.php?id=<?=$value['id'];?>" class="btn btn-info">Edit</a>
                            <form action="" class="my-2" method="post">
                                <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                <button type="submit" onclick="return confirm('Are you sure want to delete')" name="submit" class="btn btn-primary">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>