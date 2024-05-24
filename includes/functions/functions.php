<?php
class func
{

    public function getAllFrom($field, $table, $where, $and = NULL, $orderfield = "items", $ordering = "DESC") {

		global $con;

		$getAll = $con->prepare("SELECT $field FROM $table $where $and ORDER BY $orderfield $ordering");

		$getAll->execute();

		$all = $getAll->fetchAll();

		return $all;

	}

    
    public function gettitle()
    {

        global $pageTitle;

        if (isset($pageTitle)) {

            echo $pageTitle;
        } else {

            echo 'defult';
        }
    }

    // **************************************************************************

    public function redirectToHome($errorMsg, $seconds, $url)
    {

        echo $errorMsg;
        echo "<div class='alert alert-info'>You Will Be Redirected To Home Page After $seconds Seconds.</div>";

        header("refresh:$seconds;url=$url");

        exit();
    }

    // **************************************************************************

    public function checkItem($select, $from, $value)
    {


        $database = new Database();
        $statment = $database->con->prepare("SELECT $select FROM $from WHERE $select = ?");

        $statment->execute(array($value));

        $count = $statment->rowCount();

        return $count;
    }

    public function checkstoreitem($select1, $select2, $from, $value1, $value2)
    {
        $database = new Database();
        $statment = $database->con->prepare("SELECT $select1, $select2 FROM $from WHERE $select1 = ? AND $select2 = ? ");

        $statment->execute(array($value1, $value2));

        $count = $statment->rowCount();

        return $count;
    }

    // ***************************************************************************

    public function countitems($item, $table)
    {

        $database = new Database();

        $stmt2 = $database->con->prepare("SELECT COUNT($item) FROM $table ");

        $stmt2->execute();

        return $stmt2->fetchColumn();
    }

    // ***************************************************************************

    public function getlatest($select, $table, $order, $limit = 5)
    {

        $database = new Database();
        $getStmt = $database->con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");

        $getStmt->execute();

        $row = $getStmt->fetchAll();

        return $row;
    }

    public function login($userName, $hashedPass)
    {
        $database = new Database();
        $stmt = $database->con->prepare("SELECT UserID, Username, `Password` 
                        FROM   users 
                        WHERE  Username   = ? 
                        AND    `Password` = ?
                        LIMIT  1
                        ");
        $stmt->execute(array($userName, $hashedPass));
        return $stmt;
    }
}
