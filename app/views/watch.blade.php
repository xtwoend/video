<!DOCTYPE html>
<html>
<head>
  <title>Video.js | HTML5 Video Player</title>

  <!-- Chang URLs to wherever Video.js files will be hosted -->
  {{ HTML::style('videojs/video-js.css') }}
  <!-- video.js must be in the <head> for older IEs to work. -->
  {{ HTML::script('videojs/video.js') }}

  <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
  <script>
    videojs.options.flash.swf = "videojs/video-js.swf";
  </script>


</head>
<body>

  <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="640" height="264"
      poster=""
      data-setup='{ "techOrder": ["flash"] }'>
    <source src="rtmp://118.91.130.220/oflaDemo/&{{ $filename }}" type='rtmp/flv'>
    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
  </video>

</body>
</html>
