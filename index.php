<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">

    <title>To Do List</title>
</head>

<body>
    <div class="wrapper">
        <div id="app">
            <section class="todo-list py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="display-1 text-white">Todo List</h1>
                            <h5 class="text-white text-center my-2"><em>(PHP ToDo List JSON)</em></h5>
                            <ul class="list-group list-group-flush border border-1 rounded">
                                <li v-for="(task, index) in todoList" :key="index"
                                    :class="{ 'list-group-item': true, 'completed': task.done }">
                                    <span @click="toggleTask(index)" class="clickable">
                                        <i class="far fa-check-circle mx-2"></i>
                                    </span>
                                    {{ task.text }}
                                    <span @click="deleteTask(index)" class="float-end clickable">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="add-todo">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Aggiungi un nuovo task..."
                                    aria-label="Inserisci nuovo elemento per la lista" aria-describedby="button-add"
                                    v-model="newTask" @keyup.enter="addTask">
                                <button class="btn btn-outline-warning" type="button" id="button-add"
                                    @click="addTask">Inserisci</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="js/script.js" type="module"></script>
</body>

</html>