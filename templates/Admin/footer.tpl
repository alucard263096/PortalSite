			
			
			
			</td>
		</tr>
	</table>
			
<script>
$(document).ready(function(){

	if($.trim("<{$sysErrorMsg}>")!="")
	{
		MsgError("<{$sysErrorMsg}>");
	}
	
	if($.trim("<{$sysInfoMsg}>")!="")
	{
		MsgInfo("<{$sysInfoMsg}>");
	}
	if($.trim("<{$sysWarningMsg}>")!="")
	{
		MsgWarning("<{$sysWarningMsg}>");
	}
});

</script>
			
		

<div style='display:none;'>
<div id="dialog-message-info" title="消息" >
	<p>
		
	</p>
</div>
<div id="dialog-message-error" title="错误">
	<p>
		
	</p>
</div>
<div id="dialog-message-warning" title="警告">
	<p>
		
	</p>
</div>
</div>
</body>
</html>