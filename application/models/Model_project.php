<?php

class Model_project  extends Model
{
    public function get_data(DataBase $db, $id="")
    {
        if (!empty($id)) {
            $data["project"] = Project::getProject($db, $id);
        }
        else {
            $data["project"] = new Project ("", $db);
        }

        return $data;

    }

} 