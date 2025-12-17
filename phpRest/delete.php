<?php require "layout.php";?>
<?php require "includes/config.php";?>

<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $user_id = $_SESSION['user_id'];
        $select = $conn->query("SELECT * FROM todos WHERE id = '$id'");
        $select->execute();

        $todo = $select->fetch(PDO::FETCH_OBJ);

        if($todo->user_id !== $_SESSION['user_id']){
            header("Location: index.php?id=$user_id");
        }else{


            $delete = $conn->query("DELETE FROM todos WHERE id = '$id'"); 
            $delete->execute();
            
            header("Location: index.php?id=$user_id");
        }
    }

?>