{include file='box/head.tpl'}
{include file='box/menu.tpl'}
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-{if $TaskCode->showTests}8{else}12{/if} h-100">
            <div class="btn-group">
                {include file='box/taskInfoButton.tpl'}
                &nbsp;
                {include file='box/langList.tpl'}
                &nbsp;
                {include file='box/taskRunButton.tpl'}
                &nbsp;
                <a href="#" {if $TaskCode->status == 'run'}onclick="document.location.reload();"{/if}
                   class="btn btn-{$TaskCode->captionBg}">{$TaskCode->caption}</a>
            </div>
            {include file='box/taskCompilerError.tpl'}
            {include file='box/userSourceEditor.tpl'}
        </div>
        {if $TaskCode->showTests}
        <div class="col-4">
            {include file='box/taskTestButtons.tpl'}
            {include file='box/taskTest.tpl'}
        </div>
        {/if}
    </div>
</div>
{include file='box/taskRunWindow.tpl'}
{include file='box/tail.tpl'}
