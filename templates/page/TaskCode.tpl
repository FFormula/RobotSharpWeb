{include file='box/head.tpl'}
{include file='box/menu.tpl'}
<div class="container-fluid px-4">
    <div class="row">
    {if $TaskCode->status == "tests"}
        <div class="col-9 h-100">
            <h3>{$TaskCode->caption}</h3>
            <div class="btn-group righted" style="float:right;">
                {include file='box/langList.tpl'}
                {include file='box/taskRunButton.tpl'}
            </div>
            {include file='box/userSourceEditor.tpl'}
        </div>
        <div class="col-3">
            {include file='box/taskTestButtons.tpl'}
            {include file='box/taskTest.tpl'}
        </div>
    {else}
        <div class="col-12 h-100">
            {include file='box/compileError.tpl'}
            <div class="btn-group">
                {include file='box/taskRunButton.tpl'}
            </div>
            <div class="btn-group righted" style="float:right;">
                {include file='box/langList.tpl'}
            </div>
            {include file='box/userSourceEditor.tpl'}
        </div>
    {/if}
    </div>
</div>
{include file='box/tail.tpl'}
