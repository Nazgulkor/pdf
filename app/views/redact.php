<?php
ob_start();
$title = 'Редактирование';
?>
<div class="buttons">
    <a href="/"><button>На главную</button></a>
    <?php if ($users) : ?>
    <a href="/redact/mail"><button>Разослать файл по почтам</button></a>
    <?php endif;?>
</div>
<?php if ($users) : ?>
    <table class="table">
        <thead>
            <tr>
                <th>ФИО</th>
                <th>Почта</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['fullname'] ?></td>
                    <td><?= $user['email'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<? else : ?>
    <h2>Нет пользователей!</h2>
<? endif; ?>
<div class="center">
    <h1>Создайте пользователя чтобы отправить файл</h1>
    <form action="/redact/create" method="post">
        <div class="inputbox">
            <input id="fullname" type="text" required="required" name="fullname">
            <label for="fullname">ФИО</label>
        </div>
        <div class="inputbox">
            <input id="email" type="email" required="required" name="email">
            <label for='email'>Почта</label>
        </div>
        <div class="inputbox">
            <button class='create' type="submit" value="submit">
                Создать
            </button>

        </div>
    </form>
</div>
<?php
$content = ob_get_clean();
include('layout.php');
?>