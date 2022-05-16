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
    <div class="breadcrumb-item"><a href="index.php">Home</a></div>
    <form method="POST">

        <div>
            <table id="customers">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Description</th>
                        <th>Comments </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once "Post.php";
                    $post = new Post();
                    $post_id = $post->GetPostBYID();
                    if ($row1 = mysqli_fetch_assoc($post_id)) {
                    ?>
                        <tr>
                            <td>
                                <p> <?php echo ($row1["id"]) ?> </p>
                            </td>
                            <td>
                                <p> <?php echo ($row1["description"]) ?> </p>
                            </td>
                            <td>
                            <?php
                        }
                        $comments = $post->GetPostWithComments();
                        while ($row = mysqli_fetch_assoc($comments)) {
                            echo ($row["description"]) . ' , ';
                        }                      ?>
                            </td>
                        </tr>
                </tbody>
            </table>
            <h3>Add Comment</h3>
            <h5><textarea class="form-control" name="description" rows="4" cols="50"> </textarea></h5>
            <div class="submit">
                <input class="btn btn-info" type="submit" name="add" value="ADD">
            </div>
            <?php
            if (isset($_POST["add"])) {
                include_once "../Comments/Comment.php";
                $comment = new Comment();
                $comment->setdesc($_POST['description']);
                $ms = $comment->Add();
                if ($ms == "ok") {
                    echo ("<br/><div class='alert alert-success'>Comment has been created successfully</div>");
                    header('REFRESH:0');
                } else
                    echo ($ms);
            }

            ?>
        </div>

    </form>