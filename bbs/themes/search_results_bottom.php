<?php
// Note: This file is included from the library/Guagua/Guagua.Control.SearchForm.php class.

echo '</ol>
</div>';
if ($this->DataCount > 0) {
	echo '<div class="ContentInfo Bottom">
		<div class="PageInfo">
			<p>'.$this->PageDetails.'</p>
			'.$this->PageList.'
		</div>
	</div>';
}

echo '<div id="Footer">Copyright &copy; '.date("Y").' <a href="./">'.$this->Context->Configuration['BANNER_TITLE'].'</a> - <a href="http://www.miibeian.gov.cn/" target="_blank">'.$this->Context->Configuration['WEB_ICPBEIAN'].'</a> - <a href="mailto:'.$this->Context->Configuration['SUPPORT_EMAIL'].'">'.$this->Context->GetDefinition('ContactUs').'</a> - Po'.'wered b'.'y <a hr'.'ef="ht'.'tp:/'.'/w'.'ww.w'.'gushuini.c'.'om/" tar'.'get="_bl'.'ank">雷德睦华 '.APPLICATION_VERSION.'</a> - <a id="TopOfPage" href="'.GetRequestUri().'#pgtop">TOP</a>↑</div>';

?>