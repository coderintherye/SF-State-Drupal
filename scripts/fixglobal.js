window.onresize = pageCalc;

var curLeft = 0;
var logoObj;
var aAll;

function kickOff() {
	aAll = document.getElementsByTagName("a");
	// disable and change color of active page's link
    for (var i=0; i<aAll.length; i++) {
        if (window.location.href.split("#")[0] == aAll[i].href) {
            aAll[i].onclick = function() {if (this.blur) {this.blur();} return false;}
            aAll[i].style.cursor = "text";
			aAll[i].style.borderBottom = "none";
			aAll[i].style.color = "#777777";
            if (aAll[i].className == "site") {
				aAll[i].style.color = "#ffffff";
           	}
        }
		// fix ie's lack of support for css :focus so tabbers see skip links on focus
		if (navigator.appName == "Microsoft Internet Explorer" && aAll[i].className == "skip") {
			var restoreColor = aAll[i].style.color;
			var restoreBorder = aAll[i].style.borderBottom;
			aAll[i].onfocus = function() {this.style.color = "#999999"; this.style.borderBottom = "1px solid #999999";}
			aAll[i].onblur = function() {this.style.color = restoreColor; this.style.borderBottom = restoreBorder;}
		}
     }
	// fixes in-page link bug for Internet Explorer
	if (navigator.appName == "Microsoft Internet Explorer") {
		getElementsByClass("target");
	}
    // calculate certain elements for placement:
	pageCalc();
}

function findPos() {
	// position logo-aligned bg image relative to window width accounting for browsers' differing def of offsetParent:
	logoObj = document.getElementById("footerbox").firstChild.firstChild;
	if (logoObj.offsetParent) {
		curLeft = logoObj.offsetLeft;
		while (logoObj.offsetParent!=null) {
			logoObj = logoObj.offsetParent;
			curLeft += logoObj.offsetLeft;
		}
	}
	document.getElementsByTagName("body")[0].style.backgroundPosition = curLeft - 649 + "px";
}

function pageCalc() {
	// position logo-aligned bg image relative to window width:
	findPos();
	// make the column depths match so they have full-height attributes:
}

function getElementsByClass(searchClass,node,tag) {
	// fixes in-page link bug for Internet Explorer; first find all destinations (elements with classname "target"):
    var classElements = new Array();
	if ( node == null ) {
			node = document;
	}
	if ( tag == null ) {
			tag = '*';
	}
	var elAll = node.getElementsByTagName(tag);
	var pattern = new RegExp("(^|\\s)"+searchClass+"(\\s|$)");
	for (var i = 0, j = 0; i < elAll.length; i++) {
		if (pattern.test(elAll[i].className)) {
			classElements[j] = elAll[i];
			j++;
		}
	}
	// then insert what is an invalid attribute for most elements, with an invalid value to boot:
	for (var i=0; i<classElements.length; i++) {
		classElements[i].setAttribute("tabIndex",-1)
	}
}