


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
        window.location.href = '<?= site_url('diario/apagar') ?>' + '/' + document.getElementById('id').value;

    }



</script>
<script type="text/javascript">
    $(function() {
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
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
        SIC
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= site_url() ?>usuario">sic</a></li>
            <li class="active"></li>
        </ol>
    </section>

    <!-- Main content -->

    <div class="box-body">
        <div class="box">
            <div class="box-header">
                <!--                  <h3 class="box-title">Data Table With Full Features</h3>-->
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 20px;">Id</th>
                     
                            <th>Assunto</th>
							<th>Descrição</th>
						
		
                       <th >Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) { ?>
                            <tr>
                            
                                <td><?php echo $row->id_sic ?></td>
                                <td><?php echo $row->assunto ?></td>
                                <td><?php  echo $row->descricao ?></td>
                                <td align='center' style="width: 240px; ">								<button onclick="window.location.href = '<?= site_url('sic/view_publicacao') ?>/<?php echo $row->id_sic ?>'" class="btn btn-primary btn-flat">ver</button>								<?php if($row->status==2){ ?>									<button onclick="window.location.href = '<?= site_url('sic/alterarstatus') ?>/<?php echo $row->id_sic.'/1' ?>'" class="btn btn-secondary btn-flat">Respondido</button>									<?php } if($row->status==1){ ?>									<button onclick="window.location.href = '<?= site_url('sic/alterarstatus') ?>/<?php echo $row->id_sic.'/2' ?>'" class="btn btn-danger btn-flat">Não respondido</button>									<?php } ?>								</td>

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
                        <p>Deseja mesmo apagar esta notícia?<input type="hidden" id="id" value=""></p>
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


