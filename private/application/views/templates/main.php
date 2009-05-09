<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


  	<head>
		<meta name="verify-v1" content="vFckshEutZA/UQ9BixaPrNnC0Nb9cuu3mtZ2lCqZYFo=" />
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta name="description" content="" />
		<title><?=$seoTitle?></title>
		<link rel="stylesheet" href="<?=url::base()?>assets/css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?=THEME_PATH?>main.css" type="text/css" media="screen" />
		<script type="text/javascript" src="<?=THEME_PATH?>js/twitter.min.js"></script>
		

		
			
             		

		<script type="text/javascript" src="<?=$theme->get_path()?>js/jquery.js"></script>

<!--[if lte IE 6]>
<script type="text/javascript" src="<?=$theme->get_path()?>js/supersleight-min.js"></script>
<![endif]-->

<script type="text/javascript" src="<?=$theme->get_path()?>js/jquery.js"></script>

<!-- jQuery for recent blog items -->
   </script>


<!--- END OF HEAD   --->

	</head>
	
	<body>
	
	<div id="hcard-Syd-Lawrence" class="vcard">
	<div id="header">
		<div class="center_box">
	
			<ul id="navigation"> 
				<?=$navbar[0]?>

<?php
foreach ($feeds as $feed) {
?>
<li><a href="<?=$feed->permalink()?>" ><img src="<?=$feed->favicon?>" alt="<?=$feed->title?>"></a></li>
<?php
}
?>

</ul>




<img id="itsame" src="http://www.gravatar.com/avatar.php?gravatar_id=da7339d70d9a19c0fa5dbb22c0fe4e20&size=164&d=identicon" border="0" alt="Me">
			<h1><a href="/">Syd Lawrence - web monkey</a></h1>
		</div>
	</div>
	
	<div class="center_box"><div id="main_container">

<!-- page header -->

<!-- blog bits -->
		


<!-- Blog Items -->
		
		<div id="blog-items">
			<!-- The latest blog item -->
			
                        <div id="latest">
                        <h3>Latest</h3>
                        
                                               
							
				<div id="1">
				<h2><a href="/items/view/300">Winchester Web Scene</a></h2>
				<small>23 Apr 2009, 8:11pm | <a href="/items/view/300#disqus_thread"?> Comments</a></small>
				<p>What is it all about?

