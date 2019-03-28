


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
    function alterar() {
        window.location.href = '<?= site_url('slides/alterar') ?>' + '/' + document.getElementById('id').value;

    }



</script>
<script type="text/javascript">
    $(function() {
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
            Slides
            <small>Slides Cadastradas</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= site_url() ?>slides">Slides</a></li>
            <li class="active">Cadastradas</li>
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
                            <th></th>
                            <th>Local</th>
                         
                       <th >Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) { ?>
                            <tr>
                            
                                <td><?php echo $row->id ?></td>
                                <td style="width: 120px;"><img src="<?=  base_url()?>uploads/slides/<?php if($row->img == ""){ $img = "default.png";}else{$img = $row->img;} echo $this->session->userdata('entidade')."/". $img; ?> "width="" height="90px"></img></td>
                                <td><?php echo $row->titulo ?></td>
                      
                                

                                <td align='center' style="width: 140px; ">
									
									<button onclick="confirma(<?php echo $row->id ?>);" class="btn confirma  btn-warning btn-flat" >Alterar imagem</button>
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
                        <h4 class="modal-title">Alterar slide</h4>
                    </div>
                    <div class="modal-body">
					<form action="<?= site_url(); ?>slides/salvar"  onsubmit="return validarSenha(this)" enctype="multipart/form-data" method="post">
					<input type="hidden" name="id" id="id"  /> 
                          <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Imagem</label>
                                <input type="file" name="userfile"  />  
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Alterar</button>
                    </div>
					</form>
                </div>
            </div>
        </div>
    </div><!-- /.box-footer-->
</div><!-- /.box -->

</section><!-- /.content -->


