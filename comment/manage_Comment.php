<?php
class Manage_Comments
{

    public function get_data($sort)
    {
        $database = new Database();
        $stmt = $database->con->prepare("SELECT comments.*, items.Name, users.Username
                                        from comments
                                        INNER JOIN items ON items.ID = comments.Item_ID
                                        INNER JOIN users ON users.user_id = comments.User_ID
                                        ORDER BY c_id $sort
                                        ");

        $stmt->execute();

        $rows =  $stmt->fetchAll();

        return $rows;
    }

    public function table($rows)
    {

        foreach ($rows as $row) {

            echo '<tr>';
            echo '<td>' . $row['Comment'] . '</td>';
            echo '<td>' . $row['Name'] . '</td>';
            echo '<td>' . $row['Username'] . '</td>';
            echo '<td>' . $row['Date'] . '</td>';
            echo '<td>
                            <a href="comments.php?do=Edit&comid=' . $row['Comment_ID'] . '" class="btn btn-success edit-btn"> Edit</a>
                            <a href="comments.php?do=Delete&comid=' . $row['Comment_ID'] . '" class="btn btn-danger confirm delete-btn"> Delete</a>';
            if ($row['Reg_status'] == 0) {
                echo '<a href="comments.php?do=Activate&comid=' . $row['Comment_ID'] . '" class="btn btn-info add-btn"> Activate</a>';
            }
            '</td>';
            echo '</tr>';
        }
    }

    public function select_item($table, $id, $name)
    {
        $database = new Database();
        $stmt2 = $database->con->prepare("SELECT * FROM $table");
        $stmt2->execute();
        $items = $stmt2->fetchAll();

        foreach ($items as $item) {
            echo  "<option value=' " . $item[$id] . "'>" . $item[$name] . "</option>";
        }
    }


    public function errors($comment, $item, $user)
    {

        $formsError = array();
        if (strlen($comment) < 6) {
            $formsError[] = 'Comment Can\'t be Less than Sixs Character';
        }

        if (strlen($comment) > 60) {
            $formsError[] = 'Comment Can\'t be More Than Sixten Character';
        }

        if (empty($comment)) {
            $formsError[] = 'Comment Can\'t be Empty';
        }

        if (empty($item)) {
            $formsError[] = 'Item Can\'t be Empty';
        }

        if (empty($user)) {
            $formsError[] = 'User Can\'t be Empty';
        }

        foreach ($formsError as $error) {
            $massege = '<div class="alert alert-danger">' . $error . '</div>';
            $func = new Func;
            $func->redirectToHome($massege, 3, 'comments.php?do=Add');
        }
    }



    public function add($comment, $item, $user)
    {

        $database = new Database();
        $stmt = $database->con->prepare("INSERT  INTO comments(Comment, Reg_status, Item_ID, User_ID, Date)
                                                    VALUES(:comment, 0, :item, :user, now())");
        $stmt->execute(array(
            'comment' => $comment,
            'item' => $item,
            'user' => $user,
        ));

        $success = "<div class='alert alert-success'>" . $stmt->rowCount() . " Record Inserted</div>";
        $func = new Func;
        $func->redirectToHome($success, 3, 'comments.php?do=Manage');
    }

    public function edit($comid)
    {
        $database = new Database();
        $stmt = $database->con->prepare("SELECT * FROM comments WHERE Comment_ID = ?");
        $stmt->execute(array($comid));
        return $stmt;
    }

    public function select_choosen_table($row, $id, $item_id, $table, $name)
    {
        $database = new Database();
        $stmt2 = $database->con->prepare("SELECT * FROM $table");
        $stmt2->execute();
        $items = $stmt2->fetchAll();

        foreach ($items as $item) {
            echo  "<option value=' " . $item[$id] . "'";
            if ($row[$item_id] == $item[$id]) {
                echo 'selected';
            }
            echo ">" . $item[$name] . "</option>";
        }
    }

    public function update($comment, $item, $user, $id)
    {
        $database = new Database();
        $stmt = $database->con->prepare("UPDATE comments SET Comment = ?, Item_ID = ?, User_ID = ? WHERE Comment_ID = ?");
        $stmt->execute(array($comment, $item, $user, $id));

        $success = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';
        $fun = new Func();
        $fun->redirectToHome($success, 3, 'comments.php?do=Manage');

        return $stmt;
    }

    public function get_Pending_data()
    {
        $database = new Database();
        $stmt = $database->con->prepare("SELECT comments.*, items.Name, users.Username
                                        from comments
                                        INNER JOIN items ON items.ID = comments.Item_ID
                                        INNER JOIN users ON users.user_id = comments.User_ID
                                        ");

        $stmt->execute();

        $rows =  $stmt->fetchAll();

        return $rows;
    }

    public function pending_table($rows)
    {
        foreach ($rows as $row) {
            if ($row['Reg_status'] == 0) {
                echo '<tr>';
                echo '<td>' . $row['Comment'] . '</td>';
                echo '<td>' . $row['Name'] . '</td>';
                echo '<td>' . $row['Username'] . '</td>';
                echo '<td>' . $row['Date'] . '</td>';
                echo '<td>
                            <a href="comments.php?do=Edit&comid=' . $row['Comment_ID'] . '" class="btn btn-success edit-btn"> Edit</a>
                            <a href="comments.php?do=Delete&comid=' . $row['Comment_ID'] . '" class="btn btn-danger confirm delete-btn"> Delete</a>';
                if ($row['Reg_status'] == 0) {
                    echo '<a href="comments.php?do=Activate&comid=' . $row['Comment_ID'] . '" class="btn btn-info add-btn"> Activate</a>';
                }
                '</td>';
                echo '</tr>';
            }
        }
    }
}
