<pre>Running program ... {$RunProgram->runkey}</pre>
<script>
    if ('{$RunProgram->status}' === 'run')
        parent.showRunWindow();
    else
        parent.saved();
</script>