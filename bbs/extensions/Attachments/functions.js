function DeleteAttachment(AjaxUrl, AttachmentID)
{
	var AttachmentFileElement = document.getElementById("Attachment_" + AttachmentID);
	if( AttachmentFileElement ) AttachmentFileElement.innerHTML = "Deleting...";

	var Parameters = "AttachmentID="+AttachmentID;
	var dm = new DataManager();
	dm.RequestCompleteEvent = RefreshPageWhenAjaxComplete;
	dm.RequestFailedEvent = HandleFailure;
	dm.LoadData(AjaxUrl+"?Action=RemoveAttachment&"+Parameters);
}


function MultiSelector( list_target, max ){
	this.list_target = list_target;
	this.count = 0;
	this.id = 0;
	if( max ){
		this.max = max;
	} else {
		this.max = -1;
	};

	this.addElement = function( element ){
		if( element.tagName == 'INPUT' && element.type == 'file' ){
			element.name = 'file_' + this.id++;
			element.multi_selector = this;
			element.onchange = function(){
				var new_element = document.createElement( 'input' );
				new_element.type = 'file';
				new_element.size = '43';
				
				this.parentNode.insertBefore( new_element, this );
				this.multi_selector.addElement( new_element );
				this.multi_selector.addListRow( this );

				this.style.position = 'absolute';
				this.style.left = '-1000px';

			};
			if( this.max != -1 && this.count >= this.max ){
				element.disabled = true;
			};

			this.count++;
			this.current_element = element;
			
		} else {
			alert( 'Error: not a file input element' );
		};
	};

	this.addListRow = function( element ){
		var new_row = document.createElement( 'tr' );
		var new_col_filename = document.createElement( 'td' );
		var new_col_button = document.createElement( 'td' );
		
		new_col_filename.setAttribute( 'align', 'left');
		new_col_filename.setAttribute( 'width', '200');
		new_col_button.setAttribute( 'align', 'right');
		
		var new_row_button = document.createElement( 'input' );
		
		new_row_button.type = 'image';
		new_row_button.src	= 'extensions/Attachments/images/deletefile.gif';
		new_row_button.value = 'Delete';
		
		new_row.appendChild( new_col_filename );
		new_row.appendChild( new_col_button );
		
		new_row.element = element;

		new_row_button.onclick= function(){
		this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);
		this.parentNode.parentNode.element.parentNode.removeChild( this.parentNode.parentNode.element );
		this.parentNode.parentNode.element.multi_selector.count--;
		this.parentNode.parentNode.element.multi_selector.current_element.disabled = false;
		return false;
		};
		
		element_work = element.value;
		if (navigator.appVersion.indexOf('Win') != -1) {
			element_tab = element_work.split('\\');
		
		} else {
			element_tab = element_work.split('/');
		
		}		
		nbr_elements = element_tab.length;
		new_col_filename.innerHTML = element_tab[nbr_elements-1];
		new_col_button.appendChild( new_row_button );
		this.list_target.appendChild( new_row );
	
	};
};