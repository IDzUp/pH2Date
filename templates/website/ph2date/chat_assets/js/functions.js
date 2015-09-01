var captionLength = 0;
var caption = "";

$(document).ready(function()
{
  setInterval ( "cursorAnimation()", 600 );
});

function testTypingEffect()
{
  caption = $("input#userCaption").val();
  type();
}

function type() 
{
	$('p.caption').html(caption.substr(0, captionLength++));
	if(captionLength < caption.length+1)
	{
		setTimeout("type()", 100);
	}
	else
	{
		captionLength = 0;
		caption = "";
                testTypingEffect();
	}	
}

function testErasingEffect()
{
  caption = $("p.caption").html();
  captionLength = caption.length;
  if (captionLength>0)
  {
    erase();
  }
  else
  {
    $('p.caption').html("You didn't write anything to erase, but ok!");
    setTimeout("testErasingEffect()", 1000);
  }
}

function erase()
{
	$('p.caption').html(caption.substr(0, captionLength--));
	if(captionLength >= 0)
	{
		setTimeout("erase()", 100);
	}
	else {
		captionLength = 0;
		caption = "";
	}	
}

function cursorAnimation() 
{
  $("p.cursor").animate(
  {
    opacity: 0
  }, "fast", "swing").animate(
  {
    opacity: 1
  }, "fast", "swing");
}
