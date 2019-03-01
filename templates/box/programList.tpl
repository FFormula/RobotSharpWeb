<div class="container-fluid px-4">
    <table id="table" class="table table-hover table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
            <th class="text-center">№ запуска</th>
            <th>Участник</th>
            <th>Задача</th>
            <th>Язык</th>
            <th>Запуски</th>
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
                    {$prog->caption}
                </td>
                <td>
                    {$prog->lang}
                </td>
                <td>
                    {$prog->runs}
                </td>
                <td>
                    {if $prog->status == 'tests'}
                        {if $prog->points == '100'}
                            <span class="badge badge-success badge-pill">{$prog->points}%</span>
                        {else}
                            <span class="badge badge-warning badge-pill">{$prog->points}%</span>
                        {/if}
                    {else}
                        {$prog->status}
                    {/if}
                </td>
            </tr>
        {/foreach}
        </tbody>
    </table>
</div>

