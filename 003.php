<?php

$contents = file_get_contents('todo.csv');

$byLine = explode("\n", $contents);

$table = [];

foreach ($byLine as $line) {
    $byWords = explode(',', $line);

    list($id, $title, $description) = $byWords;

    $table[] = [
        'id' => $id,
        'title' => $title,
        'description' => $description
    ];
}

function rowPrinter($rows, $cols)
{
    echo "<table>";
    echo "<tr>";

    foreach($cols as $col)
    {
        echo "<th>$col</th>";
    }
    echo "</tr>";

    foreach($rows as $row)
    {
        echo "<tr>";

        foreach ($cols as $col) {
            echo "<td>{$row[$col]}</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

rowPrinter($table, ['id', 'title', 'description']);