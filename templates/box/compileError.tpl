<div class="alert alert-danger {if $compileError->status == 'compiler'}show{else}collapse{/if}" role="alert">
    <strong>Compile error</strong><br/>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <span id="idCompileError">{$compileError->compiler}</span>
</div>
