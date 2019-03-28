


<script type="text/javascript">
    $(document).ready(function() {
        $(".confirma").click(function() {
            $("#myModal").modal('show');
        });
    });
</script>
<script type="text/javascript">
  
    function confirma(id) {
        document.getElementById('id').value = id;
        $("#myModal").modal('show');
    }
    function deleta() {
        window.location.href = '<?= site_url('contato/apagar') ?>' + '/' + document.getElementById('id').value;

    }



</script>
<script type="text/javascript">
    $(function() {
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false
        });
    });
</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ouvidoria
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= site_url() ?>usuario">Ouvidoria</a></li>
            <li class="active">lista</li>
        </ol>
    </section>

    <!-- Main content -->

    <div class="box-body">
        <div class="box">
            
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 20px;">Id</th>
                            
                            <th>Nome</th>
                            <th>Email</th>
							<th>Assunto</th>
                       <th >Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) { ?>
                            <tr>
                            
                               


                                <td><?php echo $row->id ?></td>
                                <td><?php echo $row->nome ?></td>
                                <td><?php  echo $row->email ?></td>
								<td><?php  echo $row->assunto ?></td>
                                

                                <td align='center' style="width: 300px; ">
								<button onclick="window.location.href = '<?= site_url('contato/veremails') ?>/<?php echo $row->id ?>'" class="btn btn-secondary btn-flat">ver</button>
								
								<?php if($row->status == 0){ ?>
									<button onclick="window.location.href = '<?= site_url('contato/alterarstatus') ?>/<?php echo $row->id ?>'" class="btn btn-warning btn-flat">Não lido</button>
								<?php } else { ?>
									<button onclick="window.location.href = '<?= site_url('contato/alterarstatus') ?>/<?php echo $row->id ?>'" class="btn btn-primary btn-flat">Lido</button>
								<?php } ?>
								<button onclick="confirma(<?php echo $row->id ?>);" class="btn confirma  btn-danger btn-flat" >Apagar</button>
								
								</td>

                            </tr><?php } ?>                       


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
                        <p>Deseja mesmo apagar este email?<input type="hidden" id="id" value=""></p>
                        <p class="text-warning"><small>Após esta operação todos os dados serão apagados referente a esta operação.</small></p>
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


