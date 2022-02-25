<?php

use App\Task;
use App\Todo;

session_start();
// session_unset();
// session_destroy();

require_once("vendor/autoload.php");

$action = $_GET['action'];

switch ($action) {

    case "add":
        $tsk = $_GET['task'];
        addTask($tsk);
        break;
    case "delete":
        $id = $_GET['id'];
        deleteTask($id);
        break;
    case "edit":
        $id = $_GET['id'];
        $text = $_GET['upTask'];
        updateTask($id, $text);
        break;
    case "check":
        $id = $_GET['id'];
        checkTask($id);
        break;
    case "start":
        start();
        break;
        //set
}

function start()
{
    echo $_SESSION['todo'];
}

function checkTask($id)
{
    $todo = new Todo();
    $todoFromSession = $_SESSION['todo'];
    $todo->setTodo($todoFromSession);
    $todo->checkedInTodo($id);
    $todoArr = $todo->getTodo();
    $_SESSION['todo'] = json_encode($todoArr);
    echo $_SESSION['todo'];
}

function updateTask($id, $text)
{

    $todo = new Todo();
    $todoFromSession = $_SESSION['todo'];
    $todo->setTodo($todoFromSession);
    $todo->updateInTodo($id, $text);
    $todoArr = $todo->getTodo();
    $_SESSION['todo'] = json_encode($todoArr);
    echo $_SESSION['todo'];
}

function addTask($tsk)
{

    $task = new Task($tsk);
    if (!isset($_SESSION['todo'])) {
        $todo = new Todo();
        $todo->setTask($task);
        $todoArr = $todo->getTodo();
        $_SESSION['todo'] = json_encode($todoArr);
    } else {
        $todo = new Todo();
        $todoFromSession = $_SESSION['todo'];
        $todo->setTodo($todoFromSession);
        $todo->setTask($task);
        $todoArr = $todo->getTodo();
        $_SESSION['todo'] = json_encode($todoArr);
        // $todo->setTodo($task);
    }
    echo $_SESSION['todo'];
}


function deleteTask($id)
{
    $todo = new Todo();
    $todoFromSession = $_SESSION['todo'];
    $todo->setTodo($todoFromSession);
    $todo->removeFromTodo($id);
    $todoArr = $todo->getTodo();
    $_SESSION['todo'] = json_encode($todoArr);
    echo $_SESSION['todo'];
}
