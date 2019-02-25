{include file='box/head.tpl'}
{include file='box/menu.tpl'}
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-8 h-100">
            <div class="btn-group">
                {include file='box/taskListButton.tpl'}
                &nbsp;
                {include file='box/taskCodeButton.tpl'}
            </div>
            {include file='box/taskDescription.tpl'}
        </div>
        <div class="col-4">
            {include file='box/taskTest.tpl'}
        </div>
    </div>
</div>
{include file='box/tail.tpl'}
