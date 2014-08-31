<{include file="$smarty_root/Admin/header.tpl" }>
<style>
.ui-widget-content{
border:0px;
}
</style>
  <div id="tabs">
  <ul>
    <li><a href="#tabs-1">网站基本设置</a></li>
    <li><a href="#tabs-2">其它</a></li>
  </ul>
  <div id="tabs-1">
    <table class="form_table">

				<col width="150px" />

				<col />

				<tr>

					<th>网站名称：</th>

					<td><input type='text' class='normal' id='d_name' pattern='required' alt='商店名称必须填写' value="<{$website_name}>" /></td>

				</tr>

				<tr>

					<th>网页图标：</th>

					<td>

						<div style="height:53px;overflow:hidden;">

							<img src='<{$rootpath}>/fav/<{$favfile}>' onload="if(this.height>50)this.height=50" />

						</div>

						<input type='file' class='normal' name='logo' /><label>直接从本地上传图片覆盖原有的网站图标</label>
						<input type='hidden' class='normal' id='d_fav'  value="<{$favfile}>" /><label>
					</td>

				</tr>

				<tr>

					<th>联系人：</th>

					<td><input type='text' class='normal' id='d_contacter'  value="<{$contacter}>" /></td>

				</tr>

				<tr>

					<th>QQ：</th>

					<td><input type='text' class='normal' pattern='qq' id='d_qq' empty alt='请填写正确的QQ号'  value="<{$qq}>" /></td>

				</tr>

				<tr>

					<th>Email：</th>

					<td><input type='text' class='normal' pattern='email' id='d_email' empty alt='请填写正确的email地址'  value="<{$email}>" /></td>

				</tr>

				<tr>

					<th>手机：</th>

					<td><input type='text' class='normal' pattern='mobi' id='d_mobile' empty alt='请填写正确的手机号码'  value="<{$mobile}>" /></td>

				</tr>

				<tr>

					<th>客服电话：</th>

					<td><input type='text' class='normal' pattern='phone' id='d_phone' empty alt='请填写正确的固定电话'   value="<{$phone}>"/></td>

				</tr>

				<tr>

					<th>具体地址：</th>

					<td><input type='text' class='normal' pattern='required' id='d_address' empty alt='商店名称必须填写'  value="<{$address}>"/></td>

				</tr>


				<tr>

					<th>页面title后缀：</th>

					<td><input type='text' class='normal' pattern='required' id='d_index_seo_title' empty alt='首页title后缀'  value="<{$seo_title}>" /></td>

				</tr>

				<tr>

					<th>页面keywords：</th>

					<td><input type='text' class='normal' pattern='required' id='d_index_seo_keywords' empty alt='首页keywords' value="<{$seo_keywords}>" /></td>

				</tr>

				<tr>

					<th>页面description：</th>

					<td><input type='text' class='normal' pattern='required' id='d_index_seo_description' empty alt='首页description' value="<{$seo_description}>" /></td>

				</tr>

				<tr>

					<th></th>

					<td>

						<button class="submit" type='button'><span>保存基本设置</span></button>

					</td>

				</tr>

			</table>
  </div>
  <div id="tabs-2">
    	暂无
  </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
	$( "#tabs" ).tabs({
	      collapsible: true
	    });
	
});
</script>



<{include file="$smarty_root/Admin/footer.tpl" }>