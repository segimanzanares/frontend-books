<html>
    <head>
        <title>Crear autor</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                            <h5 class="card-title">Crear autor</h5>
                        </div>
                        <div class="card-body">
                            <form id="form-author" action="/authors/form.php" method="POST">
                                <input type="hidden" name="action" value="store"/>
                                <div class="form-group">
                                    <label class="control-label">Nombre</label>
                                    <input type="text" class="form-control" name="first_name" autofocus/>
                                    <span class="invalid-feedback" role="alert"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Apellidos</label>
                                    <input type="text" class="form-control" name="last_name"/>
                                    <span class="invalid-feedback" role="alert"></span>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button id="btn-save" type="button" class="btn btn-primary">Guardar</button>
                            <a href="/authors/index.php" class="btn btn-secondary">Volver al listado</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="/assets/js/app.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#btn-save').click(function(e) {
                    e.preventDefault();
                    save($('#form-author'), function() {
                        window.location.href = '/authors/index.php';
                    });
                });
            });
        </script>
    </body>
</html>