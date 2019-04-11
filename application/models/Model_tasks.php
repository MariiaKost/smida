<?php

class Model_tasks  extends Model
{
    public function get_data(DataBase $db)
    {
        $data["taskslist"] = Task::getAllTasks($db);

        $data["priority"] = array(Task::LOW_PRIORITY=>"низкий", Task::NORMAL_PRIORITY => "средний", Task::HIGH_PRIORITY => "высокий");

        return $data;

    }

} 