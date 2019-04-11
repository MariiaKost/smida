<?php

class Controller_project extends Controller
{
    public $model_menu;

    function __construct()
    {
        $this->model = new Model_project();
        $this->view = new View();
    }

    function action_add(DataBase $db)
    {
        $data = $this->model->get_data($db);

        $this->view->generate('projectform_view.php', 'template_view.php', $data);
    }

    function action_edit(DataBase $db, $id)
    {

        $data = $this->model->get_data($db, $id);

        $this->view->generate('projectform_view.php', 'template_view.php', $data);

    }


    function action_save(DataBase $db)
    {

        $project =  new Project (@$_POST["name"], $db);
        $project->id = $_POST["id"];

        try {
            $project->save();
        }
        catch (Exception $e) {
            echo $e->__toString();
        }

        header("location: /projects");
    }

    function action_delete(DataBase $db, $id)
    {
        if (empty ($id)) {
            $project = new Project (@$_POST["name"], $db);
            $project->id = $_POST["id"];
        }
        else {
            $project = Project::getProject($db, $id);
        }

        try {
            $project->delete();
            unset ($project);
        }
        catch (Exception $e) {
            echo $e->__toString();
        }
        header("location: /projects");
    }
} 