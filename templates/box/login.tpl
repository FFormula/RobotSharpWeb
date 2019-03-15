<div class="container-fluid px-4">
    <table class="table table-hover table-bordered">
        <tr>
            <td class="text-right">User ID:</td>
            <td><b># {$login->userId}</b></td>
        </tr>
        <tr>
            <td class="text-right">Token:</td>
            <td>{$login->token}</td>
        </tr>
        <tr>
            <td class="text-right">Name:</td>
            <td><b>{$login->name}</b></td>
        </tr>
        <tr>
            <td class="text-right">E-mail:</td>
            <td><b>{$login->email}</b></td>
        </tr>
        <tr>
            <td class="text-right">Partner:</td>
            <td><b>{$login->partnerInfo}</b></td>
        </tr>
    {if $login->error}
        <tr>
            <td class="text-right">Error:</td>
            <td><a href="#" class="btn btn-danger">{$login->error}</a></td>
        </tr>
    {else}
        <tr>
            <td>&nbsp;</td>
            <td><a href="/?page=TaskList" class="btn btn-success">Login</a></td>
        </tr>
    {/if}
    </table>
</div>
