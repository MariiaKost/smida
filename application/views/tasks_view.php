<h1>Задания</h1>

<p> <a href="/task/add">Добавить задание</a></p>
<table cellpadding="5" cellspacing="1" border="0" bgcolor="#cccccc" align="center">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>description</th>
        <th>end date</th>
        <th>priority</th>
        <th>done</th>

        <th></th>
        <th></th>
    </tr>


    <?php for ($i=0, $c=count($taskslist); $i<$c; $i++) { ?>
    <tr>
        <td><?php echo $taskslist[$i]['id']?></td>
        <td><?php echo $taskslist[$i]['name']?></td>
        <td><?php echo $taskslist[$i]['description']?></td>
        <td><?php echo $taskslist[$i]['end_date']?></td>
        <td><?php echo $priority[$taskslist[$i]['priority']]?></td>
        <td><?php echo $taskslist[$i]['done']?></td>

        <td><a href="/task/edit/<?php echo $taskslist[$i]['id'] ?>">edit</a></td>
        <td><a href="/task/delete/<?php echo $taskslist[$i]['id'] ?>">delete</a></td>
    </tr>


<?php } ?>


