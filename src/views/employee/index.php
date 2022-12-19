<h2>社員の登録</h2>
<?php if (count($errors)) : ?>
    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="/employee/create" method="post">
    <div>
        <label for="name">社員名</label>
        <input type="text" name="name" id="name">
    </div>
    <button type="submit">登録する</button>
</form>

<h2>社員の削除</h2>

<form action="/employee/delete" method="post">
    <div>
        <label for="deleteNumber">社員id</label>
        <input type="number" name="deleteNumber" id="deleteNumber">
    </div>
    <button type="submit">削除する</button>
</form>

<h2>社員の一覧</h2>
<ul>
    <?php foreach ($employees as $key => $employee) : ?>
        <li><?php echo $key + 1 . ' : ' . $employee['name']; ?></li>
    <?php endforeach; ?>
</ul>
