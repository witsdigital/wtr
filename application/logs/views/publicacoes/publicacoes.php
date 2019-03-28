<script type="text/javascript">
    $(document).ready(function () {
        $(".confirma").click(function () {



        });
    });
</script>

<script type="text/javascript">
  
    function confirma(id) {
        document.getElementById('id').value = id;
        $("#myModal").modal('show');
    }
    function deleta() {
        window.location.href = '<?= base_url('publicacoes/apagar') ?>' + '/' + document.getElementById('id').value;

    }



</script>
<script type="text/javascript">
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Publicações
            <small>Publicações Cadastradas</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url() ?>publicacoes">Publicações</a></li>
            <li class="active">Cadastradas</li>
        </ol>
    </section>

    <!-- Main content -->

    <div class="box-body">

        <div class="box">
            <div class="box-header">
                <div align="right"><input  onclick="window.location.href = '<?= base_url() ?>publicacoes/cadastro'" type="button" value="Nova Publicação" class="btn btn-success"></button></div>
                <!--                  <h3 class="box-title">Data Table With Full Features</h3>-->
            </div><!-- /.box-header -->
            <div class="box-body">
               <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Titulo</th>
                            <th>Data</th>
                            <th>Tipo</th>
                            <th>Local publicação</th>
                            <th>entidade</th>
                            <th>status</th>
                            <th >Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($publicacoes as $row) {
                            ?>
                            <tr>
                                <?php
                                $local = $row->local;


                                if ($local == "1") {
                                    $local = "Diário do Estado";
                                }
                                if ($local == "2") {
                                    $local = "Diário do Município";
                                }
                                if ($local == "3") {
                                    $local = "Diário da União";
                                }
                                if ($local == "4") {
                                    $local = "Diário Estado" . " | " . "Diário Município";
                                }
                                if ($local == "5") {
                                    $local = "Diário Estado" . " | " . "Diário Município" . " | " . "Diário União";
                                }
                                if ($local == "6") {
                                    $local = "Diário do Município" . " | " . "Diário da União";
                                }
                                if ($local == "7") {
                                    $local = "Diário do Estado" . " | " . "Diário da União";
                                }
                                ?>

                                <td><?php echo $row->id ?></td>
                                <td><?php echo $row->titulo ?></td>
                                <td><?php echo date("d/m/Y", strtotime($row->data)) ?></td>
                                <td><?php echo $row->tipo ?></td>

                                <td><?php echo $local ?></td>
                                <td><?php
                                    $query = $this->db->get_where('entidade', array('id' => $row->entidade));


                                    foreach ($query->result() as $ent) {
                                        echo $ent->tipo . ' de ' . $ent->nome;
                                    }
                                    ?></td>
                                <td align="center"><?php
                                    if ($this->session->userdata('permissao') != 'administrador') {
                                        $look = "disabled";
                                    } else {
                                        $look = "";
                                    }
                                    $status = $row->status;
                                    if ($status == 1) {
                                        $classe = 'success';
                                        $status = "Publicado";
                                    } else {
                                        $classe = 'warning';
                                        $status = "Pendente";
                                    }
                                    ?><input type="hidden" id="idpublica" value="<?php echo $row->status; ?>" ><button disabled="disabled" onclick="window.location.href = '<?= base_url('publicacoes/status') ?>/<?php echo $row->id ?>'" <?php echo $look ?> class="btn btn-sm btn-<?php echo $classe ?>"><?php echo $status ?></button></td>
                                <td align="center" style="width: 20%;"><button onclick="window.location.href = '<?= base_url('publicacoes/view_publicacao') ?>/<?php echo $row->id ?>'" class="btn btn-primary btn-flat">Abrir</button><button onclick="window.location.href = '<?= base_url('publicacoes/alterar') ?>/<?php echo $row->id ?>'" class="btn btn-warning btn-flat">Alterar</button><button onclick="confirma(<?php echo $row->id ?>);" class="btn btn-danger btn-flat" >Apagar</button></td>

                            </tr><?php
                            $i++;
                        }
                        ?>


                    </tbody>

                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.box-body -->
    <div class="box-footer">
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Confirmação de operação</h4>
                    </div>
                    <div class="modal-body">
                        <p>Deseja mesmo apagar esta publicação?<input type="hidden" id="id" value=""></p>
                        <p class="text-warning"><small>Após esta operação todos os dados serão apgados referente a esta publicação.</small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" onclick="deleta();"class="btn btn-primary">Apagar</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.box-footer-->
</div><!-- /.box -->

</section><!-- /.content -->


