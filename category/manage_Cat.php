<?php

class Manage_Cate {

    public function get_data_cat($sorts) {

        $database = new Database();

        $stmt = $database->con->prepare("SELECT * FROM categories WHERE parent = 0 ORDER BY Ordering $sorts");

        $stmt->execute();

        $rows = $stmt->fetchAll();
        
        return $rows;
    }

    public function tables($rows) {

        foreach($rows as $row) {

            echo '<tr>';
            echo "<td class='img'><img src='layout/images/" . $row['image'] . "'/></td>";
            echo '<td>' . $row['Name'] . '</td>';
            echo '<td>' . $row['Description'] . '</td>';
            echo '<td>' . $row['Date'] . '</td>';
            echo '<td> 
                                <a href="categories.php?do=Edit&cateid=' . $row['ID'] . '" class="btn btn-success edit-btn"> Edit</a>
                                <a href="categories.php?do=Delete&cateid=' . $row['ID'] . '" class="btn btn-danger confirm delete-btn"> Delete</a>';
            if ($row['Reg_status'] == 0) {
                echo '<a href="categories.php?do=Activate&cateid=' . $row['ID'] . '" class="btn btn-info add-btn"> Activate</a>';
            }
            '</td>';
            echo '</tr>';
        }
    }

    public function errors($name, $imageName, $imageExtension, $imageAllowedExtension, $imageSize) {

        $formsError = array();
        if (strlen($name) < 6) {
            $formsError[] = 'Category Can\'t be Less than Six Character';
        }

        if (strlen($name) > 25) {
            $formsError[] = 'Category Can\'t be More Than Twienty Five Character';
        }

        if (!empty($imageName) && !in_array($imageExtension, $imageAllowedExtension)) {
            $formsError[] = 'This Extension Not Allow';
        }

        if (empty($imageName)) {
            $formsError[] = 'Image is Required';
        }

        if ($imageSize > 4194304) {
            $formsError[] = 'Image Can\'t Be Larger Than 4MP';
        }

        foreach ($formsError as $error) {
            $massege = '<div class="alert alert-danger">' . $error . '</div>';
            $func = new Func;
            $func->redirectToHome($massege, 3, 'category.php');
        }
    }

    

    public function add($Name, $desc, $image)
    {

        $database = new Database();
        $stmt = $database->con->prepare("INSERT  INTO categories(Name, Description, Reg_status, Date, image)
                                                    VALUES(:name, :desc, 0, now(), :image)");
        $stmt->execute(array(
            'name' => $Name,
            'desc' => $desc,
            'image' => $image,
        ));

        $success = "<div class='alert alert-success'>" . $stmt->rowCount() . " Record Inserted</div>";
        $func = new Func;
        $func->redirectToHome($success, 3, 'categories.php?do=Manage');
    }

    public function edit($comid)
    {
        $database = new Database();
        $stmt = $database->con->prepare("SELECT * FROM categories WHERE ID = ?");
        $stmt->execute(array($comid));
        return $stmt;
    }

    public function update($name, $desc, $image, $id)
    {
        $database = new Database();
        $stmt = $database->con->prepare("UPDATE categories SET Name = ?, Description= ?, image= ? WHERE ID = ?");
        $stmt->execute(array($name, $desc, $image,  $id));

        $success = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';
        $fun = new Func();
        $fun->redirectToHome($success, 3, 'categories.php?do=Manage');

        return $stmt;
    }

    public function pending_table($rows)
    {

        foreach ($rows as $row) {
            if ($row['Reg_status'] == 0) {
                echo '<tr>';
                echo "<td class='img'><img src='layout/images/" . $row['image'] . "'/></td>";
                echo '<td>' . $row['Name'] . '</td>';
                echo '<td>' . $row['Description'] . '</td>';
                echo '<td>' . $row['Date'] . '</td>';
                echo '<td> 
                                <a href="categories.php?do=Edit&cateid=' . $row['ID'] . '" class="btn btn-success edit-btn"> Edit</a>
                                <a href="categories.php?do=Delete&cateid=' . $row['ID'] . '" class="btn btn-danger confirm delete-btn"> Delete</a>';
                if ($row['Reg_status'] == 0) {
                    echo '<a href="categories.php?do=Activate&cateid=' . $row['ID'] . '" class="btn btn-info add-btn"> Activate</a>';
                }
                '</td>';
                echo '</tr>';
            }
        }
    }
}

?>