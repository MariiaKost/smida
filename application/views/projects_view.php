<h1>Проекты</h1>

<p> <a href="/project/add">Добавить проект</a></p></p>
<table cellpadding="5" cellspacing="1" border="0" bgcolor="#cccccc" align="center">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>tasks</th>


        <th></th>
        <th></th>
    </tr>


    <?php for ($i=0, $c=count($projectslist); $i<$c; $i++) { ?>
    <tr>
        <td><?php echo $projectslist[$i]['id']?></td>
        <td><?php echo $projectslist[$i]['name']?></td>
        <td>
            <?php for ($k=0, $c_tasks=count($projectslist[$i]["tasks"]); $k<$c_tasks; $k++) { ?>
            <p><a href="/task/edit/<?php echo $projectslist[$i]["tasks"][$k]['id'] ?>"><?php echo $projectslist[$i]["tasks"][$k]['name'] ?></a></p>
            <?php } ?>
        </td>


        <td><a href="/project/edit/<?php echo $projectslist[$i]['id'] ?>">edit</a></td>
        <td><a href="/project/delete/<?php echo $projectslist[$i]['id'] ?>">delete</a></td>
    </tr>


<?php } ?>


