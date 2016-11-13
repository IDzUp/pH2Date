var articles = new Array();
var articleCount = 0;
var changeSpeed = 250;

function addArticles(objectID, speed)
{
	var newArticle = new Array();
	newArticle['current'] = null;
	newArticle['interval'] = null;
	newArticle['speed'] = speed;
	newArticle['offset'] = articleCount*(changeSpeed*2);
	
	articles[objectID] = newArticle;
	articleCount++;
	
	runArticles(objectID);
}

function runArticles(objectID)
{
	$("#"+objectID).children('div').hide();
	showArticle(objectID,0);
}

function showArticle(objectID, articleNumber)
{
	if (articles[objectID]['current']!=articleNumber)
	{
		if (articles[objectID]['current'] == null)
		{
			nextArticleBlock = $("#"+objectID).children('div')[articleNumber];
			$(nextArticleBlock).show();
			resetArticleTiming(objectID, articles[objectID]['offset']);
		}
		else
		{
			currentArticleBlock = $("#"+objectID).children('div')[articles[objectID]['current']];
			nextArticleBlock = $("#"+objectID).children('div')[articleNumber];
			$(currentArticleBlock).fadeOut(changeSpeed, function(){
				$(nextArticleBlock).fadeIn(changeSpeed);
			});
			resetArticleTiming(objectID, changeSpeed*2);
		}
		articles[objectID]['current'] = articleNumber;
	}
}

function changeArticle(objectID, changeCount)
{
	currentArticle = articles[objectID]['current'];
	nextArticle = currentArticle+changeCount;
	
	if (nextArticle >= $("#"+objectID).children('div').size()) nextArticle = 0;
	if (nextArticle<0) nextArticle = $("#"+objectID).children('div').size()-1;
	
	showArticle(objectID, nextArticle);
}

function resetArticleTiming(objectID,offset)
{
	if (articles[objectID]['interval']!=null) clearTimeout(articles[objectID]['interval']);
	articles[objectID]['interval'] = setTimeout("changeArticle('"+objectID+"',1)",(articles[objectID]['speed']*1000) + offset);
}