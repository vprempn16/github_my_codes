{strip}
{if $smarty.request.message == "success"}
	<div class ="alert alert-success"  style="margin-top: 8px; margin-bottom: -9px;">Successfully Uploaded</div>
{/if}
<div class="row-fluid settingsHeader padding1per"style="margin-top:20px; width: 92.999%;">
                                <span class="span8">
                                        <span class="font-x-x-large" style="font-family: initial; ">Upload the Documents for Email Attachment </span>
                                </span>
                                <span class="span4">
                                        <span class="pull-right ">
				                <a class="btn addButton"style="top: 36px;left: 17px;" href = "index.php?parent=Settings&module=Vtiger&view=uploadDocuments">Create Document</a>
                                        </span>
                                </span>
                        </div>
                                <hr>

<div>



	<div>
		<table class="table table-bordered listViewEntriesTable">
			<thead>
			<tr>
				<th>Document Name</th>
				<th>Active</th>
				<th>Type</th>
				<th>Size</th>
				<th>Action</th>
			</tr>
                      </thead>
                      <tbody>
			{foreach item=fileName from=$FILE_NAME key=key}
			<tr>
				  
				<td>{$fileName}</td>
				<td><input type="checkbox" id ="custom_Filter{$FILE_ID[$key]}" {if $FILE_Status[$key] eq 1}checked {/if} onclick='FilterCustomDocuments({$FILE_ID[$key]})' > </td>
			
				<td>{$FILE_TYPE[$key]}</td>
			
				<td>{$FILE_SIZE[$key]}</td>
				<td>
					<span> <a href='index.php?parent=Settings&module=Vtiger&view=UpdateCustomDocument&task=delete&id={$FILE_ID[$key]}'><i title="Delete" class="icon-trash alignMiddle" onclick="return confirm('Are you sure?')"></i></a></span> 
				<!--	<span><a href='index.php?parent=Settings&module=Vtiger&view=UpdateCustomDocument&task=edit&id={$FILE_ID[$key]}'><i title="Edit" class="icon-pencil alignMiddle"></i></a><span> -->
				</td>
			<tr>
				
                                {/foreach}
			<tbody>

		</table>


		



	</div>	
</div>

{/strip}
