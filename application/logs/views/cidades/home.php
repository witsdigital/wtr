
	   <?php $entidade = 'condeuba';?>
	<div class="jumbotron  jumbotron--with-captions">
		<div class="carousel  slide  js-jumbotron-slider" id="headerCarousel" data-interval="5000">
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="<?=  base_url()?>assets/images/demo/slider/slider_04.jpg"	alt="The Best Construction HTML Theme" />
					<div class="container">
						<div class="carousel-content">
							<div class="jumbotron__category">
								<h6>EDUCAÇÃO</h6>
							</div>
							<div class="jumbotron__title">
								<h1>Governo distribui vacinas </h1>
							</div>
							<div class="jumbotron__content">
								<p>O Governo investe mais de 30 milhoes em vacinas por todo o brasil</p>
								<a class="btn  btn-primary" href="#" target="_blank">Saiba Mais</a>
							</div>
						</div>
					</div>
				</div>
				
				
				
				
			</div>
			<!-- Controls -->
			<a class="left carousel-control" href="#headerCarousel" role="button" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			</a>
			<a class="right carousel-control" href="#headerCarousel" role="button" data-slide="next">
				<i class="fa fa-angle-right"></i>
			</a>
		</div>
	</div>
	<div  style="background-color:#ffffff" class="master-container">
		<div class="promo">
			<div class="container" >
				<div class="row">
					<div class="col-md-12">
						<div class="siteorigin-panels-stretch panel-row-style" style="background-color:#eeeeee">
							<div class="panel-grid-cell">
								<div class="panel widget widget_pt_banner panel-first-child panel-last-child">	
									<div class="banner__text">
										Utilidade Pública, fique informado sobre as principais notícias e eventos da cidade.
									</div>
									<div class="banner__buttons">
										<!--<a class="btn btn-primary" href="contact-us.html" target="_self">GET A QUOTE</a>&nbsp;
										<a class="btn  btn-default" href="projects.html" target="_self">CHECK OUR PROJECTS</a>	-->
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div   class="spacer"></div>
                <div class="container"   role="main">
                    <div class="row"><?php 
                        
                        $queryent = $this->db->get_where('entidade',array('nome'=>$entidade));
                       $queryent = $queryent->result();
                       
                       $ident = $queryent[0]->id;
                       
                       $this->db->order_by("id", "desc");   
                      $querynot = $this->db->get_where('noticias',array('entidade'=>$ident,'destaque'=>1),2);
                     
                        $totaln  = $querynot->num_rows();
                        if($totaln == 0){
                            echo '<div align="center"><h2><span  style="color:  #eeeeee;">Sem notícias cadastradas</span></h2></div>';
                        }
                      $querynot = $querynot->result();
                       foreach($querynot as $rownot){
                           
                      
                        
                        ?>
				<div class="col-md-4">
					<div class="panel widget widget_pt_featured_page panel-first-child panel-last-child" id="panel-7-1-0-0">
						<div class="has-post-thumbnail page-box page-box--block">
							<a class="page-box__picture" href="#">
								<img width="200" height="200" src="<?=  base_url()?>uploads/noticias/<?php echo $ident?>/<?php echo $rownot->img?>" alt="Content Image"/>
							</a>
							<div class="page-box__content">
								<h5 class="page-box__title  text-uppercase">
                                                                    <a href="<?=  base_url('camaras/'.$entidade)?>/noticia/<?php echo $rownot->id?>"><?php echo $rownot->titulo?></span></a>
								</h5>
								<?php echo  substr($rownot->conteudo, 0,100) ?>	...
                                                                   </span><p>
									<a href="<?=  base_url('camaras/'.$entidade)?>/noticia/<?php echo $rownot->id?>" class="read-more read-more--page-box">Saiba Mais</a>
								</p>
							</div>
							
						</div>
					</div>
				</div>
				<?php  }?>
                          
				<div class="col-md-4">
                                      <?php 
                     
                      
                       
                        $this->db->order_by("id", "desc");    
                      $querynot2 = $this->db->get_where('noticias',array('entidade'=>$ident),4);
                        $querynot2 = $querynot2->result();
                       foreach($querynot2 as $rownot2){
                           
                      
                        
                        ?>
					<div class="panel widget widget_pt_featured_page panel-first-child" id="panel-7-1-2-0">
						<div class="has-post-thumbnail page-box page-box--inline">
							<a class="page-box__picture" href="#">
                                                            <img style="width: 100px;" src="<?=  base_url()?>uploads/noticias/<?php echo $ident?>/<?php echo $rownot2->img?> "alt="Content Image"/>
							</a>
							<div class="page-box__content">
								<h5 class="page-box__title text-uppercase">
                                                                    <a href="<?=  base_url('camaras/'.$entidade)?>/noticia/<?php echo $rownot2->id?>"><?php echo $rownot2->titulo?> </span></a>
								</h5>
                                                          <?php echo  substr($rownot2->conteudo, 0,100);?>... </span>	
							</div>
						</div>
						<div class="spacer"></div>
					</div>
                                      <?php  }?>
					
					
				</div>
                          
			</div>
		</div>
		
		
		
		
		<div class="panel-grid" id="pg-7-5">
			<div class="promobg">
				<div class="container">
					<div class="panel widget row">	
						<div class="col-md-12">
							<div class="motivational-text">
								" Não se mede o valor de um homem pelas suas roupas ou pelos bens que possui, o verdadeiro valor do homem é o seu caráter, suas idéias e a nobreza dos seus ideais." - Charles Chaplin</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="spacer-big"></div>
                <div class="panel-grid">
			<div class="panel-grid-cell">
				<div class="panel container">
					<h3 class="widget-title">Vereadores</h3>	
					<div class="textwidget">
						<div class="logo-panel">
							<div class="row">
							<?php  foreach ($vereadores as $row) { ?>
								<div class="col-sm-3 col-sm-3">
								<img src="<?=  base_url()?>uploads/funcionarios/<?php if($row->img == ""){ $img = "default.png";}else{$img = $row->img;} echo '7'."/". $img; ?> " alt="Client" width="210" height="210">
								<br> <font color="black"><?php echo $row->nome ?></font> <br>
								<?php echo $row->cargo ?> <br>
								Sala: <?php echo $row->sala ?> <br>
								Email: <?php echo $row->email ?><br>
								<br>
								</div>
								
							<?php } ?>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>

	
</div><!-- end of .boxed-container -->

<script type="text/javascript" src="<?=  base_url()?>assets/js/almond.js"></script>
<script type="text/javascript" src="<?=  base_url()?>assets/js/underscore.js"></script>

<script type="text/javascript" src="<?=  base_url()?>assets/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?=  base_url()?>assets/js/header_carousel.js"></script>
<script type="text/javascript" src="<?=  base_url()?>assets/js/sticky_navbar.js"></script>
<script type="text/javascript" src="<?=  base_url()?>assets/js/simplemap.js"></script>
<script type="text/javascript" src="<?=  base_url()?>assets/js/main.min.js"></script>
<script type="text/javascript" src="<?=  base_url()?>assets/js/main.js"></script>
<script type="text/javascript" src="<?=  base_url()?>assets/js/require.js"></script>

