<a href="#" class="btn btn-success" id="saveButton"
   onclick="document.runForm.mode.value = 'save'; document.runForm.submit(); return false;">Сохранить</a>
<script>
    function saved()
    {
        document.getElementById('saveButton').innerHTML = 'Сохранено';
    }
</script>
