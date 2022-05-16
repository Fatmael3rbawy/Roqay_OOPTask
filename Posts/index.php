<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <h1>All Posts</h1>
    <form method="POST">
        <center>
            <button name="add" class='alert alert-success' style="width:30% ;margin-top :10px"> Add New Post</button>
        </center>
        <?php
        if (isset($_POST["add"])) {
            echo ("<script> window.open('create.php', '_self')</script>");
        }
        ?>
        <br> <br>
        <div>
            <table id="customers">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once "Post.php";
                    $post = new Post();
                    $posts = $post->GetAll();
                    while ($row1 = mysqli_fetch_assoc($posts)) {
                    ?>

                        <tr>
                            <td>
                                <p> <?php echo ($row1["id"]) ?> </p>
                            </td>
                            <td>
                                <p> <?php echo ($row1["description"]) ?> </p>
                            </td>
                            <td>
                              <a href="show.php?id=<?php echo ($row1["id"]) ?>"  <button class='alert alert-warning' name="show"> Show </button>
                            </td>
                            
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>
        </div>

    </form>