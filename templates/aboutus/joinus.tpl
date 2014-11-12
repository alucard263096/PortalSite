﻿<{include file="$smarty_root/header.tpl" }>


	<!-- Start page head -->
		<section class="page-head contain-head">
			<div class="container">
				<div class="row">
					<div class="span9 head-text">
						<h3><i class="icon-plus-sign-alt"></i>雷德睦华诚邀您的加盟！</h3>
						<p>
						公司拥有稳定成熟的产品销售市场，经营的产品为同领域中的优秀产品，公司负责德国骨水泥产品在大陆地区的渠道销售管理及市场技术支持服务。
						</p>
					</div>
					<div class="span3">
						<i class="icon icon-plus-sign-alt"></i>
					</div>
				</div>
			</div>			
		</section>
		<!-- End page head -->


<!-- Start contain -->
		<section class="page-contain">
			<div class="container">
				<div class="row">
						<div class="span12">
						<!--加盟申请-->
						<div class="application col2-set pt25 overh bg-t">
						  <div class="col-1 table">
						  	<p class="tip">请您准确填写下列加盟信息，以便我们能及时与您联系，达成合作！</p>
						  	<div class='span7'>
						    <div class="form">
						    <div class="contact-form-wrapper">
								<div class="contact-form">
									<h4>申请表格</h4>
									<form id="contactform" action="joinus.action.php" method="post" class="validateform" name="leaveContact">	
									<div id="sendmessage">你</div>
										<ul class="listForm">
											<li>
												<label>姓名:<span>&#40; 必填 &#41;</span></label>
												<input class="input-block-level contact-input" type="text" name="name" data-rule="maxlen:2" data-msg="至少输入两位字符" />									
												<div class="validation"></div>
											</li>
											<li>
												<label>职务<span>&#40; 必填 &#41;</span></label>
												<input class="input-block-level contact-input" type="text" name="email" data-rule="maxlen:2" data-msg="至少输入两位字符" />										
												<div class="validation"></div>
											</li>
											<li>
												<label>E-mail<span>&#40; 必填 &#41;</span></label>
												<input class="input-block-level contact-input" type="text" name="email" data-rule="email" data-msg="请输入有效的邮件地址" />										
												<div class="validation"></div>
											</li>
											<li>
												<label>手机<span>&#40; 必填 &#41;</span></label>
												<input class="input-block-level contact-input" type="text" name="email" data-rule="maxlen:2" data-msg="请输入有效的邮件地址" />										
												<div class="validation"></div>
											</li>
											<li>
												<label>职务<span>&#40; 必填 &#41;</span></label>
												<input class="input-block-level contact-input" type="text" name="email" data-rule="email" data-msg="请输入有效的邮件地址" />										
												<div class="validation"></div>
											</li>
											<li>
												<label>Your message<span>&#40; Required &#41;</span></label>
												<textarea class="input-block-level contact-input" rows="9" name="message" data-rule="required" data-msg="Please write something for us"></textarea>												
												<div class="validation"></div>
											</li>
											<li>
												<input type="submit" value="Send message" class="btn btn-large btn-primary" name="Submit" />
											</li>
										</ul>
									</form>
								</div>
							</div>
						  	<form id="applicationForm">
						      <dl>
						        <dt class="str">您的个人信息:</dt>
						        <dd></dd>
						      </dl>
						      <dl>
						        <dt>姓名:</dt>
						        <dd>
							        <input name="name" id="name" value='<{$name}>' type="text">
							        <big>请输入您的真实姓名</big>
						        </dd>
						      </dl>
						      <dl>
						        <dt>职务:</dt>
						        <dd><input name="position"    type="text"></dd>
						      </dl>
						      <dl>
						        <dt>E-mail:</dt>
						        <dd>
							        <input name="email"  id="email"   type="text">
							        <big>请输入您的邮箱地址</big>
						        </dd>
						      </dl>
						      <dl>
						        <dt>手机:</dt>
						        <dd>
							        <input name="phone"  id="phone"  value='<{$phone}>'  type="text">
							        <big>请输入您的联系方式</big>
						        </dd>
						      </dl>
						      <dl>
						        <dt>QQ:</dt>
						        <dd>
							        <input name="phone"  id="phone"   type="text">
							        <big>请输入您的QQ号码</big>
						        </dd>
						      </dl>
						      <dl>
						        <dt class="str">您的公司信息:</dt>
						        <dd></dd>
						      </dl>
						      <dl>
						        <dt>公司名称:</dt>
						        <dd>
							        <input name="companyName"  id="companyName"  value='<{$company_name}>'  type="text">
							        <big>请输入你所在的企业名称</big>
						        </dd>
						      </dl>
						      <dl>
						        <dt>公司所在地:</dt>
						        <dd><input name="companyLocation"   type="text"></dd>
						      </dl>
						      <dl>
						        <dt>公司电话:</dt>
						        <dd><input name="companyTelephone"    type="text"></dd>
						      </dl>
						      <dl>
						        <dt>公司网址:</dt>
						        <dd><input name="companyWebsite"    type="text"></dd>
						      </dl>
						      <dl>
						        <dt>公司地址:</dt>
						        <dd><input name="companyAddress"    value='<{$company_address}>'  type="text"></dd>
						      </dl>
						      <dl>
						        <dt class="str">您的加盟信息:</dt>
						        <dd></dd>
						      </dl>
						      <dl>
						        <dt>您是否已初步了解<br>合作方式?</dt>
						        <dd>
							        <input name="understandPartner" type="radio" checked="" value="是"><span>是</span>
							        <input name="understandPartner" type="radio" value="否"><span>否</span>
						        </dd>
						      </dl>
						      <dl>
						        <dt>您初步决定加盟的渠道合作伙伴<br>类型是</dt>
						        <dd><input name="partnerType"    type="text"></dd>
						      </dl>
						      <dl>
						        <dt>我的留言</dt>
						        <dd><input name="wantKnow"   value='<{$remarks}>'   type="text"></dd>
						      </dl>
						      <dl>
						        <dt>您希望进一步了解的信息是</dt>
						        <dd><input name="wantKnow"    type="text"></dd>
						      </dl>
						      </form>
						    </div>
						        	<a class="btn btn-primary" href="#">提交</a>
						        	<a class="btn btn-primary" href="#">重置</a>
						   	</div>
						  </div>
						  	<div class='span3'>
							  <div class="col-2 thanksword">
							   <span>感谢您选择加盟雷德睦华！除在线申请外您还可以通过如下方式联系我们或了解相关信息：</span>
							    <p><a href="<{$rootpath}>/aboutus/contactus.php" target="_blank">联系当地机构 &gt;</a></p>
							    <p><a href="<{$rootpath}>/aboutus/contactus.php">微信关注我们 &gt;</a></p>
							    <p><a href="<{$rootpath}>/index.php" target="_blank">在线了解产品 &gt;</a></p>
							  </div>
						   </div>
						</div>
						<!--加盟申请 结束--> 
						
						
						</div>
				</div>
			</div>
		</section>





<{include file="$smarty_root/footer.tpl" }>
