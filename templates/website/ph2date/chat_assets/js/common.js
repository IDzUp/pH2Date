function popClass(object)
{
	url = object.href
	window.open(url,'','width=800,height=600,resizable=yes');
	
	return false;
}

function popPreview(object)
{
	url = object.href;
	return popURL(url,980,600,'preview');
}

function popWindow(object, width, height, name)
{
	url = object.href;
	return popURL(url,width,height,name);
}

function popURL(url, width, height, name)
{
	if (typeof name != 'string') name = '';
	window.open(url,name,'width='+width+',height='+height+',resizable=yes,scrollbars=yes');
	
	return false;
}


var productGroups = Array();

function toggleProductGroup(groupID, speed, state)
{
	if (groupID == undefined) return;
	
	if (speed == undefined || speed>750) speed = 750;
	
	if (state == undefined)
	{
		if (productGroups[groupID] == undefined) productGroups[groupID] = 'closed';
		
		state = 'open';
		if (productGroups[groupID] == 'open') state = 'closed';
	}
	productGroups[groupID] = state
	
	if (state == 'open')
	{
		$('#productGroup-'+groupID).slideDown(speed);
		$('#productGroup-expand-'+groupID).hide();
		$('#productGroup-compress-'+groupID).show();
	}
	else
	{
		$('#productGroup-'+groupID).slideUp(speed);
		$('#productGroup-expand-'+groupID).show();
		$('#productGroup-compress-'+groupID).hide();
	}
}

function showProductGroup(groupID, clearObject)
{
	if (groupID == undefined) return false;

	$('#productGroup-'+groupID).show();
	if (clearObject !== undefined) $(clearObject).html('').blur();
	
	return false;
}