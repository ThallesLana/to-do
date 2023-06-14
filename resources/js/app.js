import $ from 'jquery';
import './bootstrap';

function taskList() {
    $.ajax({
            url: 'api/todo/list',
            method: 'GET',
            data: {
                'user_id' : 1
            },
            success: function (response) {
                // Limpa a lista existente
                $('ul').empty();

                // Itera sobre os todos retornados na resposta
                // console.log(response.todos);
                $.each(response.todos, function(index, todo) {
                    // Cria um novo item de lista <li>
                    var listItem = $('<li id="' + todo.to_do_id + '"></li>');

                    // Cria o conteúdo do item de lista
                    var listItemContent = $('<div></div>');

                    // Cria o checkbox
                    var checkbox = $('<input type="checkbox">');
                    checkbox.attr('data-todo-id', todo.to_do_id); // Associa o ID ao checkbox
                    var checkboxContainer = $('<label class="checkbox-container"></label>');
                    checkboxContainer.append(checkbox);
                    checkboxContainer.append('<span class="checkmark"></span>');

                    // Adiciona a classe "completed" se todo.done for igual a 1
                    if (todo.done === 1) {
                        listItemContent.addClass('completed');
                        checkbox.prop('checked', true);
                    }

                    // Cria o texto da tarefa
                    var taskText = $('<p></p>').text(todo.text_to_do);

                    // Cria o botão de exclusão
                    var deleteButton = $('<button class="deleteTask"></button>');
                    deleteButton.append('<img src="assets/delete.svg" alt="Trash Icon" id="trash">');

                    // Adiciona o conteúdo ao item de lista
                    listItemContent.append(checkboxContainer);
                    listItemContent.append(taskText);

                    // Adiciona o conteúdo e o botão ao item de lista
                    listItem.append(listItemContent);
                    listItem.append(deleteButton);

                    // Adiciona o item de lista à lista <ul>
                    $('ul').append(listItem);
                });
            }
        }
    )
}

function isComplete() {
    $('body').on('click', '.checkbox-container input[type="checkbox"]', function() {
        var checkbox = $(this);
        var div = checkbox.closest('li').find('div');

        if (checkbox.is(':checked')) {
            $.ajax({
                url: 'api/todo/checked',
                method: 'PUT',
                data: {
                    'task_id' : checkbox.data('todo-id'),
                    'is_done' : 1
                },
                success: function (response) {
                    div.addClass('completed');
                }
            });
        } else {
            $.ajax({
                url: 'api/todo/checked',
                method: 'PUT',
                data: {
                    'task_id' : checkbox.data('todo-id'),
                    'is_done' : 0
                },
                success: function (response) {
                    div.removeClass('completed');
                    console.log('undone');
                }
            });
        }
    });
}

function createNewTask() {
    $('#createNewTask').submit(function (event) {
        event.preventDefault(); // Impede o envio do formulário

        let textTask = $('#textTask')
        $.ajax({
            url: 'api/todo/store',
            method: 'POST',
            data: {
                'text_to_do': textTask.val()
            },
            success: function (response) {
                taskList();
                textTask.val('');
            }
        });
    })
}

function deleteTask() {
    $('ul').on('click', '.deleteTask', function(event) {
        var listItem = $(this).closest('li');
        var todoId = listItem.attr('id');
        $.ajax({
            url: 'api/todo/delete',
            method: 'DELETE',
            data: {
                'task_id': todoId,
            },
            success: function(response) {
                listItem.remove();
            }
        });
    });
}


$(document).ready(function(){
    taskList();
    isComplete();
    createNewTask();
    deleteTask();
});
