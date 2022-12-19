<a href="employee">社員を登録する</a>
<?php if (count($errors)) : ?>
    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<form action="shuffle" method="post">
    <div>
        <label for="numbers">グループあたりの人数</label>
        <input type="number" name="numbers" id="numbers">
    </div>
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
