<?php

//headers
use core\Post;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


//initializing out api
include_once('../includes/config.php');
include_once('../core/post.php');


//instantiate post
$post = new Post($conn);

//blog post query
$result = $post->read();

//get the row count
$num = $result->rowCount();

//check if any posts
if ($num > 0) {
    $post_arr = array();
    $post_arr['data'] = array();
    while ( $row = $result -> fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $post_item = array(
            'id' => $id,
            'task'=> $task,
            'description' => $description,
            'from' => $from,
            'to' => $to,
        );
        array_push($post_arr['data'], $post_item);
    }
    //convert to json and output
    echo json_encode($post_arr);
    } else {
        echo json_encode(array("message" => "No tasks found"));
}