
// Filter Page 



// ---------

// CheckBox
var ba_count=0;
var message = "Selected records : ";
var checkMainCheckBox = 0;
var checkMailManager =0;
checkMainCheckBox = $('#listViewEntriesMainCheckBox').val();
checkMailManager = $('#parentCheckBox').val();
if(checkMainCheckBox == 'on'){
	CreateTags();
}else if(checkMailManager != 'on'){
	setTimeout(CreateTags, 4000);	
}
	if(checkMainCheckBox == 'on' || checkMailManager == 'on'){
		// When Click a checkbox this function will execute (Count will be update)
		$(document).on('click','input[type="checkbox"]',function(){
	            if($(this).prop("checked") == true){
				var chkbx =$(this).val();
				if(chkbx >=0 ){
					 ba_count = ba_count+1;
					 ba_display(ba_count);
				}
        	    }else if($(this).prop("checked") == false){
				var chkbx = $(this).val();
				if(chkbx >=0 ){
					ba_count = ba_count-1;
					ba_display(ba_count);
			}
            	}
        	});
	}
	//Main checkbox for other modules (execpt MailManager)
 $('#listViewEntriesMainCheckBox').on('click',function(){
	if($(this).prop('checked') == true){
		flag =0;	
	        countRecords(flag);
		
	}else{
		flag =1;
		countRecords(flag);
	}
     });
		// Mail Manager Main checkbox 
 $(document).on('click','#parentCheckBox',function(){
        if($(this).prop("checked") == true){
                flag =0;
                countRecords(flag);

        }else{
                flag =1;
                countRecords(flag);
        }
    });


	// Create Division tags for Print the message and count  
function CreateTags(){
	checkMailManager = $('#parentCheckBox').val();
	if(checkMainCheckBox == 'on'){
			// For Other Modules 
                $("#listViewContents").after("<div id ='ba_count_result'></div>");
                $('.topscroll-div').after("<div id = 'ba_count_results'></div>");
                ba_display(ba_count);

	}else if(checkMailManager == 'on'){ 
		   //For MailManager module
                $(".listViewContentDiv").before("<div id ='ba_count_result'></div>");
                $('.listViewContentDiv').after("<div id = 'ba_count_results'></div>");
                ba_display(ba_count);
        }

 
}
function countRecords(chk){	// Count All CheckBoxes
	var flag = chk;
	var ba_count = $("input:checkbox").length;
	ba_count--;
	if(flag == 0 ){
		ba_display(ba_count);		
	}else{
		ba_count=0;
		ba_display(ba_count);
		}
	window.ba_count=ba_count;
}

function ba_display(n){		//Display the Number of Checkboxes are Checked.
	var ba_count = n;
	if(ba_count>0){
                document.getElementById('ba_count_result').style.display='block';
                document.getElementById('ba_count_results').style.display='block';

		document.getElementById('ba_count_result').innerHTML=message+ba_count;
	        document.getElementById('ba_count_results').innerHTML=message+ba_count;
	}else if(ba_count<=0){
                document.getElementById('ba_count_result').style.display='none';
		document.getElementById('ba_count_results').style.display='none';
	}
	
}
//       Chech Box end




//----------------------	Filter Page in Send Email	-------------------------

$(document).on('change','#customFilter',function(){
	var currentPageLocation = "index.php?view=Popup&module=Documents&src_module=Emails&src_field=composeEmail&triggerEventName=postSelection8037";
	var nextPageId = $(this).val();
	if(nextPageId >=0 ){
		var nextPage = currentPageLocation+'&viewname='+nextPageId;
		
	}else{
		var nextPageId = nextPageId.replace(" ", "+");
		nextPage = currentPageLocation+'&folder_id=folderid&folder_value='+nextPageId;
	}
              window.location.assign(nextPage);       

});

//	----------End in Filter Page----------------------

//	Attach Documents To Mail 

function AttachDocumetsToMail(){
	$(document).on('change','#AttachtAllDocument',function(){
		if($(this).prop("checked") == true){
		//	var checkboxValue = $(this).val();
			$.ajax({
				type:'POST',
				data :{'sambel':'test'},
				dataType : "JSON",
				url: "index.php?module=Contacts&action=AttachAllDocument",
				success:function(data){

					var customData = new Array();
	                                for(var id in data){
						 customData.push('"'+data[id].id+'"');	
					}			
				document.getElementById('attachFileIds').value = "["+customData+"]";
				}
			})

		}
	});
}


//	**************			*********************
function FilterCustomDocuments(key)
{
	var boxId = '#custom_Filter'+key;
		var checkBoxValue = ($(boxId).prop("checked") == true);
		if(checkBoxValue == true){
			var active = 1;
		}else{
			var active = 0;
		}	
		$.ajax({
			type:'POST',
			data:{'id':key,'fileStatus':active},
			url:'index.php?parent=Settings&module=Vtiger&view=UpdateCustomDocument&task=filter',
			success:function(data){	}
		});
}
//	****************	**************************
