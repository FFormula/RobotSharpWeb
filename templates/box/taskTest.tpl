        <div class="col-12 example mb-4">
            <div class="card-header">
                <label for="fileIn">Пример</label>
            </div>
            <textarea id="fileIn" class="form-control text-white bg-info" rows="{$taskTest->fileInRows}"
                >{$taskTest->fileIn}</textarea>
        </div>
        <div class="col-12 example">
            <div class="card-header">
                <label for="fileOut">Результат</label>
            </div>
            <textarea id="fileOut" class="form-control text-white bg-success" rows="{$taskTest->fileOutRows}"
                >{$taskTest->fileOut}</textarea>
        </div>