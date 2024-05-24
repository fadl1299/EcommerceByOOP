<?php
class Manage_Users
{

    public function sort()
    {
        $sort = 'ASC';
        $sort_Array = array('ASC', 'DESC');

        if (isset($_GET['sort']) && in_array($_GET['sort'], $sort_Array)) {

            $sort = $_GET['sort'];
        }
        return $sort;
    }

    public function get_data($select, $table, $where, $order, $sort)
    {
        $database = new Database();
        $stmt = $database->con->prepare("SELECT $select FROM $table WHERE $where ORDER BY $order $sort");

        $stmt->execute();

        $rows =  $stmt->fetchAll();

        return $rows;
    }

    public function table($rows)
    {

        foreach ($rows as $row) {

            echo '<tr>';
            echo "<td class='img'><img src='layout/images/" . $row['image'] . "'/></td>";
            echo '<td>' . $row['Username'] . '</td>';
            echo '<td>' . $row['Email'] . '</td>';
            echo '<td>' . $row['Full_name'] . '</td>';
            echo '<td>' . $row['Date'] . '</td>';
            echo '<td> 
                                <a href="users.php?do=Edit&userid=' . $row['user_id'] . '" class="btn btn-success edit-btn"> Edit</a>
                                <a href="users.php?do=Delete&userid=' . $row['user_id'] . '" class="btn btn-danger confirm delete-btn"> Delete</a>';
            if ($row['Reg_status'] == 0) {
                echo '<a href="users.php?do=Activate&userid=' . $row['user_id'] . '" class="btn btn-info ml-1"> Activate</a>';
            }
            '</td>';
            echo '</tr>';
        }
    }

    public function errors($userName, $hrf, $imageExtension, $imageAllowedExtension, $imageName, $imageSize)
    {

        $formsError = array();

        if (strlen($userName) < 4) {
            $formsError[] = 'Username Can\'t be Less than 4 Character';
        }

        if (strlen($userName) > 20) {
            $formsError[] = 'Username Can\'t be More Than 20 Character';
        }

        if (!empty($imageName) && !in_array($imageExtension, $imageAllowedExtension)) {
            $formsError[] = 'This Extension Not Allowed';
        }

        // if (empty($imageName)) {
        //     $formsError[] = 'Image is Required';
        // }

        if ($imageSize > 4194304) {
            $formsError[] = 'Image Can\'t Be Larger Than 4MP';
        }

        foreach ($formsError as $error) {
            $massege = '<div class="alert alert-danger">' . $error . '</div>';
            $func = new Func;
            $func->redirectToHome($massege, 3, "$hrf.php");
        }
    }

    public function add($userName, $job, $email, $name, $hashPass, $image)
    {

        $database = new Database();
        $stmt = $database->con->prepare("INSERT INTO users(Username, Password, Email, Full_name, job, Reg_status, Date, image)
                                                    VALUES(:name, :pass, :email, :full, :job, 0, now(), :image)");
        $stmt->execute(array(
            'name'  => $userName,
            'pass'  => $hashPass,
            'email' => $email,
            'full'  => $name,
            'job'   => $job,
            'image' =>  $image
        ));

        $success = "<div class='alert alert-success'>" . $stmt->rowCount() . " Record Inserted</div>";
        $func = new Func;
        $func->redirectToHome($success, 3, 'users.php?do=Manage');
    }

    public function edit($userid)
    {
        $database = new Database();
        $stmt = $database->con->prepare("SELECT * FROM users WHERE user_id = ? LIMIT 1");
        $stmt->execute(array($userid));
        return $stmt;
    }

    public function check_user_exist($table, $username, $id, $p_username, $P_id)
    {
        $database = new Database();
        $stmt2 = $database->con->prepare("SELECT * FROM $table WHERE $username = ? AND  $id != ?");

        $stmt2->execute(array($p_username, $P_id));

        $count =  $stmt2->rowCount();

        return $count;
    }

    public function update($image, $user, $email, $name, $pass, $job, $id, $href)
    {
        $database = new Database();
        $stmt = $database->con->prepare("UPDATE 
                                            users 
                                        SET 
                                            image = ?, 
                                            Username = ?, 
                                            Email = ?,
                                            Full_name = ?,
                                            Password = ?,
                                            job = ? 
                                        WHERE 
                                            user_id = ?");
        $stmt->execute(array($image, $user, $email, $name, $pass, $job, $id));

        $success = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';
        $fun = new Func();
        $fun->redirectToHome($success, 3, "$href.php");

        return $stmt;
    }

    public function delete($userid, $table, $id, $id_bind)
    {
        $database = new Database();
        $stmt = $database->con->prepare("DELETE FROM $table WHERE $id = $id_bind");
        $stmt->bindParam($id_bind,  $userid);
        $stmt->execute();
        $massege = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Deleted</div>';
        $fun = new Func();
        $fun->redirectToHome($massege, 3, "$table.php?do=Manage");
        return $stmt;
    }

    public function activate($userid, $table, $select, $id)
    {
        $database = new Database();
        $stmt = $database->con->prepare("UPDATE $table SET $select = 1 WHERE $id = ?");
        $stmt->execute(array($userid));
        $success = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Activated</div>';
        $fun = new Func();
        $fun->redirectToHome($success, 3, "$table.php?do=Manage");
        return $stmt;
    }

    public function pending_users($table, $select, $id, $Reg)
    {
        $database = new Database();
        $stmt2 = $database->con->prepare("SELECT $select FROM $table WHERE $id AND $Reg");

        $stmt2->execute();

        return $stmt2;
    }

    public function pending($table, $select, $id)
    {
        $database = new Database();
        $stmt2 = $database->con->prepare("SELECT $select FROM $table WHERE $id");

        $stmt2->execute();

        return $stmt2;
    }

    public function pending_table($rows)
    {

        foreach ($rows as $row) {
            if ($row['Reg_status'] == 0) {
                echo '<tr>';
                echo "<td class='img'><img src='layout/images/" . $row['image'] . "'/></td>";
                echo '<td>' . $row['Username'] . '</td>';
                echo '<td>' . $row['Email'] . '</td>';
                echo '<td>' . $row['Full_name'] . '</td>';
                echo '<td>' . $row['Date'] . '</td>';
                echo '<td> 
                                <a href="users.php?do=Edit&userid=' . $row['user_id'] . '" class="btn btn-success edit-btn"> Edit</a>
                                <a href="users.php?do=Delete&userid=' . $row['user_id'] . '" class="btn btn-danger confirm delete-btn"> Delete</a>';
                if ($row['Reg_status'] == 0) {
                    echo '<a href="users.php?do=Activate&userid=' . $row['user_id'] . '" class="btn btn-info ml-1"> Activate</a>';
                }
                '</td>';
                echo '</tr>';
            }
        }
    }
}
