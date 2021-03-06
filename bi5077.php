<!DOCTYPE html>
<html>

<!-- Mirrored from www.flippity.net/bi.php?k=1zN8fpBPzNyMD81KmfLz8Vm2NymVI6XLibsTabOhhvGY by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Oct 2020 10:16:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bingo on Flippity.net</title>
<LINK href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<LINK rel=stylesheet href="bi-Style.css">
<LINK rel="icon" type="image/png" href="favicon.png">

<SCRIPT>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','../www.google-analytics.com/analytics.js','ga');
	
	ga('create', 'UA-23823535-6', 'flippity.net');
	ga('send', 'pageview');
</SCRIPT>


<SCRIPT type="text/javascript">

	pageURL = window.location.href
	encodedURL = encodeURIComponent(pageURL)

	terms1 = new Array()
	terms2 = new Array()
	refer = ""

	loadError = true
	
	function loadContent(json) {

		sheetTitle = json.feed.title.$t
		if (sheetTitle == "Demo") {
			docTitle = "Bingo on Flippity.net"
			pageTitle = "Bingo"
			}
		else {
			docTitle = sheetTitle + " Bingo on Flippity.net"
			pageTitle = sheetTitle + " Bingo"
			}
		encodedDocTitle = encodeURIComponent(docTitle)

		if (refer == "f") {  // coming from Flashcards
			for (i=1;i<json.feed.entry.length;i++) {			
				terms1[i-1] = json.feed.entry[i].gsx$side1.$t.trim()
				terms2[i-1] = json.feed.entry[i].gsx$side2.$t.trim()
				}
			}
		else {
			for (i=0;i<json.feed.entry.length;i++) {			
				terms1[i] = json.feed.entry[i].gsx$terms.$t.trim()
				terms2[i] = json.feed.entry[i].gsx$altterms.$t.trim()
				}
			}

		picFormats = new Array(".gif",".png",".jpg",".jpeg",".webp")
		otherFormats = new Array("https://equatio-/","https://docs.google.com/drawings")

		for (i=0;i<terms1.length;i++) {

			for (j=0;j<picFormats.length;j++) {
				if (terms1[i].slice(0,4) == "http" && terms1[i].toLowerCase().slice(-1*picFormats[j].length) == picFormats[j]) {
					terms1[i] = "<IMG SRC='" + terms1[i] + "' class='pic'>"
					}
				if (terms2[i].slice(0,4) == "http" && terms2[i].toLowerCase().slice(-1*picFormats[j].length) == picFormats[j]) {
					terms2[i] = "<IMG SRC='" + terms2[i] + "' class='pic'>"
					}
				}
				
			for (j=0;j<otherFormats.length;j++) {
				if (terms1[i].slice(0,otherFormats[j].length) == otherFormats[j]) {
					terms1[i] = "<IMG SRC='" + terms1[i] + "' class='pic'>"
					}
				if (terms2[i].slice(0,otherFormats[j].length) == otherFormats[j]) {
					terms2[i] = "<IMG SRC='" + terms2[i] + "' class='pic'>"
					}
				}

			if (terms1[i].indexOf("youtu.be") > -1) {
				terms1[i] = "[Video: Won't appear on board]"
				}
			if (terms2[i].indexOf("youtu.be") > -1) {
				terms2[i] = "[Video: Won't appear on board]"
				}

			if (terms1[i].indexOf("vocaroo.com") > -1) {
				terms1[i] = "[Audio: Won't appear on board]"
				}
			if (terms2[i].indexOf("vocaroo.com") > -1) {
				terms2[i] = "[Audio: Won't appear on board]"
				}

			if (terms1[i].indexOf("desmos.com/calculator/index.html") > -1) {
				terms1[i] = "<iframe class='desmos' src='" + terms1[i] + "?embed' frameborder=0></iframe>"
				}
			if (terms2[i].indexOf("desmos.com/calculator/index.html") > -1) {
				terms2[i] = "<iframe class='desmos' src='" + terms2[i] + "?embed' frameborder=0></iframe>"
				}

			}

		shuf1 = terms1.slice(0)
		shuf2 = terms2.slice(0)
		
		loadError = false
		
		}

	function updateLink() {
		playLink = "https://flippity.net/bi-pl.php?k=1zN8fpBPzNyMD81KmfLz8Vm2NymVI6XLibsTabOhhvGY" 
		if (document.getElementById("terms").value == "t2") {
			playLink += "&t=2"
			}
		if (document.getElementById("free").checked) {
			playLink += "&f=1"
			}
		document.getElementById('clickLink').href = playLink
		document.getElementById('selectLink').value = playLink
		document.getElementById('QR').innerHTML = "<img src='https://api.qrserver.com/v1/create-qr-code/?data=" + encodeURIComponent(playLink) + "&size=500x500' />"
		}
		
	function shuffleTerms() {
		var i = shuf1.length
		if ( i == 0 ) return false
		while ( --i ) {
			var j = Math.floor( Math.random() * ( i + 1 ) )
			var tempShuf1i = shuf1[i]
			var tempShuf2i = shuf2[i]
			var tempShuf1j = shuf1[j]
			var tempShuf2j = shuf2[j]
			shuf1[i] = tempShuf1j
			shuf2[i] = tempShuf2j
			shuf1[j] = tempShuf1i
			shuf2[j] = tempShuf2i
			}
		}

	function strikeOut(num) {
		if (document.getElementById("row" + num).style.textDecoration == "line-through") {
			document.getElementById("row" + num).style.textDecoration = "none"
			}
		else {
			document.getElementById("row" + num).style.textDecoration = "line-through"
			}
		}

	function loadTerms() {
		for (i=0;i<terms1.length;i++) {			
			document.getElementById("col1-" + i).innerHTML = shuf1[i]
			if (shuf2[i] != "") {
				document.getElementById("col2-" + i).innerHTML = shuf2[i]
				}
			}
		}

	function clearChecks() {
		for (i=0;i<terms1.length;i++) {			
			document.getElementById("row" + i).style.textDecoration = "none"
			document.getElementById("c" + i).checked = false
			}
		}

	function shuffle() {
		clearChecks()
		shuffleTerms()
		loadTerms()
		}

