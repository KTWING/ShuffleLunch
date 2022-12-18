<a href="employee">社員を登録する</a>

<form action="shuffle" method="post">
    <button type="submit">シャッフルする</button>
</form>

<?php foreach ($groups as $i => $group) : ?>
    <h3>
        グループ<?php echo ($i + 1) ?>
    </h3>
    <p>
        <?php foreach ($group as $employee) : ?>
            <?php echo $employee['name']; ?>
        <?php endforeach; ?>
    </p>
<?php endforeach; ?>
