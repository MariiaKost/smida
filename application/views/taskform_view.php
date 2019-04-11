<link type="text/css" rel="stylesheet" href="/css/tcal.css" />
<script type="text/javascript" src="/js/tcal.js"></script>

<h1>Добавление / редактирование задания</h1>


<form action="/task/save" name="f" method="post">
    <input type="hidden" name="id" value="<?php echo $task->id?>">
    <input type="hidden" name="referer" value="<?php echo $referer ?>">

    Заголовок:<br>
    <input type="text" name="name" value="<?php echo $task->name?>" size="50">

    <br> <br>

    Описание:<br>
    <textarea name="description" cols="40" rows="3"><?php echo $task->description?></textarea>

    <br> <br>

    Приоритет:<br>
    <select name = "priority">
        <option value = "<?php echo TASK::LOW_PRIORITY ?>" <?php echo ($task->priority==TASK::LOW_PRIORITY ? "selected" : "") ?>>низкий</option>
        <option value = "<?php echo TASK::NORMAL_PRIORITY ?>" <?php echo ($task->priority==TASK::NORMAL_PRIORITY ? "selected" : "") ?>>средний</option>
        <option value = "<?php echo TASK::HIGH_PRIORITY ?>" <?php echo ($task->priority==TASK::HIGH_PRIORITY ? "selected" : "") ?>>высокий</option>
    </select>

    <br> <br>

    Дата окончания:<br>
    <input type="date" name="end_date" class="tcal" value="<?php echo $task->end_date?>" size="10">

    <br> <br>
    <input type="checkbox" name="done" value="yes" <?php echo ($task->done == "yes" ? "checked" : "") ?>> Выполнено

    <br> <br> <br>

    Проект:<br>
    <select name = "project_id">
        <option value = "">--Выбрать--</option>
        <?php for ($i=0, $c=count($projectslist); $i<$c; $i++) { ?>
        <option value = "<?php echo $projectslist[$i]['id'] ?>" <?php echo ($task->project_id==$projectslist[$i]['id'] ? "selected" : "") ?>><?php echo $projectslist[$i]['name'] ?></option>
        <?php } ?>
    </select>

    <br> <br>
    <input type="submit" value="Сохранить">
    <input type="button" value="Удалить" onclick="document.f.action = '/task/delete'; document.f.submit();">
</form>