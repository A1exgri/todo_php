<?php require 'partials/header.php'; session_start();?>

<div id="myDIV" class="header">
    <?php
    if (!empty($_SESSION['auth'])) { ?>
        <form action="/logout" method="post" class="d-flex justify-content-end">
            <input type="hidden" name="logout" value="true">
            <button type="submit" class="btn btn-primary">Выйти</button>
        </form>
    <?php } else { ?>
        <div class="d-flex justify-content-end"><a class="btn btn-primary" href="/login">Админ</a></div>
    <?php } ?>

  <h2 style="margin:5px">ToDo List</h2>
  <form action="/add" method="post" class="d-flex">
      <input type="text" name="task" id="task" placeholder="Заголовок" class="me-2">
      <input type="text" name="user" id="user" placeholder="Имя" class="me-2">
      <input type="email" name="email" id="email" placeholder="Email" class="me-2">
      <button type="submit" class="btn btn-success">Добавить</button>
  </form>

</div>

<ul id="myUL">
  <?php foreach($tasks as $task):  ?>
    <li class="d-flex align-items-center justify-content-between <?= $task->status ? "checked" : "" ?>">
        <div>
            <strong class="pe-3"><?= $task->task; ?></strong>
            (<span>Пользователь: <em><?= $task->user;?></em></span>,
            <span>email: <em><?= $task->email;?></em></span>)
        </div>
        <?php
            if (!empty($_SESSION['auth'])) {
        ?>
        <div class="d-flex">
            <form action="/todolist/update" method="post" class=" me-2">
                <input type="hidden" name="id" value="<?= $task->id; ?>">
                <button type="submit" class="btn btn-success">Выполнено</button>
            </form>
            <form action="/todolist/delete" method="post">
                <input type="hidden" name="id" value="<?= $task->id; ?>">
                <button type="submit" class="btn btn-danger">x</button>
            </form>
        </div>
        <?php } ?>
    </li>
  <?php endforeach; ?>
</ul>

<?php require 'partials/footer.php'; ?>


