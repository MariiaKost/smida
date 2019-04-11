<?php

class Model_projects  extends Model
{
    public function get_data(DataBase $db)
    {
        $data["projectslist"] = Project::getAllProjects($db);

        for ($i=0, $c=count($data["projectslist"]); $i<$c; $i++) {
            $data["projectslist"][$i]["tasks"] = Task::getTasksByProject($db,$data["projectslist"][$i]["id"]);
        }

        return $data;

    }

} 