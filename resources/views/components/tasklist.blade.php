@vite(['resources/css/components/tasklist.css', 'resources/js/app.js'])
<div class="task-list">
    <section class="task-list container">
        <header>
            <h2>Minhas tarefas<i class="far fa-user"></i></h2>
            <form class="input-group" id="createNewTask">
                <label>
                    <input required type="text" id="textTask" placeholder="Adicionar novo tarefa"/>
                </label>
                <button type="submit">
                    <img src="{{ asset('assets/new.svg') }}" alt="new item Icon" id="new">
                </button>
            </form>
        </header>

        <main>
            <ul>
                <li>
                    <div>
                        <label class="checkbox-container">
                            <input type="checkbox"/>
                            <span class="checkmark"></span>
                        </label>
                        <p>Teste</p>
                    </div>
                    <button id="deleteTask">
                        <img src="{{ asset('assets/delete.svg') }}" alt="Trash Icon">
                    </button>
                </li>
            </ul>
        </main>
    </section>
</div>