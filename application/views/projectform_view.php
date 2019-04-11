<h1>Добавление / редактирование проекта</h1>


<form action="/project/save" name="f" method="post">
    <input type="hidden" name="id" value="<?php echo $project->id?>" size="50">

    Название:<br>
    <input type="text" name="name" value="<?php echo $project->name?>" size="50">


    <br> <br>
    <input type="submit" value="Сохранить">
    <input type="button" value="Удалить" onclick="document.location.href = '/project/delete/<?php echo $project->id ?>';">
</form>