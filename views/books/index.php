<html>
    <head>
        <title>Listado de libros</title>
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
                            <h5 class="card-title float-left">Listado de libros</h5>
                            <a href="/books/form.php" class="btn btn-primary float-right">Crear libro</a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Título</th>
                                        <th>Autor</th>
                                        <th>Editorial</th>
                                        <th>Fecha pub.</th>
                                        <th>Idioma</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($books as $book) {
                                        ?>
                                        <tr>
                                            <td><?= $book->title ?></td>
                                            <td><?= $book->_author->first_name . ' ' . $book->_author->last_name ?></td>
                                            <td><?= $book->publisher ?></td>
                                            <td><?= $book->published_date ?></td>
                                            <td><?= $book->language ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>