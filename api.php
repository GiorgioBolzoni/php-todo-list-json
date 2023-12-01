<?php
// leggo il file todo-list.json e lo metto in una variabile come stringa
$filecontent = file_get_contents("todo-list.json");
// var_dump($filecontent);

// decodifico la stringa in un array php
$list = json_decode($filecontent, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['task'])) {
        $newtask = [
            'text' => $_POST['task'],
            'done' => false
        ];
        array_push($list, $newtask);
        file_put_contents('todo-list.json', json_encode($list));
    } elseif (isset($_POST['toggle'])) {
        $index = $_POST['toggle'];
        $list[$index]['done'] = !$list[$index]['done'];
        file_put_contents('todo-list.json', json_encode($list));
    } elseif (isset($_POST['delete'])) {
        $index = $_POST['delete'];
        array_splice($list, $index, 1);
        file_put_contents('todo-list.json', json_encode($list));
    }
}

header('Content-Type: application/json');

// stampo la lista in json
echo json_encode($list);
?>