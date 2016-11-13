function formSubmit1()
{
	document.myform.action='<?php echo site_url("project/create"); ?>';
}
function formSubmit2()
{
document.myform.action='<?php echo site_url("project/viewAllProjects/all"); ?>';
}

new Ajax.Request('<?php echo site_url("home/listProjects/latest"); ?>',
  {
    method:'get',
    onSuccess: function(transport){
      var response = transport.responseText || "no response text";
      document.getElementById('test').innerHTML = response
    },
    onFailure: function(){ alert('Something went wrong...') }
  });
  
function checkFind(type){
	
	if(type == 'work'){
		document.getElementById("work").setAttribute("class", "selected");
		document.getElementById("prof").setAttribute("class", "");
	}
	else{
		document.getElementById("work").setAttribute("class", "");
		document.getElementById("prof").setAttribute("class", "selected");
	}
	new Ajax.Request('<?php echo base_url()."home/checkFind/"; ?>'+type,
  {
    method:'get',
    onSuccess: function(transport){
      var response = transport.responseText || "no response text";
      document.getElementById('innerContent').innerHTML = response
    },
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function getCat(catid){

	new Ajax.Request('<?php echo base_url()."home/getCate/"; ?>'+catid,
  {
    method:'get',
    onSuccess: function(transport){
      var response = transport.responseText || "no response text";
      document.getElementById('catInner').innerHTML = response
    },
    onFailure: function(){ alert('Something went wrong...') }
  });
}

 function getProjects(type){

 	new Ajax.Request('<?php echo base_url()."home/listProjects/"; ?>'+type,
  {
    method:'get',
    onSuccess: function(transport){
	 
      var response = transport.responseText || "no response text";
      document.getElementById('test').innerHTML = response
    },
    onFailure: function(){ alert('Something went wrong...') }
  });
 }
 checkFind('work')
 getCat(<?php echo $groups_row->id;?>);