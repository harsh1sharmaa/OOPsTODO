<?php

namespace App;

class Todo
{

    public array $todo = array();
    /**
     * constructor of Todo class
     */
    public function __construct()
    {
    }
    /**
     * set the task into todo
     *
     * @param Task $task
     * @return void
     */
    function setTask(Task $task)
    {

        $len = count($this->todo) + 1;
        $task->id = $len;
        $task->check = "f";
        array_push($this->todo, $task);
    }
    /**
     * return the todo of task
     *
     * @return void
     */
    function getTodo()
    {

        return $this->todo;
    }

    /**
     * it set the todo with previous todo
     *
     * @param [type] $todo
     * @return void
     */
    function setTodo($todo)
    {

        $this->todo = json_decode($todo);
    }
    /**
     * remove the task from todo
     *
     * @param [type] $id
     * @return void
     */
    function removeFromTodo($id)
    {

        foreach ($this->todo as $key => $val) {

            if ($val->id == $id) {

                array_splice($this->todo, $key, 1);
                return;
            }
        }
    }

    /**
     * update task in todo
     *
     * @param [type] $id
     * @param [type] $task
     * @return void
     */
    function updateInTodo($id, $task)
    {

        foreach ($this->todo as $key => $val) {

            if ($val->id == $id) {

                // array_splice($this->todo,$key,1);
                $this->todo[$key]->name = $task;
                return;
            }
        }
    }
    /**
     * check the completed task
     *
     * @param [type] $id
     * @return void
     */
    function checkedInTodo($id)
    {

        foreach ($this->todo as $key => $val) {

            if ($val->id == $id) {

                // array_splice($this->todo,$key,1);
                $this->todo[$key]->check = "t";
                return;
            }
        }
    }
}
