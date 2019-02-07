<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <title>Задача № {$task->taskId} : {$task->caption}</title>
    </head>
    <body>
		<div class="navbar mb-4 text-white bg-success">
            <span>
                Условие задачи № {$task->taskId} ::
                <strong>{$task->caption}</strong>
            </span>
			<div class="btn-group" style="float:right;">
				<button id="langButton" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Технология
                </button>
                <div class="dropdown-menu righted" id="langListItem">
                    {foreach from=$langs item=lang}
                        <a class="dropdown-item" href="prog.php?taskId={$task->taskId}&langId={$lang->langId}"
                        >{$lang->lang}</a>
                    {/foreach}
                </div>
			</div>
		</div>
		<div class="container-fluid px-4">
			<div class="row">
				<div class="col-9 h-100">
					<div class="row">
						<div class="col-12">
							<strong>Условие задачи</strong>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="task-text">
                                <pre>{$task->description}</pre>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<strong>Видео-решение</strong>
							<div class="embed-responsive embed-responsive-16by9">
								<iframe src="https://www.youtube.com/embed/{$task->video}" class="embed-responsive-item" frameborder="0"></iframe>
							</div>
						</div>
					</div>
				</div>
				<div class="col-3">
					<a id="" href="#" onclick="document.location='prog.html?taskId=' + taskId + '&langId=' + langId; return false;"
                       class="btn btn-danger btn-block mb-4" title="">Решать задачу</a>
					<div class="col-12 example mb-4">
					    <div class="card-header">
						   Пример
					    </div>
					    <textarea id="fileIn" class="form-control text-white bg-info" rows="5"
                            >{$task->fileIn}</textarea>
					</div>
					<div class="col-12 example">
						<div class="card-header">
							Результат
						</div>
						<textarea id="fileOut" class="form-control text-white bg-success" rows="5"
                            >{$task->fileOut}</textarea>
					</div>
				</div>
			</div>
        </div>
    </body>
</html>