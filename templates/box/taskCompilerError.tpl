{if $taskCompilerError->compiler}
<div class="alert alert-danger show" role="alert">
    <strong>Ошибка компиляции</strong><br/>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <span id="idCompileError">{$taskCompilerError->compiler}</span>
</div>
{/if}