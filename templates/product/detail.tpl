<table class="product_detail" width="100%" >
	<tr>
		<td width="200px"></td>
		<td width="10px"></td>
		<td width="590px"></td>
	</tr>
	<tr height="30px;">
		<td colspan="3" class="product_detail_title"><{$info.name}></td>
	</tr>
	<tr>
		<td>
			<img alt="" src="<{$rootpath}>/themes/site_themes/LandMover/images/<{$info.image}>" />
		</td>
		<td>
		</td>
		<td>
			<table >
				<tr height="15px">
					<td width="100px"></td>
					<td width="490px"></td>
				</tr>
				<tr>
					<td colspan="2" class="product_detail_desc"><{$info.desc}></td>
				</tr>
				<tr>
					<td colspan="2">
					<hr />
					</td>
				</tr>
				<tr>
					<td>抗生素：</td>
					<td><{$info.kangshengsu}></td>
				</tr>
				<tr>
					<td>粘度：</td>
					<td><{$info.niandu}></td>
				</tr>
				<tr>
					<td>不透射线性：</td>
					<td><{$info.butoushexianxing}></td>
				</tr>
				<tr>
					<td>适应性：</td>
					<td><{$info.shiyingxing}></td>
				</tr>
				<tr>
					<td>操作建议：</td>
					<td><{$info.caozuojianyi}></td>
				</tr>
				<tr>
					<td>尺寸包装：</td>
					<td><{$info.chichunbaozhuang}></td>
				</tr>
				<tr>
					<td colspan="2">
					<hr />
					</td>
				</tr>
				<tr>
					<td colspan="2">
					<a href="<{$rootpath}>/download.php?filename=<{$info.PDF}>">点击下载<b>使用说明书</b> <img width="13px" src="<{$rootpath}>/images/download.png" /></a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<hr />
		</td>
	</tr>
	<tr hegith="10px">
		<td>
		</td>
	</tr>
	
	<tr>
		<td colspan="3">
		<div style="width:100%">
			<p><span style="color:#f5f5f5;font-size:30px;">以下内容由后台自由编辑</span></p>
			<!-- 
			<{if $info.id == 1 or $info.id == 2 }>
			
			<p><span style="color:#ACC353;font-size:20px;">初次关节置换术 - 已证实、质量稳定的骨水泥</span></p>
			<img alt="" src="<{$rootpath}>/themes/site_themes/LandMover/images/r_banner.jpg" />
			<p>贺利氏在PMMA骨水泥制造和发展居领导地位已50年。</p>
			<p>用于初次关节置换术的PALACOS®骨水泥通过它的高品质和卓越的性能赢得了骨科医生和外科医生的支持。</p>
			<p>依据不同的适应症，医生可以选择不同粘度、操作和施用特性来选择不同的Palacos骨水泥。</p>
			<p>Palacos骨水泥包括含抗生素和不含抗生素骨水泥。</p>
			<{elseif $info.id == 3 or $info.id == 4}>
			
			<p><span style="color:#ACC353;font-size:20px;">PALACOS®MV/MV+G – 中粘度骨水泥</span></p>
			<img alt="" src="<{$rootpath}>/themes/site_themes/LandMover/images/m_banner.jpg" />
			<p>使用PALACOS® R相同材质</p>
			<p>最佳操作特性经由在真空混合系统搅拌骨水泥且无需预冷</p>
			<p>较短的等待阶段 – 因此操作更快速</p>
			<p>添加庆大霉素预防感染</p>
			<{elseif $info.id == 5 or $info.id == 6}>
			
			<p><span style="color:#ACC353;font-size:20px;">PALACOS®LV/LV+G – 低粘度骨水泥</span></p>
			<img alt="" src="<{$rootpath}>/themes/site_themes/LandMover/images/l_banner.jpg" />
			<p>使用PALACOS® R相同材质</p>
			<p>适用于小及中关节手术</p>
			<p>低粘度性容许通过细小的套管精确使用</p>
			<p>添加庆大霉素预防感染</p>
			
			<{/if}>-->
		</div>
		</td>
	</tr> 
</table>