<pre>Running program ... {$RunProgram->runkey}</pre>
<script>
    function getResults()
    {
        document.location =
            '/?page=RunResults&runkey={$RunProgram->runkey}';
    }
    setTimeout(getResults, 5000);
</script>