<?php
session_start();
require 'dbconnect.php';

if (isset($_SESSION['id'])) {
    $id = $_GET['id'];

    //投稿を削除する
    $messages = $db->prepare('SELECT * FROM posts WHERE id=?');
    $messages->execute(array($id));
    $message = $messages->fetch();

    if ($message['member_id'] == $_SESSION['id']) {
      //削除
        $del = $db->prepare('DELETE FROM posts WHERE id=?');
        $del->execute(array($id));
    }
}
header('Location: index.php');
exit();
