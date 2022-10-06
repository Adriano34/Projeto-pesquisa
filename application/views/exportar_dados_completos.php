<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exportação de dados das empresas</title>

    <style>
        table, th, td {
            border: solid 0.5px #000000;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <?php foreach ($header as $head) : ?>
                <th><?= $head ?></th>
            <?php endforeach; ?>
        </tr>

        <?php foreach ($empresas as $empresa) : ?>
            <tr>
                <?php foreach ($header as $head) : ?>
                    <td><?= $empresa->{$head} ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
