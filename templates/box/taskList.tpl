    <div class="container-fluid px-4">
        <table id="table" class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th class="text-center">№</th>
                <th>Раздел</th>
                <th>Задача</th>
                <th>Points</th>
            </tr>
            </thead>
            <tbody>
            {foreach from=$taskList item=task}
                <tr>
                    <td class="text-center">
                        <a href="index.php?page=TaskInfo&taskId={$task->id}" title="Открыть условие">
                            <span class="badge badge-primary badge-pill">{$task->id}</span>
                        </a>
                    </td>
                    <td>
                        {$task->sector}
                    </td>
                    <td>
                        <a href="index.php?page=TaskInfo&taskId={$task->id}" title="Открыть условие">
                            {$task->caption}
                        </a>
                    </td>
                    <td>
                        {$task->points}
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
