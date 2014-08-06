<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SEO -->
    <title>{{ Theme::get('title') }}</title>
    <meta name="alexaVerifyID" content="hhvumjzGAplPkWQVBzkmaZpZBEo"/>
    
    {{ Theme::partial('meta') }}

    <link type="text/plain" rel="author" href="humans.txt">
    <link href="favicon.png" rel="icon" type="image/png">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700%7cSource+Sans+Pro:700,300' rel='stylesheet' type='text/css'>
    {{ Theme::asset()->styles() }}
    {{ Theme::asset()->scripts() }}
    <script type="text/javascript">var rootUrl='{{ URL::to('') }}';</script>

  </head>
<body data-spy="scroll" data-target=".main-menu" data-offset="85">
    <noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=dUaGi1a4ZP00OK" style="display:none" height="1" width="1" alt="" /></noscript>
    {{ Theme::partial('header') }}
    
    
    {{ Theme::content() }}
    <!-- /end content -->

    {{ Theme::partial('footer') }}
    <!-- /end footer -->

    <!-- jQuery Plugins -->
    {{ Theme::asset()->container('footer')->scripts() }}
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-52887546-1', 'auto');
  ga('send', 'pageview');
</script>
<script type="text/javascript">
_atrk_opts = { atrk_acct:"dUaGi1a4ZP00OK", domain:"merahputih.com",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
  </body>
</html>