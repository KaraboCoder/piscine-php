var getTodos = function(){
    var parsedTodos = new Array();
    var cookies = document.cookie.split(";");
    cookies.forEach(function(cookie) {
        if (cookie.indexOf("todos=") >= 0)
        {
            var todos = cookie.replace("todos=","").trim();
            parsedTodos = JSON.parse(todos);
        }
    }, this);
    return parsedTodos;
}

//init

window.onload = function(){
    var todos = getTodos();
    if (!todos)
        todos = [];
    todos.forEach(function(todoText){
        var todoList = document.getElementById("ft_list");
        var newTodo = document.createElement("div");
        newTodo.classList.add("todo");
        newTodo.innerText = todoText;
        newTodo.onclick = deleteTodo;
        todoList.insertBefore(newTodo, todoList.childNodes[0]);
    });
}

var saveTodos = function(todos){
    document.cookie = "todos=" + JSON.stringify(todos) + "; expires=" + new Date(Date.now() * 24*60*60*1000);
}

var removeFromCookies = function(todo){
    var todos = getTodos();
    var i = todos.indexOf(todo);
    if (i >= 0){
        todos.splice(i, 1);
        saveTodos(todos);
    }

}

var deleteTodo = function(e){
    var todoList = document.getElementById("ft_list");
    var shouldDelete = confirm("Do you want to delete this todo?");
    if (shouldDelete == true)
    {
        todoList.removeChild(e.target);
        removeFromCookies(e.target.innerText);
    }
}

var createTodo = function(){
    var todos = new Array();
    var todoText = prompt("Enter todo");
    if (todoText != null && todoText.trim().length > 0)
    {
        var todoList = document.getElementById("ft_list");
        var newTodo = document.createElement("div");
        newTodo.classList.add("todo");
        newTodo.innerText = todoText;
        newTodo.onclick = deleteTodo;
        todoList.insertBefore(newTodo, todoList.childNodes[0]);
        todos = getTodos();
        if (!todos)
            todos = [];
        todos.push(todoText);
        saveTodos(todos);
    }
}