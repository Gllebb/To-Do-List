<?php include "stuff/header.php"; ?>

<body>

    <?php include "stuff/nav-bar.php"; ?>

    <?php
        session_start();
        $userId = $_SESSION["user"];
        require_once "database.php";

        if (isset($_POST['submit-todo'])) {
            $todo = $_POST['to-do'];
            
            $sql = "INSERT INTO todo_lists (user_id, todo) VALUES ('$userId', '$todo')";
            
            if (mysqli_query($conn, $sql)) {
                header("Location: listPage.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    ?>

    <form action="listPage.php" method="post">
        <div>
            <input type="text" name="to-do" placeholder="Enter a To-Do:" class="todo-input">
        </div>
        <div>
            <input type="submit" value="Submit!" name="submit-todo" class="btn btn-primary">
        </div>
    </form>

    <div class="todo-container">
        <ul class="todo-list">
            <?php
                $sql = "SELECT * FROM todo_lists WHERE user_id = '$userId'";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    $todo = $row['todo'];
                    ?>
                    <li class="todo">
                        <div class="text"> <?php echo $todo; ?> </div>
                        <div class="buttons">
                            <form action="deleteToDo.php" method="post" class="delete-todo-form">
                                <input type="hidden" name="todoId" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="complete-btn buttons"><i class="fa-solid fa-check"></i></button>
                            </form>
                        </div>
                    </li>

                    <?php
                }
            ?>
        </ul>
    </div>

    <?php include "stuff/footer.php" ?>

</body>
</html>
