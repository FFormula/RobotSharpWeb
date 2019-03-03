    <div class="container-fluid px-4">
        <table id="table" class="table table-hover table-bordered table-striped">
            <thead class="thead-dark">
            <tr>
                <th>Раздел</th>
                <th title="Название задачи и наличие видеорешения к ней">Задача</th>
                <th title="На сколько % вы решили это задание, последнее максимальное значение">Результат</th>
                <th title="Сколько участников решили это задание на 100%">Решений</th>
            </tr>
            </thead>
            <tbody>
            {foreach from=$taskList item=task}
                <tr>
                    <td>
                        {$task->sector}
                    </td>
                    <td>
                        {if $task->video}
                            <i class="fa fa-youtube-play" title="Есть видеорешение"></i>&nbsp;
                        {/if}
                        <a href="index.php?page=TaskInfo&taskId={$task->id}" title="Открыть условие">
                            {$task->caption}
                        </a>
                    </td>
                    <td>
                        {if $task->points > 0}
                        <span class="badge badge-{if $task->points == 100}success{else}warning{/if} badge-pill">{$task->points}%</span>
                        {/if}
                    </td>
                    <td>
                        {if $task->users}{$task->users}{else}-{/if}
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
