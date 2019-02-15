<body>
    <div class="navbar mb-4 text-white bg-success">
        <h2 id="htmlTitle">
            {if !$menu->home}
                <a href="/?page=TaskList" style="color: white">«</a>
            {/if}
            {$menu->title}
        </h2>
        <div class="btn-group righted" style="float:right;">
            <strong>{$menu->userName}</strong>
        </div>
    </div>
