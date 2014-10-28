<{include file="$smarty_root/header.tpl" }>

<!-- Start page head -->
		<section class="page-head contain-head">
			<div class="container">
			
				<div class="row">
					<div class="span9 head-text">
						<h3 style='font-size:40px;'><{$info.name}></h3>
						<p style='font-size:24px;'>
						<{$info.summary}>
						</p>
					</div>
					<div class="span3">
						<img src='<{$rootpath}>/upload/product/<{$info.logo}>' />
					</div>
				</div>
			</div>			
		</section>
		<!-- End page head -->
		<section class="page-contain">
			<div class="container">
				<{$info.content}>
			</div>
		</section>

<{include file="$smarty_root/footer.tpl" }>