Well basically, there is a large range of web professional living / working in Winchester. The aim of Winchester Web Scene is to connect local people with one thing in common, the internet.
It is very rare for local agencies to compete with each other,&#8230;</p>
				<p class="readmore"><a href="/items/view/300">Read More</a></p>
				</div>

				
											
				<div id="2">
				<h2><a href="/items/view/113">Safari 4 - is it any good?</a></h2>
				<small>25 Feb 2009, 10:33pm | <a href="/items/view/113#disqus_thread"?> Comments</a></small>
				<p>i have been playing now with safari 4 since yesterday. All in all, I like it a lot. Obviously there are some obvious gui changes, i.e. the tabs are now above, and it has one of these super address bars. And more importantly it has top sites (I recall Opera&#8230;</p>
				<p class="readmore"><a href="/items/view/113">Read More</a></p>
				</div>

				
							

			</div>
			<!-- Last 3 blog items -->
			<div id="recent">
				<h2><a href="/items/site/">Recent</a></h2>
				<ul>

								
					<li>
						<h3><a href="#1" class="selected">Winchester Web Scene</a></h3>
						<small>April 23, 2009 8:11 pm</small>
					</li>

													
					<li>
						<h3><a href="#2" class="selected">Safari 4 - is it any good?</a></h3>
						<small>February 25, 2009 10:33 pm</small>
					</li>

									
				</ul>

			</div>
                        <div style="clear:both"></div>
		</div>

		<!-- Lifestream -->

	<!-- tag pages -->
	
	<!-- search pages -->
	
	<!-- site pages - few conditionals to tidy up messy feed source URLs -->
			
    <ul id="activity_list">
        
             <!-- begin conditional content -->
         

        
            <?=$content?>

            </ul>
	<div class="clear"></div>
    <p id="pagination">Page: 1 <a href="/page/2">2</a> <a href="/page/3">3</a> <a href="/page/4">4</a> <a href="/page/5">5</a> <a href="/page/6">6</a> <a href="/page/7">7</a> <a href="/page/8">8</a> <a href="/page/9">9</a> <a href="/page/10">10</a> <a href="/page/17">...17</a> <a href="/page/16">&rsaquo;</a></p>

</div><div id="sidebar_container">
<div id="find_me">
<h3>Find me</h3>
<p>


<?=$profile_links?>





</p>
</div>
<div id="explanation">
<h3>Syd Lawrence</h3>
<p>This is my life on the web</p>
<p><a href="http://bit.ly/info/gXdr4">Winchester Web Scene Press Release</a></p>
    </div>
    
    
<div id="search">
<form id="search_form" method="post" action="/items/do_search">
    <p><input type="text" name="query" size="20" class="text_input" value="" />&nbsp;<input type="submit" value="search my stuff" /></p>
    </form>
</div>


<div id="twitter_div">
<h3><a href="http://twitter.com/sydlawrence" rel="me">Twitter</a></h3>
<ul id="twitter_update_list"></ul>
<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/sydlawrence.json?callback=twitterCallback2&amp;count=3"></script>	
    </ul>
</div>

<style type="text/css">table.lfmWidgetradio_6f9d94e65e11cadd2c774318195470de td {margin:0 !important;padding:0 !important;border:0 !important;}table.lfmWidgetradio_6f9d94e65e11cadd2c774318195470de tr.lfmHead a:hover {background:url(http://cdn.last.fm/widgets/images/en/header/radio/regular_black.png) no-repeat 0 0 !important;}table.lfmWidgetradio_6f9d94e65e11cadd2c774318195470de tr.lfmEmbed object {float:left;}table.lfmWidgetradio_6f9d94e65e11cadd2c774318195470de tr.lfmFoot td.lfmConfig a:hover {background:url(http://cdn.last.fm/widgets/images/en/footer/black.png) no-repeat 0px 0 !important;;}table.lfmWidgetradio_6f9d94e65e11cadd2c774318195470de tr.lfmFoot td.lfmView a:hover {background:url(http://cdn.last.fm/widgets/images/en/footer/black.png) no-repeat -85px 0 !important;}table.lfmWidgetradio_6f9d94e65e11cadd2c774318195470de tr.lfmFoot td.lfmPopup a:hover {background:url(http://cdn.last.fm/widgets/images/en/footer/black.png) no-repeat -159px 0 !important;}</style>
<table class="lfmWidgetradio_6f9d94e65e11cadd2c774318195470de" cellpadding="0" cellspacing="0" border="0" style="width:184px;"><tr class="lfmHead"><td><a title="sydlawrence�s Library" href="http://www.last.fm/listen/user/sydlawrence/personal" target="_blank" style="display:block;overflow:hidden;height:20px;width:184px;background:url(http://cdn.last.fm/widgets/images/en/header/radio/regular_black.png) no-repeat 0 -20px;text-decoration:none;border:0;"></a></td></tr><tr class="lfmEmbed"><td><object type="application/x-shockwave-flash" data="http://cdn.last.fm/widgets/radio/22.swf" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" id="lfmEmbed_1961515712" width="184" height="140"> <param name="movie" value="http://cdn.last.fm/widgets/radio/22.swf" /> <param name="flashvars" value="lfmMode=radio&amp;radioURL=user%2Fsydlawrence%2Fpersonal&amp;title=sydlawrence%E2%80%99s+Library&amp;theme=black&amp;lang=en&amp;widget_id=radio_6f9d94e65e11cadd2c774318195470de" /> <param name="allowScriptAccess" value="always" /> <param name="allowNetworking" value="all" /> <param name="allowFullScreen" value="true" /> <param name="quality" value="high" /> <param name="bgcolor" value="000000" /> <param name="wmode" value="transparent" /> <param name="menu" value="true" /> </object></td></tr><tr class="lfmFoot"><td style="background:url(http://cdn.last.fm/widgets/images/footer_bg/black.png) repeat-x 0 0;text-align:right;"><table cellspacing="0" cellpadding="0" border="0" style="width:184px;"><tr><td class="lfmConfig"><a href="http://www.last.fm/widgets/?url=user%2Fsydlawrence%2Fpersonal&amp;colour=black&amp;size=regular&amp;autostart=0&amp;from=code&amp;widget=radio" title="Get your own widget" target="_blank" style="display:block;overflow:hidden;width:85px;height:20px;float:right;background:url(http://cdn.last.fm/widgets/images/en/footer/black.png) no-repeat 0px -20px;text-decoration:none;border:0;"></a></td><td class="lfmView" style="width:74px;"><a href="http://www.last.fm/user/sydlawrence" title="View sydlawrence's profile" target="_blank" style="display:block;overflow:hidden;width:74px;height:20px;background:url(http://cdn.last.fm/widgets/images/en/footer/black.png) no-repeat -85px -20px;text-decoration:none;border:0;"></a></td><td class="lfmPopup"style="width:25px;"><a href="http://www.last.fm/widgets/popup/?url=user%2Fsydlawrence%2Fpersonal&amp;colour=black&amp;size=regular&amp;autostart=0&amp;from=code&amp;widget=radio&amp;resize=1" title="Load this radio in a pop up" target="_blank" style="display:block;overflow:hidden;width:25px;height:20px;background:url(http://cdn.last.fm/widgets/images/en/footer/black.png) no-repeat -159px -20px;text-decoration:none;border:0;" onclick="window.open(this.href + '&amp;resize=0','lfm_popup','height=240,width=234,resizable=yes,scrollbars=yes'); return false;"></a></td></tr></table></td></tr></table>


</div>

<div id="footer">

<script type="text/javascript">
//<[CDATA[
(function() {
		var links = document.getElementsByTagName('a');
		var query = '?';
		for(var i = 0; i < links.length; i++) {
			if(links[i].href.indexOf('#disqus_thread') >= 0) {
				query += 'url' + i + '=' + encodeURIComponent(links[i].href) + '&';
			}
		}
		document.write('<script type="text/javascript" src="http://disqus.com/forums/sydlawrence/get_num_replies.js' + query + '"></' + 'script>');
	})();
//]]>
</script>
<div style="float:right">{execution_time}</div>
<span id="copyright">Copyright &copy; 2009 Me. Running on <?=zest::get_version(true)?>. </span>
</div>

</div></div>

</div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-7654450-1");
pageTracker._trackPageview();
} catch(err) {}</script>


</body>
</html>