</SCRIPT>

</HEAD>

<BODY bgcolor="#999999" text="#000000">

<SCRIPT type="text/javascript" src="https://spreadsheets.google.com/feeds/list/1zN8fpBPzNyMD81KmfLz8Vm2NymVI6XLibsTabOhhvGY/1/public/values?alt=json-in-script&amp;callback=loadContent"></SCRIPT>

<SCRIPT type="text/javascript">
	if (loadError) {
		window.location.replace("error5077.html?k=1zN8fpBPzNyMD81KmfLz8Vm2NymVI6XLibsTabOhhvGY")
		}
</SCRIPT>

<TABLE width="100%" height="100%" cellpadding="0" cellspacing="0" border="0" align="center">
	<TR ID="instructions" STYLE="display: none;"><TD align="center"><A HREF="Bingo.html" TARGET="_blank">Want to Make Your Own Bingo Boards?</A></TD></TR>
  <TR height="1">
    <TD bgcolor="#003366"><DIV STYLE="width: 728px; margin: 0px auto;">
		<DIV Class="logo"><A href="index.html"><IMG src="images/Flippity-Logo-White.png" alt="Flippity.net" width="100" height="43" border="0" align="left"></A></DIV>
		<H1 id="title" class="title">Bingo</H1>
      </DIV></TD>
  </TR>
    <tr height="1" class="noPrint">
    <td align="center" bgcolor="#eee">
    <CENTER>
    <div class="ad">
    
    <script async src="../pagead2.googlesyndication.com/pagead/js/f.txt"></script>
    <!-- Flippity Fixed Header -->
    <ins class="adsbygoogle"
         style="display:inline-block;width:728px;height:90px"
         data-ad-client="ca-pub-1997516241738614"
         data-ad-slot="8452412342"></ins>
    <script>
         (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    
    </div>
    </CENTER>
    </td>
    </tr>

  <TR height="1">
    <TD align="CENTER">
	<SCRIPT type="text/javascript">
        var tabs = new Array('list','print','play','more')
		
        function switchTab(tab) {
			for (i = 0; i < tabs.length; i++) {
                document.getElementById(tabs[i] + 'Tab').style.backgroundImage='url(images/SubNavTab.png)'
                document.getElementById(tabs[i] + 'Page').style.display = 'none'
                }
             document.getElementById(tab + 'Tab').style.backgroundImage='url(images/SubNavTab-On.png)'
             document.getElementById(tab + 'Page').style.display = 'block'
            }
    </SCRIPT>
      <DIV STYLE="width: 900px; margin: 30px auto;">
      <table width="100%" cellspacing="0" cellpadding="0" height="30" background="images/SubNavBG-Long.gif" style="margin-bottom: 40px;">
        <tr>
          <td>&nbsp;</td>
          <td width="112" id="listTab" align="center" class="subnav" onClick="switchTab('list')" background="images/SubNavTab-On.png"><p class="subnav">List</p></td>
          <td width="10">&nbsp;</td>
          <td width="112" id="printTab" align="center" class="subnav" onClick="switchTab('print')" background="images/SubNavTab.png"><p class="subnav">Print</p></td>
          <td width="10">&nbsp;</td>
          <td width="112" id="playTab" align="center" class="subnav" onClick="switchTab('play')" background="images/SubNavTab.png"><p class="subnav">Play</p></td>
          <td width="10">&nbsp;</td>
          <td width="112" id="moreTab" align="center" class="subnav" onClick="switchTab('more')" background="images/SubNavTab.png"><p class="subnav">More</p></td>
          <td>&nbsp;</td>
        </tr>
      </table>
      </DIV>
     </TD>
  </TR>
  <TR valign="top">
    <TD>

    <CENTER>    
    <DIV ID="listPage">
      <H2 align="center">List of Terms</H2>
		<SPAN class="button" onClick="shuffle()">Shuffle</SPAN><SPAN class="button" onClick="clearChecks()">Clear</SPAN>
        <table border="0" class="list" STYLE="margin: 30px auto;">
			<SCRIPT type="text/javascript">
				for (i=0; i<terms1.length; i++) {
					document.write("<TR id='row" + i + "'><TD STYLE='padding: 0px;'><input type='checkbox' onClick='strikeOut(" + i + ")' id='c" + i + "'></TD>")			
					document.write("<TD id='col1-" + i + "'></TD>")			
					if (shuf2[i] != "") {
						document.write("<TD id='col2-" + i + "'></TD>")
						}
					document.write("</TR>")
					}
				loadTerms()
            </SCRIPT>
        </table>
    </DIV>

    <DIV ID="printPage" STYLE="display: none; margin-bottom: 300px;">
      <h2>Print Boards</h2>
      <FORM ID="print" action="https://www.flippity.net/bi-pr.php?k=1zN8fpBPzNyMD81KmfLz8Vm2NymVI6XLibsTabOhhvGY" method="post" target="_blank">
      <P>Print <input type="number" name="num" value="20" STYLE="width: 40px; height: 24px; text-align: center;"> boards 
      <SPAN id="printTerms">using <select name='trm' STYLE='height: 28px;'>
      <option value='1'>Terms</option>
      <option value='2'>Alt Terms</option>
      </select>
      </SPAN>
		<SCRIPT type="text/javascript">
            if (terms2[0] == "") {
                document.getElementById("printTerms").style.display = "none"
                }
        </SCRIPT>
      </P>
      <P><input name="free" type="checkbox" checked> Free space</P>
      </FORM>
      <BR><img src="images/Button-Print-Navy.png" Title="Print Boards" width="63" height="63" onClick="document.getElementById('print').submit()" STYLE="cursor: pointer;"></a>
    </DIV>

    <DIV ID="playPage" STYLE="display: none;">
      <h2>Play Online</h2>
      <P>Send players the link below or use the QR code. <br>
        Each player will get a unique, randomly-generated board.</P>
      <P id="playTerms">Use <select id='terms' onChange='updateLink()' STYLE='height: 28px;'>
          <option value='t1'>Terms</option>
          <option value='t2'>Alt Terms</option>
          </select>
      </P>
		<SCRIPT type="text/javascript">
            if (terms2[0] == "") {
                document.getElementById("playTerms").style.display = "none"
                }
        </SCRIPT>
      <P><input ID="free" type="checkbox" onChange="updateLink()"> Free space</P>
		<HR>
      <P><IMG src="images/Link-Icon.png" width="16" height="16" hspace="10" align="absmiddle"><INPUT id="selectLink" type="text"  class="linkBox" onClick="this.select()" value=""><A href="#" id="clickLink" target="_blank"><img src="images/Button-Launch-Navy.png" width="31" height="30" hspace="10" border="0" align="absmiddle" TITLE="Preview link"></a></P>
      <DIV id="QR" STYLE="width: 500px; height: 500px; margin: 30px;"></DIV>  
		<SCRIPT type="text/javascript">
            updateLink()
        </SCRIPT>
    </DIV>

    <DIV ID="morePage" STYLE="display: none;">
      <H2>More Options</H2>
        <p><a href="ra675b.html?k=1zN8fpBPzNyMD81KmfLz8Vm2NymVI6XLibsTabOhhvGY&amp;t=1" TARGET="_blank">Send Terms to Randomizer Wheel<img src="images/Button-Launch-Blue.png" width="16" height="16" hspace="6" border="0" align="absmiddle"></a></p>
        <p><a href="rae021.html?k=1zN8fpBPzNyMD81KmfLz8Vm2NymVI6XLibsTabOhhvGY&amp;t=2" TARGET="_blank">Send Alt Terms to Randomizer Wheel<img src="images/Button-Launch-Blue.png" width="16" height="16" hspace="6" border="0" align="absmiddle"></a></p>
	</DIV>
    </CENTER>
    
	</TD>
  </TR>
  <TR>
    <TD height="1" align="CENTER" valign="MIDDLE">
	<SCRIPT type="text/javascript">
		function showHide(blk) {
			if (document.getElementById(blk).style.display == 'none') {
                document.getElementById(blk).style.display = 'inline'
                }
            else {
                document.getElementById(blk).style.display = 'none'
                }
            }
    </SCRIPT>

      <P class="share"><A class="share" href="javascript:showHide('share')" title="Show/Hide Sharing Options"><IMG SRC="images/Share-Icon-Gray.png" width="15" height="16" border="0" align="absmiddle" style="margin-right: 6px;">share</A></P>
     
      <DIV ID="share" STYLE="display: none;">
      
      <IMG src="images/Link-Icon.png" width="16" height="16" hspace="10" align="absmiddle">
        <INPUT id="linkURL" type="text" class="linkBox" onClick="this.select()" value="">
         
        <TABLE align="center" class="shareOptions">
          <TR>
            <TD>
				<script src="../apis.google.com/js/platform.js" async defer></script>
                <g:sharetoclassroom url="bi5077.php?k=1zN8fpBPzNyMD81KmfLz8Vm2NymVI6XLibsTabOhhvGY" size="20"></g:sharetoclassroom>
            </TD>
            <TD>
	            <SCRIPT type="text/javascript">document.write("<a href='mailto:?subject=" + encodedDocTitle + "&body=Check out " + encodedDocTitle + ": " + encodedURL + "' TARGET='_blank'><img src='images/Icon-Email.png' width='22' height='20' border='0' title='Email'></a>")</SCRIPT>
            </TD>
            <TD>
	            <SCRIPT type="text/javascript">
					encodedQRurl = "QR076c.html?u=" + encodedURL + "&p=" + encodeURIComponent(pageTitle)
					document.write("<a href='" + encodedQRurl + "' target='_blank'><img src='images/Flippity-QR-Code.gif' width='20' height='20' border='0' title='Get QR Code'></a>")
                </SCRIPT>
            <TD>
                <a href="#" class="twitter-share"><IMG SRC="images/Twitter-Button.gif" width="60" height="20" ALT="Tweet"></a>
                <SCRIPT type="text/javascript">
                
                    var getWindowOptions = function() {
                    var width = 500;
                    var height = 350;
                    var left = (window.innerWidth / 2) - (width / 2);
                    var top = (window.innerHeight / 2) - (height / 2);
                    
                    return [
                        'resizable,scrollbars,status',
                        'height=' + height,
                        'width=' + width,
                        'left=' + left,
                        'top=' + top,
                        ].join();
                        };
                    
                    var twitterBtn = document.querySelector('.twitter-share');
                    var shareUrl = 'https://twitter.com/intent/tweet?url=' + encodedURL + '&text=' + encodedDocTitle
                    twitterBtn.href = shareUrl; // 1
                    
                    twitterBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    var win = window.open(shareUrl, 'ShareOnTwitter', getWindowOptions());
                    win.opener = null; // 2
                    });
                    
                </SCRIPT>
            </TD>
            <TD>
                <a href="https://docs.google.com/spreadsheets/d/1zN8fpBPzNyMD81KmfLz8Vm2NymVI6XLibsTabOhhvGY" target="_blank"><img src="images/Google-Sheets-Icon.gif" width="16" height="20" border="0" title="Original Spreadsheet"></a>
            </TD>
          </TR>
        </TABLE>
      
      </DIV> 

    </TD>
  </TR>
  <TR>
    <TD height="1" align="CENTER" valign="MIDDLE" bgcolor="#003366"><P class="copyright">Copyright&copy; 2017-2019 Flippity.net. All Rights Reserved.</P></TD>
  </TR>
 </TABLE>

	<SCRIPT type="text/javascript">
        document.getElementById('linkURL').value = pageURL
		document.title = docTitle
		document.getElementById('title').innerHTML = pageTitle
		if ("1zN8fpBPzNyMD81KmfLz8Vm2NymVI6XLibsTabOhhvGY" == "1zN8fpBPzNyMD81KmfLz8Vm2NymVI6XLibsTabOhhvGY") { document.getElementById('instructions').style.display = "table-row" }
    </SCRIPT>

</BODY>

<!-- Mirrored from www.flippity.net/bi.php?k=1zN8fpBPzNyMD81KmfLz8Vm2NymVI6XLibsTabOhhvGY by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Oct 2020 10:16:34 GMT -->
</HTML>