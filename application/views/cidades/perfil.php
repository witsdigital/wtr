
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<style>
    .icones{
        margin-right: 20px;    }
    </style>

    <?php $entidade = $this->uri->segment(2); ?>
    <script>
        function enviardados() {

            if (document.getElementById('edicao').value != "") {
                var edicao = document.getElementById('edicao').value;
                document.location.href = "<?= base_url('camaras/' . $entidade) ?>/getbusca/edicao/" + edicao;
            }
            if (document.getElementById('titulo').value != "") {
                var titulo = document.getElementById('titulo').value;
                document.location.href = "<?= base_url('camaras/' . $entidade) ?>/buscatitulo/" + titulo;
            }
            if (document.getElementById('chave').value != "") {
                var chave = document.getElementById('chave').value;
                document.location.href = "<?= base_url('camaras/' . $entidade) ?>/busca/" + chave;
            }



        }
        function confirma() {
            alert('');
        }
    </script>


    <div style="background-color:  #FFFFFF;">
    <br><br><br><div class="master-container">

        <br>
        <br>


        <div class="master-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-6">
                            <img width="848" height="480" src="<?= base_url() . 'uploads/funcionarios/7/' . $data[0]->img ?>" />

                        </div>

                        <div class="col-md-6">
                            <div class="meta-data">

                                <h1 class="hentry__title"> <?php echo $data[0]->nome ?> </h1>
                                <h3 class="sidebar__headings"><?php echo $data[0]->cargo ?></h3>

                            </div>

                            <div class="hentry__content">
                                <h4 class="sidebar__headings">Biografia</h4>
                                <p style="text-align: justify;">
                                    <?php echo $data[0]->biografia ?></p>

                            </div>

                            <div class="hentry__content">
                                <h4 class="sidebar__headings"></h4>
                                <p style="text-align: justify;">
                                    <i class="fa  icones fa-envelope fa-1x"></i>
                                    <?php echo $data[0]->email ?></p>
                            </div>
                            <div class="hentry__content">
                                <h4 class="sidebar__headings"></h4>
                                <p style="text-align: justify;">
                                    <i class="fa icones  fa-phone fa-1x"></i>
                                    <?php echo $data[0]->telefone ?></p>
                            </div>
                            <div class="hentry__content">
                                <h4 class="sidebar__headings"></h4>
                                <p style="text-align: justify;">
                                    <i class="fa icones  fa-address-card fa-1x"></i>
                                    <?php echo $data[0]->partido ?></p>
                            </div>


                            <div class="hentry__content">
                                <h4 class="sidebar__headings"></h4>
                                <a href="<?php echo $data[0]->urlsite ?>" class="read-more read-more--page-box">perfil oficial</a>
                            </div>





                        </div>





                    </div>
                    <div class="col-md-12">



                    </div>



                </div>
            </div><!-- /container -->
        </div>

    </div><!-- 
                                        
                                        dsds
                                                    </div><!-- /container -->
</div>

<?php

function tirarAcentos($string) {
    return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(Ç|ç)/"), explode(" ", "a A e E i I o O u U n N c"), $string);
}
?>



