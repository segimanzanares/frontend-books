<html>
    <head>
        <title>Crear libro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
    </head>
    <body>
        <div class="container">
             <div class="row mb-2">
                <div class="col-md-12">
                    <?php
                    include '../views/navbar.php';
                    ?>
                    <div class="card mt-5">
                        <div class="card-header">
                            <h5 class="card-title">Crear libro</h5>
                        </div>
                        <div class="card-body">
                            <form id="form-book" action="/books/form.php" method="POST">
                                <div class="alert alert-danger" style="display: none;"></div>
                                <input type="hidden" name="action" value="store"/>
                                <div class="form-group">
                                    <label class="control-label">Título</label>
                                    <input type="text" class="form-control" name="title" autofocus/>
                                    <span class="invalid-feedback" role="alert"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Autor</label>
                                    <select class="form-control" name="author">
                                        <?php
                                        foreach ($authors as $author) {
                                            ?>
                                            <option value="<?= $author->id ?>"><?= $author->first_name . ' ' . $author->last_name ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="invalid-feedback" role="alert"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Editorial</label>
                                    <input type="text" class="form-control" name="publisher"/>
                                    <span class="invalid-feedback" role="alert"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Fecha de publicación</label>
                                    <input type="text" class="form-control datepicker" name="published_date"/>
                                    <span class="invalid-feedback" role="alert"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Descripción</label>
                                    <textarea class="form-control" name="description"></textarea>
                                    <span class="invalid-feedback" role="alert"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Idioma</label>
                                    <input type="text" class="form-control" name="language" maxlength="2"/>
                                    <span class="invalid-feedback" role="alert"></span>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button id="btn-save" type="button" class="btn btn-primary">Guardar</button>
                            <a href="/books/index.php" class="btn btn-secondary">Volver al listado</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
        <script src="/assets/js/app.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#btn-save').click(function(e) {
                    e.preventDefault();
                    save($('#form-book'), function() {
                        window.location.href = '/books/index.php';
                    });
                });
            });
        </script>
    </body>
</html>