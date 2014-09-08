
		<!-- Start navigation -->
		<section class="nav-container">	
			<div class="navbar-inner">
				<div class="container">
					<div class="row">
						<div class="span12">			
							<a href="<{$rootpath}>/index.php" class="small-logo"><img src="<{$rootpath}>/themes/lm/images/h_logo.png" alt="" /></a>		
							<nav> 
								<ul>
									<li class="dropdown">
									<a  href="#" class="dropdown-toggle <{if $module=='aboutus'}>active<{/if}>" data-toggle="dropdown" >关于我们 <b class="caret"></b></a>		
										<ul class="dropdown-menu">
											<li><a href="<{$rootpath}>/aboutus/index.php">公司简介</a></li>
											<li><a href="<{$rootpath}>/aboutus/contactus.php">联系我们</a></li>	
											<li><a href="<{$rootpath}>/aboutus/joinus.php">加入我们</a></li>										
										</ul>						
									</li>				
									<li class="dropdown">
									<a  href="#" class="dropdown-toggle <{if $module=='product'}>active<{/if}>" data-toggle="dropdown" >产品 <b class="caret"></b></a>		
										<ul class="dropdown-menu">
											<li><a href="#">Palacos 骨水泥</a></li>
											<li><a href="#">Osteopal V 脊柱骨水泥</a></li>	
											<li><a href="#">PALAMIX 骨水泥真空混合系统</a></li>		
											<li><a href="#">MAST手术保护膜膜</a></li>							
										</ul>						
									</li>				
									<li><a href="<{$rootpath}>/download/index.php" <{if $module=='download'}>class='active'<{/if}>>下载</a></li>	
									<li><a href="<{$rootpath}>/news/index.php" <{if $module=='news'}>class='active'<{/if}>>新闻中心</a></li>	
									<li><a href="#" <{if $module=='partner'}>class='active'<{/if}>>合作伙伴</a></li>	
									<li><a href="#" >进入论坛</a></li>		
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End navigation -->