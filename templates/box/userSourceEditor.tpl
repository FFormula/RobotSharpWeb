<form name="runForm" method="post" target="runFrame"
      action="/?page=RunProgram&taskId={$userSourceEditor->taskId}&langId={$userSourceEditor->langId}">
    <input type="hidden" id="mode" name="mode" value="run" />
    <label for="program"></label>
    <textarea id="program" name="source" class="program form-control height-100"
    >{$userSourceEditor->source}</textarea>
    <script>
        document.getElementById("program").onkeydown = function(e)
        {
            if (e.keyCode == 9 || event.which == 9)
            {
                e.preventDefault();
                var s = this.selectionStart;
                this.value = this.value.substring(0, this.selectionStart) + "    " +
                             this.value.substring(   this.selectionEnd);
                this.selectionEnd = s + 4;
            }
            document.getElementById('saveButton').innerHTML = 'Сохранить';
        }
    </script>
</form>
<iframe name="runFrame" style="display: none; width: 100%; height: 200px"></iframe>