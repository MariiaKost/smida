<?php

class Task {

    public $id;
    public $name;
    public $description;
    public $priority;
    public $end_date;
    public $done;
    public $project_id;

    public $db;

    const LOW_PRIORITY = 1;
    const NORMAL_PRIORITY = 2;
    const HIGH_PRIORITY = 3;

    public function __construct ($name='', $description='', $priority=self::NORMAL_PRIORITY, $end_date = '', $done='no', $project_id='', $db)
    {
        $this->name = $name;
        $this->description = $description;
        $this->priority = $priority;
        $this->end_date = $end_date;
        $this->done = $done;
        $this->project_id = $project_id;

        $this->db = $db;
    }

    public function save()
    {
        if ($this->id) {
            $sql = "UPDATE `tasks` SET `name`={?}, `description`={?}, `priority`={?}, `end_date`={?}, `done`={?}, `project_id`={?} WHERE `id`=" . $this->id;
            if ($this->db->query($sql, array($this->name, $this->description, $this->priority, $this->end_date, $this->done, $this->project_id))) {
                return true;
            } else {
                throw new Exception ("Ошибка сохранения в базе!");
            }
        } else {
            $sql = "INSERT INTO `tasks` (`name`, `description`, `priority`, `end_date`, `done`, `project_id`) VALUES ({?},{?},{?},{?},{?},{?})";
            $this->id = $this->db->query($sql, array($this->name, $this->description, $this->priority, $this->end_date, $this->done, $this->project_id));
            if ($this->id) {
                return true;
            } else {
                throw new Exception ("Ошибка записи в базу!");
                //throw new Exception ($this->db->mysqli->error);
            }
        }
    }

    public function delete()
    {
        if ($this->id) {
            $sql = "DELETE from `tasks`  WHERE `id`={?}";
            if ($this->db->query($sql, array ($this->id)))
            {
                return true;
            }
            else
            {
                throw new Exception ("Не указан id задания!");
            }

        }
    }


    public static function getTask ($db, $id)
    {
        $sql = "select * from `tasks` where `id`={?}";
        $row = $db->selectRow($sql, array($id));
        if (empty ($row)) { return null; }

        $task = new Task ($row["name"], $row["description"], $row["priority"], $row["end_date"], $row["done"], $row["project_id"], $db);
        $task->id = $id;

        return $task;
    }

    public static function getAllTasks ($db)
    {
        $sql = "select * from `tasks` order by `id`";
        $tasks_rows = $db->select($sql);
        if ($tasks_rows===false)
        {
            $tasks_rows = array();
        }
        return $tasks_rows;
    }

    public static function getTasksByProject($db, $project_id)
    {
    $sql = "select * from `tasks` where `project_id`={?} order by `id`";
    $tasks_rows = $db->select($sql, array($project_id));
    if ($tasks_rows===false)
    {
    return array();
    }
    return $tasks_rows;
    }


}
