<?php include "stuff/header.php"; ?>

<body>

    <?php include "stuff/nav-bar.php"; ?>
    
    <form>
        <input type="text" class="todo-input">
        <button class="todo-button create" type="submit">
            <i class="fas fa-plus-circle fa-lg"></i>
        </button>
        <div class="select">
            <select name="todos" class="filter-todo">
                <option value="all">All</option>
                <option value="completed">Completed</option>
                <option value="incomplete">Incomplete</option>
            </select>
        </div>
    </form>

    <div class="todo-container">
        <ul class="todo-list"></ul>
    </div>

    <?php include "stuff/footer.php" ?>

</body>
</html>
