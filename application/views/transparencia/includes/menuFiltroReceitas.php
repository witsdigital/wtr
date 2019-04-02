<?php
$query = $this->db->query('SELECT DISTINCT credor from 131_despesa_dados')->result();
?>


<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />



<form id="frm" name="frm" action="<?= site_url(); ?>transparencia/filtrarreceita"  enctype="multipart/form-data" method="post">
    <div  class="row" >





        <div class="col-md-12">

            <h4>Filtrar Receita</h4>
        </div>   
        <div class="col-md-12">
            <label for="data">Ano:</label>
            <select class="form-control" name="ano">
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option selected value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
            </select>

        </div>
        <div class="col-md-12">
            <label for="data">Tipo:</label>
            <select class="form-control" name="tipo">
                <option  selected value="0">Todos</option>
                <option value="ORC">Orçamentário</option>
                <option value="NORC">Extra-Orçamentário</option>


            </select>

        </div> 

        <Br>   <Br>
        <div class="col-md-12">
            <Br>  
            <label for="data">Palavra Chave:</label>
            <input type="text" class="form-control" id="nome" name="key" placeholder="">
        </div>
        <div class="col-md-12">
            <label for="exampleInputEmail1">Competência:</label>
            <select  class="form-control"  name="competencia1">
                <option value="1">Janeiro</option>
                <option value="2">Fevereiro</option>
                <option value="3">Março</option>
                <option value="4">Abril</option>
                <option value="5">Maio</option>
                <option value="6">Junho</option>
                <option value="7">Julho</option>
                <option value="8">Agosto</option>
                <option value="9">Setembro</option>
                <option value="10">Outubro</option>
                <option value="11">Novembro</option>
                <option value="12">Dezembro</option>
            </select>
        </div>

    </div>



    <div class="row" style="float: right; margin: 20px;">
        <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
    </div>
</form>


<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>