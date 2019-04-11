<?php

class Model_task  extends Model
{
    public function get_data(DataBase $db, $id="")
    {
        if (!empty($id)) {
            $data["task"] = Task::getTask($db, $id);
        }
        else {
            $data["task"] = new Task ("", "", Task::NORMAL_PRIORITY, "", "no", "", $db);
        }

        $data["projectslist"] = Project::getAllProjects($db);
        $data["referer"] = ($_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : "/tasks");

        return $data;

    }

} 