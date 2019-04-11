<?php

class Project {

    public $id;
    public $name;

    public $db;


    public function __construct ($name='', $db)
    {
        $this->name = $name;

        $this->db = $db;
    }

    public function save()
    {
        if ($this->id) {
            $sql = "UPDATE `projects` SET `name`={?} WHERE `id`=" . $this->id;
            if ($this->db->query($sql, array($this->name))) {
                return true;
            } else {
                throw new Exception ("Ошибка сохранения в базе!");
            }
        } else {
            $sql = "INSERT INTO `projects` (`name`) VALUES ({?})";
            $this->id = $this->db->query($sql, array($this->name));
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
            $sql = "DELETE from `projects`  WHERE `id`={?}";
            $this->db->query($sql, array ($this->id));

            $sql_tasks = "UPDATE `tasks` SET `project_id`=0  WHERE `project_id`={?}";
            $this->db->query($sql_tasks, array ($this->id));
        }
    }


    public static function getProject ($db, $id)
    {
        $sql = "select * from `projects` where `id`={?}";
        $row = $db->selectRow($sql, array($id));
        if (empty ($row)) { return null; }

        $project = new project ($row["name"], $db);
        $project->id = $id;

        return $project;
    }

    public static function getAllProjects ($db)
    {
        $sql = "select * from `projects` order by `id`";
        $projects_rows = $db->select($sql);
        if ($projects_rows===false)
        {
            $projects_rows = array();
        }
        return $projects_rows;
    }


}
