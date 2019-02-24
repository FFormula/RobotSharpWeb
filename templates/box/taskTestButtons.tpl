<div class="col-12 example mb-4">
    <div class="card-header">
        <strong>Список тестов:</strong><br/>
        {foreach from=$taskTestButtons item=test}
            <a href="#" onclick="return showFileIn('{$test->testNr}');"
                ><span id='test{$test->testNr}' class="badge badge-pill">{$test->testNr}</span></a>
        {/foreach}
    </div>
</div>
<script>
    function showFileIn(nr)
    {
        {foreach from=$taskTestButtons item=test}
        if (nr === '{$test->testNr}') {
            $('#fileIn')
                .val('{$test->fileIn|regex_replace:"/[']/":"\\'"|regex_replace:"/[\r]/":""|regex_replace:"/[\n]/" : "\\n"}');
            $('#fileOut')
                .val('{$test->fileOut|regex_replace:"/[']/":"\\'"|regex_replace:"/[\r]/":""|regex_replace:"/[\n]/" : "\\n"}')
                .removeClass('bg-success')
                .removeClass('bg-danger')
                .addClass('bg-{if $test->valid}success{else}danger{/if}');
            $('#test{$test->testNr}')
                .removeClass('badge-success')
                .removeClass('badge-danger')
                .addClass('badge-primary');
        } else
            $('#test{$test->testNr}')
                .removeClass('badge-primary')
                .removeClass('badge-danger')
                .addClass('badge-{if $test->valid}success{else}danger{/if}');
        {/foreach}
        return false;
    }
    $( function () { showFileIn('0'); } );
</script>
