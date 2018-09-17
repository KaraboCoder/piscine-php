$(function(){

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
    var todos = getTodos();
    if (!todos)
        todos = [];
    todos.forEach(function(todoText){
        var todoList = $("#ft_list");
        var newTodo = document.createElement("div");
        newTodo.classList.add("todo");
        newTodo.innerText = todoText;
        newTodo.onclick = deleteTodo;
        todoList.prepend(newTodo);
    });

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
        var todoList = $("#ft_list");
        var shouldDelete = confirm("Do you want to delete this todo?");
        if (shouldDelete == true)
        {
            removeFromCookies(e.target.innerText);
            $(e.target).remove();
        }
    }
    
    var createTodo = function(){
        var todos = new Array();
        var todoText = prompt("Enter todo");
        if (todoText != null && todoText.trim().length > 0)
        {
            var todoList = $("#ft_list");
            var newTodo = document.createElement("div");
            newTodo.classList.add("todo");
            newTodo.innerText = todoText;
            newTodo.onclick = deleteTodo;
            todoList.prepend(newTodo);
            todos = getTodos();
            if (!todos)
                todos = [];
            todos.push(todoText);
            saveTodos(todos);
        }
    }

    $("#new").click(createTodo);
});