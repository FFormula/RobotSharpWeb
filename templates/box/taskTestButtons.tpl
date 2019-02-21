<div class="col-12 example mb-4">
    <div class="card-header">
        <strong>Список тестов:</strong><br/>
        {foreach from=$taskTestButtons item=test}
            <a href="#"><span class="badge badge-success badge-pill">{$test->testNr}</span></a>
        {/foreach}
    </div>
</div>