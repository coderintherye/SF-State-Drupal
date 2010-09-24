// touchles javascript™ -- no event handlers in html

window.onload = kickOff;
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
			aAll[i].style.color = "#464666";
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

function equalCol() {
	// make the column depths match so they have full-height attributes (bg colors, etc):
	var colArray = new Array(["nav",0],["main",0],["sidebar",0]);
	for (var i=0; i<colArray.length; i++) {
		// everyone expresses their natural column heights:
		document.getElementById(colArray[i][0]).style.height = "100%";
		// detect natural column heights in px and store in the array:
		colArray[i][1] = document.getElementById(colArray[i][0]).offsetHeight;
	}
	// determine tallest column in the array:
	var tallCol = Math.max(colArray[0][1],colArray[1][1],colArray[2][1]);
	// make all columns the height of the tallest column:
	for (var i=0; i<colArray.length; i++) {
		if (document.getElementById(colArray[i][0]).offsetHeight == tallCol) {
			var fullCol = document.getElementById(colArray[i][0]);
		}
		document.getElementById(colArray[i][0]).style.height = tallCol + "px";
	}
	fullCol.style.height = "100%"
}

function pageCalc() {
	// position logo-aligned bg image relative to window width:
	findPos();
	// make the column depths match so they have full-height attributes:
	equalCol();
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
