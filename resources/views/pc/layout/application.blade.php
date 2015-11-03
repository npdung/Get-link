<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Download Vip | Get link fshare vip</title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('public/css/pc/style.css') }}" rel="stylesheet" type="text/css" media="screen" />
	<link href="{{ URL::asset('public/images/fb_image.jpg') }}" rel="image_src"/>
    
    <meta property="og:image" content="{{ URL::asset('public/images/fb_image.jpg') }}" />

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-33990741-2']);
        _gaq.push(['_trackPageview']);

        (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();   
    </script>

    <script>
        function valid_form()
        {
            var x=document.forms["form"]["email"].value;
            var atpos=x.indexOf("@");
            var dotpos=x.lastIndexOf(".");
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
            {
                alert('Not a valid e-mail address');
                return false;
            }
        }
    </script>

    </head>
<body onload="if(document.getElementById('md5input')) document.getElementById('md5input').focus();">
    <div id="fb-root"></div>
    <div id="wrapper">
        <div id="header">
            <div id="logo">
                <h1><a href="#"">Download VIP</a></h1>
            </div>
        </div>
        <!-- end #header -->
        <div id="menu">
            <ul>
                <li><a href="#">Quyên góp</a></li>
                <li><a href="#">Hướng dẫn</a></li>
                <li><a href="#">Các host hỗ trợ</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
        </div>
        <div align="center" style="margin: 0px auto;padding: 15px 0px;border-bottom: 1px solid #292929;">
            <!-- banner quảng cáo -->
        </div>
        <!-- end #menu -->
		
        @yield('content')
		
        <!-- end #page --> 
    </div>
    
            
    <div id="footer">
        <br />
        <form action="#" method="post" target="_top" style="text-align: center">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="4LSH5KA8JK6PE">
            <input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
            <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
        </form>
        <div align="center">
        </div>
    <!-- end #footer -->
    </div>
    <br />
</body>
</html>