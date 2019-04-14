<html>
    <head>
        <title>Crear libro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
    </head>
    <body>
        <h1>Crear libro</h1>
        <div>
            <form id="form-book" action="/books/form.php" method="POST">
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
                <div class="form-group">
                    <button id="btn-save" type="button" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
        <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript">
            $(function() {
                var now = new Date();
                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd',
                    endDate: now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + now.getDate()
                });
                $('#btn-save').click(function(e) {
                    e.preventDefault();
                    var data = {};
                    var form = $('#form-book');
                    form.serializeArray().forEach(function(item) {
                        data[item.name] = item.value;
                    });
                    axios.post('/books/form.php', data)
                    .then(function(response) {
                        window.location.href = '/books/index.php';
                    })
                    .catch(function(error) {
                        if (error.response.status === 400) {
                            if (error.response.data.error !== void 0) {
                                for (var key in error.response.data.error.fields) {
                                    if (error.response.data.error.fields.hasOwnProperty(key)) {
                                        //vm.modal.errors[key] = error.response.data.errors[key];
                                        form.find('input[name=' + key + ']')
                                                .addClass('is-invalid')
                                                .parent().find('.invalid-feedback')
                                                .append('<strong>' + error.response.data.error.fields[key][0] + '</strong>');
                                    }
                                }
                                //toastr['error']("Algunos datos del usuario son incorrectos.");
                            }
                        }
                        else {
                            //toastr['error'](error.response.data.message);
                        }
                    });
                });
            });
        </script>
    </body>
</html>