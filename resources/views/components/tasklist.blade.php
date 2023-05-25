<link href="{{ asset('css/components/tasklist.css') }}" rel="stylesheet">
<div class="task-list">
    <section class="task-list container">
        <header>
            <h2>Minhas tarefas<i class="far fa-user"></i></h2>
            <div class="input-group">
                <label>
                    <input type="text" placeholder="Adicionar novo tarefa"/>
                </label>
                <button type="submit" data-testid="add-task-button" onClick={handleCreateNewTask}>

                </button>
            </div>
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
                    <button type="button">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </li>
            </ul>
        </main>
    </section>
</div>