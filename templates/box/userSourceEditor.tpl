<form name="runForm" method="post" target="runFrame"
      action="/?page=RunProgram&taskId={$userSourceEditor->taskId}&langId={$userSourceEditor->langId}">
    <label for="program"></label>
    <textarea id="program" name="source" class="program form-control height-100"
    >{$userSourceEditor->source}</textarea>
</form>
<iframe name="runFrame"></iframe>