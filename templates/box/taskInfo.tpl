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
                                <pre>{$taskInfo->description}</pre>
							</div>
						</div>
					</div>
					<!--div class="row">
						<div class="col-12">
							<strong>Видео-решение</strong>
							<div class="embed-responsive embed-responsive-16by9">
								<iframe src="https://www.youtube.com/embed/{$taskInfo->video}" class="embed-responsive-item" frameborder="0"></iframe>
							</div>
						</div>
					</div-->
				</div>
				<div class="col-3">
					<a href="index.php?page=TaskList&taskId={$taskInfo->id}&langId={$taskInfo->langId}"
                       class="btn btn-danger btn-block mb-4" title="">Решать задачу</a>
					<div class="col-12 example mb-4">
					    <div class="card-header">
						   Пример
					    </div>
					    <textarea id="fileIn" class="form-control text-white bg-info" rows="5"
                            >{$taskInfo->fileIn}</textarea>
					</div>
					<div class="col-12 example">
						<div class="card-header">
							Результат
						</div>
						<textarea id="fileOut" class="form-control text-white bg-success" rows="5"
                            >{$taskInfo->fileOut}</textarea>
					</div>
				</div>
			</div>
        </div>
