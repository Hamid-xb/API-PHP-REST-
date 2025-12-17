<?php 

require ('layout.php');
require ('includes/config.php');
require ('nav_bar.php');

if(isset($_SESSION['name'])) {
    // do logged in stuff
}
else 
// Redirect if not logged in
header("Location: registering/login.php");

    if(!isset($_SESSION['name'])) {
        header("Location: registering/login.php");
            }else{
                if(isset($_POST['submit'])){
                    $user_id        = $_GET['id'];
                    $task           = $_POST['task'];
                    $description    = $_POST['description'];
                    $date           = $_POST['date'];
                    $from           = $_POST['from'];
                    $to             = $_POST['to'];
            
                    $insert = $conn->prepare("INSERT INTO todos (user_id, task, description, date, `from`, `to`)
                    VALUES (:user_id, :task, :description, :date,:from, :to)");
            
                    $insert->execute([
                        ":user_id"=> $user_id,
                        ":task" => $task,
                        ":description" => $description,
                        ":date" => $date,
                        ":from" => $from,
                        ":to" => $to,
                    ]);
            
                    header("location: index.php?id=$user_id");
            
                } 
            }

?>

<dev class="p-5 d-flex justify-content-center">
    <form action="" method="POST">
        <label for="task">Task:</label><br>
        <input type="text" id="task" name="task" style="width: 400px;" required><br>
        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description" style="width: 400px;"><br><br>
        <label for="date">Date</label>
        <input type="date" id="date" name="date" required>
        <label for="from">From</label>
        <input type="time" id="from" name="from" min="00:00" max="23:99" required />
        <label for="to" style="padding-left:30px;">To</label>
        <input type="time" id="to" name="to" min="00:00" max="23:99" required /><br><br>
        <input type="submit" name="submit" value="Submit">
    </form> 
</dev>