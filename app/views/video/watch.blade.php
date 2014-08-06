<script>jwplayer.key="jdAt+d48tFAjX4DX7kjssc706ZYXgpgso8ajWZNYQvs=";</script>
<div id="blog-single" class="content">
      <div class="container">
        <div class="row">

          <div class="main-content col-xs-12 col-md-8 col-md-offset-2">
            <div class="region">

              <div class="blog-single block">
                <div class="blog-post">
                  
                  <div class="blog-single-post-content">
                  <!-- jwplayer -->
                    <div id="watchvideo"></div>
                    <script type="text/javascript">
                      jwplayer("watchvideo").setup({
                          image: "covers/{{ $video->cover }}",
                          logo: {
                              file: '{{ URL::to('') }}/assets/img/logomark.png',
                              link: 'http://video.merahputih.com'
                          },
                          skin: "roundster",
                          autostart: true,
                          sharing: {},
                          sources: [{
                            file: "{{ $video->path . $video->playback }}",
                            label: "720p HD"
                          },{
                            file: "{{ $video->path . $video->playback }}",
                            label: "360p SD",
                            "default": "true"
                          }],
                          width: "100%",
                          aspectratio: "16:9",
                          abouttext: "merahputih.com",
                          aboutlink: "http://video.merahputih.com",
                          ga: {
                              idstring: "{{ $video->info->name }}",
                              trackingobject: "pageTracker"
                          }                          
                      });
                    </script>
          </div>
                  <div class="blog-single-post-content">
          <div class="fade-in text-center">
            <h4 class="blog-single-title">{{ $video->info->name }}</h4>
          </div>
          <hr>
          <ul class="blog-post-info list-inline">
            <li>Alice Doe on {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $video->created_at)->toFormattedDateString() }}</li>
            <li><a href="#">46.2K Plays / 711 Likes / 12 Comments</a></li>
            <li>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $video->created_at)->diffForHumans() }}</li>
          </ul>
                   <p>
                     {{ $video->info->description }}
                   </p>
          
          
          
          </div> <!-- /blog-single-post-content -->
        
                  <div class="theme-comments">
                        
                    <h4 class="theme-comments-title">Comments</h4>
                    
                    <form class="form-horizontal" method="post" role="form">
                    
                      
                   
                      
                      <div class="form-group">
                        <div class="col-xs-12">
                          <textarea class="form-control" rows="8" id="comment-comment" name="comment-comment" placeholder="Comment"></textarea>
                        </div> <!-- /col-xs-12 -->
                      </div> <!-- /form-group -->
                      
                      <div class="form-group text-center">
                        <div class="col-xs-12">
                          <input type="submit" class="btn btn-primary btn-sm btn-block margin-top-20" id="submit" name="submit" value="submit comment" />
                        </div> <!-- /col-xs-12 -->
                      </div> <!-- /form-group -->
                    </form>
                    
                    <div class="theme-comment">
                      <div class="row">
                        <div class="theme-comment-picture col-sm-2 hidden-xs">
                          <img src="img/people/user1.jpg" class="img-responsive" alt="User 1" title="User 1" />
                        </div> <!-- /theme-comment-info -->
                        
                        <div class="theme-comment-message col-sm-10">
                          <h5 class="theme-comment-subject">Lorem Ipsum</h5>
                          <p class="theme-comment-info"><small>John Doe on Fri, 05/17/2014 - 10:19</small></p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec enim felis, mollis a lacinia laoreet, rutrum at velit. Fusce quis neque nisl. Proin faucibus leo fermentum venenatis pharetra. Aenean placerat scelerisque justo, ac ultrices neque interdum eu. Praesent et lobortis nunc.</p>
                          <p>In ac vulputate nisi. Aliquam aliquam viverra magna id sollicitudin.</p>
                          <p><small><a href="#">reply</a></small></p>
                        </div> <!-- /theme-comment-message -->
                      </div> <!-- /row -->
                    </div> <!-- /theme-comment -->
                    
                    <div class="theme-comment">
                      <div class="row">
                        <div class="theme-comment-picture col-sm-2 hidden-xs">
                          <img src="img/people/user2.jpg" class="img-responsive" alt="User 2" title="User 2" />
                        </div> <!-- /theme-comment-info -->
                        
                        <div class="theme-comment-message col-sm-10">
                          <h5 class="theme-comment-subject">Proin aliquam</h5>
                          <p class="theme-comment-info"><small>Jane Doe on Thu, 05/16/2014 - 12:44</small></p>
                          <p>Fusce et pharetra massa. Proin aliquam eros porttitor nulla dictum sollicitudin. Suspendisse potenti. Etiam ac odio nec est cursus luctus et id turpis.</p>
                          <p>Duis varius nunc id semper tincidunt. Aenean sit amet velit eleifend, rhoncus metus a, feugiat enim. Sed vestibulum leo quis lectus semper, eget pulvinar ligula adipiscing.</p>
                          <p><small><a href="#">reply</a></small></p>
                        </div> <!-- /theme-comment-message -->
                      </div> <!-- /row -->
                    </div> <!-- /theme-comment -->

                  </div> <!-- /theme-comments -->

                </div> <!-- /blog-post -->
              </div> <!-- /blog-content-block -->

            </div> <!-- /region -->
          </div> <!-- /main-content -->

        </div> <!-- /row -->
      </div> <!-- /container -->
    </div> <!-- /content -->

