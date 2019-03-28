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

<script type="text/javascript">
    function validaSenha(input) {
        if (input.value != document.getElementById('txtSenha').value) {
            input.setCustomValidity('Senha não confere,preencha corretamente');
        } else {
            input.setCustomValidity('');
        }
    }
</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Usuários
            <small>cadastro de Usuário</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('usuario') ?>">Usuários</a></li>
            <li class="active">Cadastro</li>
        </ol>
    </section>



    <!-- Main content -->
   
    <section class="content col-md-12">

        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
        <!-- Default bo<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>x -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Extrato</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->

            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 20px;">Usuário</th>

                            <th>Ação</th>
                            <th>Data/Hora</th>
                             <th>entidade</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($log as $row) { ?>
                            <tr>



                                <td> <?php echo $row->usuario ?> </td>
                                <td> <?php echo $row->acao ?> </td>
                              
                                <td><?php echo $row->hora ?> | <?php echo date("d/m/Y", strtotime($row->data))  ?></td>
                                <td><?php 
                                
                                $this->db->where('id',$row->entidade);
                                $query=$this->db->get('entidade');
                                $query = $query->result();
                                $nomeent = $query[0]->nome;
                                
                                
                                
                                
                                echo $nomeent ?> </td>



                            </tr>
                        <?php }?>
                            


                    </tbody>

                </table>
            </div><!-- /.box-body -->
            <div class="box-footer">

            </div><!-- /.box-footer-->
        </div><!-- /.box -->

    </section><!-- /.content -->

</div><!-- /.content-wrapper -->


<!-- InputMask -->

<script type="text/javascript">
                            $(function () {
                                //Initialize Select2 Elements
                                $(".select2").select2();

                                //Datemask dd/mm/yyyy

                                //iCheck for checkbox and radio inputs

                            });
</script>