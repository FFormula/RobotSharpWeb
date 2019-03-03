<div class="container-fluid px-4">
    <table id="table" class="table table-hover table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
            <th class="text-center">№ запуска</th>
            <th>Участник</th>
            <th>Задача</th>
            <th>Язык</th>
            <th>Результат</th>
        </tr>
        </thead>
        <tbody>
        {foreach from=$programList item=prog}
            <tr>
                <td class="text-center">
                    {$prog->runkey}
                </td>
                <td>
                    {$prog->partnerName} / {$prog->userName}
                </td>
                <td>
                    <a href="?page=TaskInfo&taskId={$prog->taskId}">{$prog->caption}</a>
                </td>
                <td>
                    <a href="?page=TaskCode&taskId={$prog->taskId}&langId={$prog->langId}">{$prog->lang}</a>
                </td>
                <td>
                    {if $prog->status == 'tests'}
                        {if $prog->points == '100'}
                            <span class="badge badge-success badge-pill">{$prog->points}%</span>
                        {else}
                            <span class="badge badge-warning badge-pill">{$prog->points}%</span>
                        {/if}
                    {else}
                        {if $prog->status == 'new'}coding{/if}
                        {if $prog->status == 'run'}running{/if}
                        {if $prog->status == 'compiler'}compile error{/if}
                    {/if}
                </td>
            </tr>
        {/foreach}
        </tbody>
    </table>
</div>


