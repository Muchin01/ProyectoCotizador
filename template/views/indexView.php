<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizacion</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header>


        <div class="bg-dark collapse" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-white">Add some information about the album below, the author, or any other
                            background context. Make it a few sentences long so folks can pick up some informative
                            tidbits. Then, link them off to some social networking sites or contact information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Follow on Twitter</a></li>
                            <li><a href="#" class="text-white">Like on Facebook</a></li>
                            <li><a href="#" class="text-white">Email me</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar  navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">

                    <strong>APP_COTIZACION</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>


    <div class="container-fluid nvar">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-header">
                        Informacion del cliente
                    </div>
                    <div class="card-body">
                        <form class="row g-3 needs-validation" novalidate>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="validationCustom01" name="nombre" value=""
                                    placeholder="nombre" required>
                                <!-- <div class="valid-feedback">
                                   
                                </div> -->
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">Empresa</label>
                                <input type="text" class="form-control" id="validationCustom02" value="" required>
                                <!-- <div class="valid-feedback">
                                   
                                </div> -->
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">Gmail</label>
                                <input type="gmail" class="form-control" id="validationCustom02" value="" required>

                            </div>
                        </form>
                    </div>
                </div>

                <br>

                <div class="card">
                    <div class="card-header">
                        Agregar nuevo concepto
                    </div>
                    <div class="card-body">
                        <form class="row g-3 needs-validation" novalidate>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Concepto</label>
                                <input type="text" class="form-control" id="validationCustom01" name="nombre" value=""
                                    placeholder="nombre" required>
                                <!-- <div class="valid-feedback">
                                   
                                </div> -->
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">Tipo Producto</label>
                                <select class="form-select">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom02" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="validationCustom02" value="" required>
                                <!-- <div class="valid-feedback">
                                   
                                </div> -->
                            </div>
                            <div class="col-md-2">
                                <label for="validationCustomUsername" class="form-label">Precio Unitario</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">$</span>
                                    <input type="text" class="form-control" id="validationCustomUsername"
                                        aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-left">
                                <button type="button" class="btn btn-success btn-sm">Agregar</button>
                                <button type="button" class="btn btn-danger btn-sm">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header">
                        Resumen
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
    <table class="table table-hover table-striped table-bordered">
      <thead>
        <tr>
          <th></th>
          <th>Concepto</th>
          <th>Precio</th>
          <th class="text-center">Cantidad</th>
          <th class="text-right">Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($d->items as $item): ?>
          <tr>
            <td>
              <div class="btn-group">
                <button class="btn btn-sm btn-success edit_concept" data-id="<?php echo $item->id; ?>">Editar</button>
                <button class="btn btn-sm btn-danger delete_concept" data-id="<?php echo $item->id; ?>">Borrar</button>
              </div>
            </td>
            <td>
              <?php echo $item->concept; ?>
              <small class="text-muted d-block">
                <img src="<?php echo IMG.($item->type === 'producto' ? 'product.png' : 'service.png'); ?>" alt="<?php echo $item->concept; ?>" style="width: 15px;">
                <?php echo $item->type === 'producto' ? 'Producto' : 'Servicio'; ?>
              </small>
            </td>
            <td><?php echo '$'.number_format($item->price, 2); ?></td>
            <td class="text-center"><?php echo $item->quantity; ?></td>
            <td class="text-right"><?php echo '$'.number_format($item->total, 2); ?></td>
          </tr>
        <?php endforeach; ?>
        <tr>
          <td class="text-right" colspan="4">Subtotal</td>
          <td class="text-right"><?php echo '$'.number_format($d->subtotal, 2); ?></td>
        </tr>
        <tr>
          <td class="text-right" colspan="4">Impuestos</td>
          <td class="text-right"><?php echo '$'.number_format($d->taxes, 2); ?></td>
        </tr>
        <tr>
          <td class="text-right" colspan="4">Envío</td>
          <td class="text-right"><?php echo '$'.number_format($d->shipping, 2); ?></td>
        </tr>
        <tr>
          <td class="text-right" colspan="5">
            <b>Total</b><h3 class="text-success"><b><?php echo '$'.number_format($d->total, 2); ?></b></h3>
            <small class="text-muted"><?php echo sprintf('Impuestos incluidos %s%% IVA', TAXES_RATE); ?></small>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <!-- FOOTER APP -->

    <footer class="text-white bg-dark  py-5 ">
        <div class="container">
            <p class="float-end mb-1 ">
                <a href="#" class="text-white">Back to top</a>
            </p>
            <p class="mb-0">
                <a href="/docs/5.0/getting-started/introduction/">
                    Cotizacion App </a>&copy. Todos los derechos reservados <?php echo date('Y') ?>
            </p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script> -->
</body>

</html>