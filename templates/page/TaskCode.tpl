{include file='box/head.tpl'}
{include file='box/menu.tpl'}
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-9 h-100">
            Write your program here
            <div class="btn-group righted" style="float:right;">
                {include file='box/langList.tpl'}
            </div>
            {include file='box/userSourceEditor.tpl'}
        </div>
        <div class="col-3">
            {include file='box/taskRunButton.tpl'}
            {include file='box/taskTestButtons.tpl'}
            {include file='box/taskTest.tpl'}
        </div>
    </div>
</div>
{include file='box/tail.tpl'}
