<?php

class Controller_task extends Controller
{
    public $model_menu;

    function __construct()
    {
        $this->model = new Model_task();
        $this->view = new View();
    }

    function action_add(DataBase $db)
    {
        $data = $this->model->get_data($db);

        $this->view->generate('taskform_view.php', 'template_view.php', $data);
    }

    function action_edit(DataBase $db, $id)
    {

        $data = $this->model->get_data($db, $id);

        $this->view->generate('taskform_view.php', 'template_view.php', $data);

    }


    function action_save(DataBase $db)
    {

        $task =  new Task (@$_POST["name"], @$_POST["description"], @$_POST["priority"], @$_POST["end_date"], (@$_POST["done"] !="yes" ? "no" : $_POST["done"]), @$_POST["project_id"], $db);
        $task->id = $_POST["id"];

        try {
            $task->save();
        }
        catch (Exception $e) {
            echo $e->__toString();
        }

        $referer = (!empty($_POST["referer"]) ? $_POST["referer"] : "/tasks");
        header("location: $referer");
    }

    function action_delete(DataBase $db, $id="")
    {
        if (empty ($id)) {
            $task = new Task (@$_POST["name"], @$_POST["description"], @$_POST["priority"], @$_POST["end_date"], (@$_POST["done"] != "yes" ? "no" : $_POST["done"]), @$_POST["project_id"], $db);
            $task->id = $_POST["id"];
        }
        else {
            $task = Task::getTask($db, $id);
        }

        try {
            $task->delete();
            unset ($task);
        }
        catch (Exception $e) {
            echo $e->__toString();
        }
        $referer = (!empty($_POST["referer"]) ? $_POST["referer"] : "/tasks");
        header("location: $referer");
    }
} 