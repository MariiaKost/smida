<?php

class Controller_tasks extends Controller
{
    public $model_menu;

    function __construct()
    {
        $this->model = new Model_tasks();
        $this->view = new View();
    }

    function action_index(DataBase $db)
    {
        //$taskslist = Task::getAllTasks($db);

        $data = $this->model->get_data($db);

        $this->view->generate('tasks_view.php', 'template_view.php', $data);
    }
} 