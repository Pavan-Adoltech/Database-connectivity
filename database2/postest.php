<?php
require_once('post.php');

$p=new post();

//select
var_dump($p->getPosts());
var_dump($p->getPostsbyId(1));

//insert
$data=['ownername'=>'sam','street_name'=>'nethajistreet'];
$p->addPosts($data);
var_dump($p->getPosts());

//update
$data=['id'=>1,'ownername'=>'Nehal','street_name'=>'mathajistreet'];
$p->updatePosts($data);
var_dump($p->getposts());


//delete
$p->deletePosts(1);
var_dump($p->getPosts());

?>
