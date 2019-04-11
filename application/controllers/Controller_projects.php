<?php

class Controller_projects extends Controller
{
    public $model_menu;

    function __construct()
    {
        $this->model = new Model_projects();
        $this->view = new View();
    }

    function action_index(DataBase $db)
    {

        $data = $this->model->get_data($db);

        $this->view->generate('projects_view.php', 'template_view.php', $data);
    }
} 