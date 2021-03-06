
document.observe("dom:loaded", function(){
	$("ask-tags-input").observe("keyup", tagInput);
	$("ask-tags-input").observe("blur", tagInput);
}
	);
function tagInput(event)
{
	if(event.keyCode == 32 || event.type == "blur")
	{
		var originInput = $("ask-tags-input").value
		var tagName = originInput.replace(/\s/g, "");
		if(tagName == "")
		{
			$("ask-tags-input").value = "";
		}
		else
		{
			makeTag(tagName);
		}
	}
}

function makeTag(tagName)
{
	var tag = document.createElement("span");
	tag.innerHTML = tagName;
	tag.className = "tag";

	var tagFormItem = document.createElement("input");
	tagFormItem.type = "hidden";
	tagFormItem.name = "tags[]";
	tagFormItem.value = tagName;
	tag.appendChild(tagFormItem);

	$("tag-collection").appendChild(tag);



	$("ask-tags-input").value = "";
	var inputWidth = $("ask-tags").clientWidth - $("tag-collection").offsetWidth - 20;
	$("ask-tags-input").style.width = inputWidth + "px";
}
