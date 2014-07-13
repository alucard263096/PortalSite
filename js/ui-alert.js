
function MsgInfo(msg)
{
	$( "#dialog-message-info" ).dialog( "destroy" );
	$( "#dialog-message-info p").text(msg);
	
	$( "#dialog-message-info" ).dialog({
		modal: true,
		buttons: {
			关闭: function() {
				$( this ).dialog( "close" );
			}
		}
	});
	
}
function MsgError(msg)
{
	$( "#dialog-message-error" ).dialog( "destroy" );
	$( "#dialog-message-error p").text(msg);
	$( "#dialog-message-error" ).dialog({
		modal: true,
		buttons: {
		关闭: function() {
				$( this ).dialog( "close" );
			}
		}
	});
	
}
function MsgWarning(msg)
{
	$( "#dialog-message-warning" ).dialog( "destroy" );
	$( "#dialog-message-warning p").text(msg);
	
	$( "#dialog-message-warning" ).dialog({
		modal: true,
		buttons: {
			关闭: function() {
				$( this ).dialog( "close" );
			}
		}
	});
	
}