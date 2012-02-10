

function showDisplayDivs(argPassedId)
{
	var totalLiCount = document.getElementById('frmTotalLiCount').value;	
	for(var i = 1; i<= totalLiCount; i++)
	{
		//alert(document.getElementById('li_anchor_'+argPassedId).className);	
		if(argPassedId == i)	
		{
			document.getElementById('li_anchor_'+i).className = 'current';
			document.getElementById('li_ul_anchor_'+i).style.display = 'block';
		}
		else
		{
			document.getElementById('li_anchor_'+i).className = '';	
			document.getElementById('li_ul_anchor_'+i).style.display = 'none';
		}
	}
}


function showDisplayDivsTwo(argPassedId)
{
	var totalLiCount = document.getElementById('frmTotalLiCountTwo').value;	
	for(var i = 1; i<= totalLiCount; i++)
	{
		//alert(document.getElementById('li_anchor_'+argPassedId).className);	
		if(argPassedId == i)	
		{
			document.getElementById('li_anchor2_'+i).className = 'active';
			document.getElementById('li_ul_anchor2_'+i).style.display = 'block';
		}
		else
		{
			document.getElementById('li_anchor2_'+i).className = '';	
			document.getElementById('li_ul_anchor2_'+i).style.display = 'none';
		}
	}
}


function toggle() {
    var ele = document.getElementById("toggleText");
    var text = document.getElementById("displayText");
    if(ele.style.display == "block") {
            ele.style.display = "none";
        text.innerHTML = "+ Click to view more";
      }
    else {
        ele.style.display = "block";
        text.innerHTML = "- Click to hide";
    }
}
