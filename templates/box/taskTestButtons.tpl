<script>
    function showFileIn(nr)
    {
        {foreach from=$taskTestButtons item=test}
            if (nr === '{$test->testNr}') {
                $('#fileIn').val('{$test->fileIn|regex_replace:"/[']/":"\\'"|regex_replace:"/[\r]/":""|regex_replace:"/[\n]/" : "\\n"}');
                $('#test{$test->testNr}').addClass('badge-danger').removeClass('badge-success');
            } else
                $('#test{$test->testNr}').addClass('badge-success').removeClass('badge-danger');
        {/foreach}
        return false;
    }
</script>
<div class="col-12 example mb-4">
    <div class="card-header">
        <strong>Список тестов:</strong><br/>
        {foreach from=$taskTestButtons item=test}
            <a href="#" onclick="return showFileIn('{$test->testNr}');"
                ><span id='test{$test->testNr}' class="badge {if $test->testNr == 0}badge-danger{else}badge-success{/if} badge-pill">{$test->testNr}</span></a>
        {/foreach}
    </div>
</div>