<!DOCTYPE html>
<html lang="en">

<body>
    <div class="breadcrumb-item"><a href="index.php">Home</a></div>
    <center>
        <form method="POST">
            <table class="table table-border table-striped" style="margin:25px;width:75%">

                <h1 class="username">Add New Post </h1>
                <div>
                    <tr>
                        <td>
                            <h3>Description</h3>
                        </td>
                        <td>
                            <h5><textarea class="form-control" name="description" rows="4" cols="50"> </textarea></h5>

                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <td>
                            <div class="submit">
                                <input style="padding:5px;width:350px ;height:40px" class="btn btn-info" type="submit" name="add" value="ADD">
                            </div>
                        </td>
                    </tr>
                </div>
                <?php
                if (isset($_POST["add"])) {
                    include_once "Post.php";
                    $post = new Post();
                    $post->setdesc($_POST['description']);
                    $ms = $post->Add();
                    if ($ms == "ok") {
                        echo ("<br/><div class='alert alert-success'>Post has been created successfully</div>");
                        // header('REFRESH:0');
                    } else
                        echo ($ms);
                    
                        header("Location: create.php");

                }
                ?>
            </table>
        </form>
    </center>
</body>

</html>