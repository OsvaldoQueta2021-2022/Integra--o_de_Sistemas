<?php echo $this->extend('Admin/layout/principal') ?>


<?php echo $this->section('titulo') ?> <?php echo $titulo; ?> <?php echo $this->endSection() ?>


<?php echo $this->section('estilos') ?>

<!--Aqui enviamos para o template principal os estilos-->

<link rel="stylesheet" href="<?php echo site_url('admin/vendors/auto-complete/jquery-ui.css'); ?>">

<?php echo $this->endSection() ?>


<?php echo $this->section('conteudo') ?>

<!--TABELA-->
<div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo $titulo; ?>></h4>


                <div class="ui-widget">
                    <input id="query" name="query" placeholder="Pesquise por um usuário"
                           class="form-control bg-light md-5">
                </div>


                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Nif</th>
                            <th>Ativo</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($usuarios as $usuario): ?>

                            <tr>
                                <td>

                                    <a href="<?php echo site_url("admin/usuarios/show/$usuario->id");?>"><?php echo $usuario->nome; ?></a>

                                </td>
                                <td><?php echo $usuario->email; ?></td>
                                <td><?php echo $usuario->nif; ?></td>

                                <td><?php echo($usuario->ativo ? '<label class="badge badge-primary">Sim</label>' : '<label class="badge badge-danger">Não</label>'); ?></td>

                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection() ?>


<?php echo $this->section('scripts') ?>

<!--Aqui enviamos para o template principal os scripts-->

<script src="<?php echo site_url('admin/vendors/auto-complete/jquery-ui.js'); ?>"></script>

<script>

    $(function () {

        $("#query").autocomplete({
            source: function (request, response) {

                $.ajax({

                    url: "<?php echo site_url('admin/usuarios/procurar'); ?>",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function (data) {

                        if (data.length < 1) {

                            var data = [
                                {
                                    label: 'Usuário não encotrado',
                                    value: -1
                                }
                            ];
                        }
                        response(data); //Aqui tem o valor no data
                    },

                }); //Fim ajax
            },
            minLength: 1,
            select: function (event, ui) {
                if (ui.item.value == -1) {

                    $(this).val("");
                    return false;

                } else {

                    window.location.href = '<?php echo site_url('admin/usuarios/show/');?>' + ui.item.id;
                }

            }
        }); //Fim autocomplete

    });

</script>

<?php echo $this->endSection() ?>
