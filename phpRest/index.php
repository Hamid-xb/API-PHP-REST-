<?php require('layout.php'); ?>
<?php require('nav_bar.php'); ?>
<?php require('includes/config.php');
if(isset($_SESSION['name'])) {
    // do logged in stuff
}
else 
// Redirect if not logged in
header("Location: registering/login.php");


$id = $_GET['id'];
if(isset($id)) {
        $tasks = $conn->query("SELECT * FROM todos WHERE user_id='".$id."'");
 
        $tasks->execute();
        $allTasks = $tasks->fetchall(PDO::FETCH_OBJ);
    }
?>

<br><br>

<div class="container">

    <h1 class="d-flex justify-content-center">Todo list</h1>

    <br><br><br>
    
    
        <button class=" bg-primary text-white rounded p-2">
            <a class="d-flex justify-content-center text-white" href="todoform.php?id=<?php echo $_SESSION['user_id']?>">Make a Todo</a>
        </button>
    
    
    <br><br>
    <?php foreach ($allTasks as $task) :?>
        <div class="todo-list" style="padding-bottom: 10px;">
            <div class="card " id="myCard" >
                <h5 class="card-header bg-black-30"><?php echo $task->task;?></h5>
                <div class="card-body bg-secondary" id="card-body">
                    <p style="max-width: 1100px;" class="card-text text-white" id="cardText"><?php echo $task->description;?><br>on <?php echo $task->date;?>  from <?php echo $task->from;?>  to <?php echo $task->to;?></p>
                    
                    <div>
                        <button type="button" id="done-btn" class="btn btn-success" onclick="toggleDone()">Done</button>
                        <a href="delete.php?id=<?php echo $task->id?>"><button type="button" class="btn btn-danger">Delete</button></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach?>
</div>

<script>
let originalText = null; // Store the original text

function toggleDone() {
    const card = document.getElementById('myCard');
    const cardBody = card.querySelector('.card-body');
    const cardText = card.querySelector('#cardText');
    const doneBtn = document.getElementById('done-btn');


    if (card.classList.contains('lighted')) {
        card.classList.remove('lighted');
        cardText.innerText = originalText; // Restore the original text
        doneBtn.innerText = 'Done';
    } else {
        card.classList.add('lighted');
        originalText = cardText.innerText; // Store the original text
        cardText.innerText = 'Done';
        doneBtn.innerText = 'Undone';
    }
}
</script>

</body>
</html>