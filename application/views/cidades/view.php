
    <!--TOP-->
    <div class="top_line"></div>
    <div class="panel hidden-phone">
        <div id="map">
        </div>
    </div>
    <!--/TOP-->
    <!--HEADER-->
    <header>
     <div class="container">
            <div class="row hidden-phone">
                
            </div>
            <div class="row">
                <div align"center" class="span4 logo">
                    <a href=""><img src="img/iom.png" alt="logo" width="698" height="115" style="margin-bottom:50px; margin-top:10px;" /></a>
                </div>
              
            </div>
		</div>
	</header>
	<!--/HEADER-->
    <!--WELCOME AREA-->
    <div class="gray_bg">
        <div class="container">
            <div class="row welcome">
                <div class="span12">
                    <h1>CÂMARA municipal de <?php echo $entidade ?> - ba</h1>
               
                </div>
            </div>
        </div>
    </div>
    <!--/WELCOME AREA-->
    <!--SLIDER AREA--><!--/SLIDER AREA-->
    <!--FEATURES AREA-->
    <div class="gray_bg">
      <div class="container">
            <div class="row m25">
               <?php
            foreach ($arquivo as $row){
                $data = $row->data;
                $mes = substr($row->data, 5, -3);
                switch ($mes) {
                    case '01':
                        $dirdata = "janeiro";
                        break;
                    case '02':
                        $dirdata = "fevereiro";
                        break;
                    case '03':
                        $dirdata = "marco";
                        break;
                    case '04':
                        $dirdata = "abril";
                        break;
                    case '05':
                        $dirdata = "maio";
                        break;
                    case '06':
                        $dirdata = "junho";
                        break;
                    case '07':
                        $dirdata = "julho";
                        break;
                    case '08':
                        $dirdata = "agosto";

                        break;
                    case '09':
                        $dirdata = "setembro";
                        break;
                    case '10':
                        $dirdata = "outubro";
                        break;
                    case '11':
                        $dirdata = "novembro";
                        break;
                    case '12':
                        $dirdata = "dezembro";
                        break;
                }
            }
                
            
            ?>

            <iframe name="myiframe" src="uploads/publicadas/<?php echo $dirdata ?>/<?php echo "$arquivo";?>" style="width:1200px; height:700px
            ;"></iframe>
              </div>
              
            </div>
        </div>
    </div>
    <!--FEATURES AREA-->
    <!--MAIN CONTENT AREA-->
    <div class="container portfolio"></div>
    <!--/MAIN CONTENT AREA-->
    <!--TWITTER AREA-->
    
    <!--/TWITTER AREA-->




