<?php
class Manage_Items
{

    public function get_data($sort)
    {
        $database = new Database();
        $stmt = $database->con->prepare("SELECT items.*, categories.Name AS Cate_Name , users.Username FROM items
                                        INNER JOIN categories ON categories.ID = items.Cat_ID
                                        INNER JOIN users ON users.user_id = items.User_ID 
                                        ORDER BY ID $sort
                                        ");
        $stmt->execute();

        $rows =  $stmt->fetchAll();

        return $rows;
    }

    public function table($rows)
    {

        foreach ($rows as $row) {

            echo '<tr>';
            echo "<td class='img'><img src='layout/images/" . $row['Image'] . "'/></td>";
            echo '<td>' . $row['Name'] . '</td>';
            echo '<td>' . $row['Price'] . '</td>';
            echo '<td>' . $row['Username'] . '</td>';
            echo '<td>' . $row['Cate_Name'] . '</td>';
            echo '<td>' . $row['Date'] . '</td>';
            echo '<td> 
                                <a href="items.php?do=Edit&itemid=' . $row['ID'] . '" class="btn btn-success edit-btn"> Edit</a>
                                <a href="items.php?do=Delete&itemid=' . $row['ID'] . '" class="btn btn-danger confirm delete-btn"> Delete</a>';
            if ($row['Reg_status'] == 0) {
                echo '<a href="items.php?do=Activate&itemid=' . $row['ID'] . '" class="btn btn-info m-1"> Activate</a>';
            } else {
                echo '<a href="store_items.php?do=Buy&itemid=' . $row['ID'] . '" class="btn btn-warning m-1 px-3"> Buy</a>';
            }
            '</td>';
            echo '</tr>';
        }
    }


    public function errors($Name, $imageExtension, $imageAllowedExtension, $imageSize)
    {

        $formsError = array();
        if (strlen($Name) < 6) {
            $formsError[] = 'Name Can\'t be Less than Sixs Character';
        }

        if (strlen($Name) > 25) {
            $formsError[] = 'Name Can\'t be More Than Tewinthy_Five Character';
        }

        if (!empty($imageName) && !in_array($imageExtension, $imageAllowedExtension)) {
            $formsError[] = 'This Extension Not Allowed';
        }

        if ($imageSize > 584586666) {
            $formsError[] = 'Image Can\'t Be Larger Than 4MP';
        }
        foreach ($formsError as $error) {
            $massege = '<div class="alert alert-danger">' . $error . '</div>';
            $func = new Func;
            $func->redirectToHome($massege, 3, 'items.php');
        }
    }



    public function add($Name, $price, $desc, $status, $country, $user, $cate, $image)
    {

        $database = new Database();
        $stmt = $database->con->prepare("INSERT  INTO items(Name, Price, Description, Status, Country, User_ID, Cat_ID, Reg_status, Date, Image)
                                                    VALUES(:name, :price, :desc, :status, :country, :user, :cate, 0, now(), :image)");
        $stmt->execute(array(
            'name' => $Name,
            'price' => $price,
            'desc' => $desc,
            'status' => $status,
            'country' => $country,
            'user' => $user,
            'cate' => $cate,
            'image' => $image,
        ));

        $success = "<div class='alert alert-success'>" . $stmt->rowCount() . " Record Inserted</div>";
        $func = new Func;
        $func->redirectToHome($success, 3, 'items.php?do=Manage');
    }

    public function edit($comid)
    {
        $database = new Database();
        $stmt = $database->con->prepare("SELECT * FROM items WHERE Cat_ID = ?");
        $stmt->execute(array($comid));
        return $stmt;
    }

    public function option($row)
    { ?>
        <option value="0"> </option>
        <option value="New" <?php if ($row['Status'] == 'New') {
                                echo 'selected';
                            } ?>>New</option>
        <option value="Like New" <?php if ($row['Status'] == 'Like New') {
                                        echo 'selected';
                                    } ?>>Like New</option>
        <option value="Used" <?php if ($row['Status'] == 'Used') {
                                    echo 'selected';
                                } ?>>Used</option>
        <option value="Old" data-preventclose="true" <?php if ($row['Status'] == 'Old') {
                                                            echo 'selected';
                                                        } ?>>Old</option>
<?php
    }

    public function update($Name, $price, $desc, $status, $country, $user, $cate, $image, $id)
    {
        $database = new Database();
        $stmt = $database->con->prepare("UPDATE items SET Name = ?, Price = ?, Description = ?, Status = ?, Country = ?, User_ID = ?, Cat_ID = ?, Image = ? WHERE ID = ?");
        $stmt->execute(array($Name, $price, $desc, $status, $country, $user, $cate, $image, $id));

        $success = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';
        $fun = new Func();
        $fun->redirectToHome($success, 3, 'items.php?do=Manage');

        return $stmt;
    }

    public function pending()
    {
        $database = new Database();
        $stmt = $database->con->prepare("SELECT items.*, categories.Name AS Cate_Name , users.Username FROM items
                                INNER JOIN categories ON categories.ID = items.Cat_ID
                                INNER JOIN users ON users.user_id = items.User_ID");
        $stmt->execute();

        return $stmt;
    }

    public function pending_table($rows)
    {

        foreach ($rows as $row) {
            if ($row['Reg_status'] == 0) {
                echo '<tr>';
                echo "<td class='img'><img src='layout/images/" . $row['Image'] . "'/></td>";
                echo '<td>' . $row['Name'] . '</td>';
                echo '<td>' . $row['Price'] . '</td>';
                echo '<td>' . $row['Username'] . '</td>';
                echo '<td>' . $row['Cate_Name'] . '</td>';
                echo '<td>' . $row['Date'] . '</td>';
                echo '<td> 
                                <a href="items.php?do=Edit&itemid=' . $row['ID'] . '" class="btn btn-success edit-btn"> Edit</a>
                                <a href="items.php?do=Delete&itemid=' . $row['ID'] . '" class="btn btn-danger confirm delete-btn"> Delete</a>';
                if ($row['Reg_status'] == 0) {
                    echo '<a href="items.php?do=Activate&itemid=' . $row['ID'] . '" class="btn btn-info m-1"> Activate</a>';
                }
                '</td>';
                echo '</tr>';
            }
        }
    }
}
