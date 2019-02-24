<div class="modal" id="runWindow" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Запуск программы</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Программа отправлена на сервер для проверки.</p>
                <p>Робот Шарп сначала её откомпилирует,
                    а потом запустит несколько раз с разными начальными данными.</p>
                <p>Результаты компиляции и прохождения тестов будут отображены сразу после проверки.
                    Обычно на это требуется около 10 секунд.</p>
                <p>Ожидайте перезагрузки страницы...</p>
                <h1><span id="counter"></span></h1>
            </div>
        </div>
    </div>
</div>
<script>
    var counter = 11;

    function reloadPage()
    {
        counter --;
        document.getElementById('counter').innerHTML = counter;
        if (counter <= 0)
            location.reload();
    }

    function showRunWindow()
    {
        $('#runWindow').modal();
        setInterval(reloadPage, 1000);
    }
</script>
