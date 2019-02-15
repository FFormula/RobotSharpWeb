    <button id="langButton" type="button" class="btn btn-default dropdown-toggle"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {$langList->lang}
    </button>
    <div class="dropdown-menu" id="langListItem">
        {foreach from=$langList->langs item=$lang}
            <a class="dropdown-item" href="/?page=TaskCode&taskId={$langList->taskId}&langId={$lang->id}">{$lang->lang}</a>
        {/foreach}
    </div>
