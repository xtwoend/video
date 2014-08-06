<div id="highlighted" class="bg-color-grayLight1">
      <div class="container">
        <div class="row">
          <div class="highlighted-blog-single col-xs-12">
            <div class="fade-in text-center vertical-center">
              <h2 class="blog-single-title text-color-theme">{{ 'title' }}</h2>
            </div>
            <ul class="blog-post-info list-inline">
              <li>Alice Doe on 16 May</li>
              <li><a href="#">46.2K Plays / 711 Likes / 12 Comments</a></li>
              <li>1 Year ago</li>
            </ul>
          </div> <!-- /highlighted-image-blog -->

        </div> <!-- /row -->
      </div> <!-- /container -->      
</div> <!-- /highlighted -->

  <div id="blog-single" class="content">
      <div class="container">
        <div class="row">

          <div class="main-content col-xs-12 col-md-8 col-md-offset-2">
            <div class="region">
                  <br>
                  <div class="blog-single-post-content">
                      {{ Datatable::table()
                        ->addColumn('id','category','slug')       // these are the column headings to be shown
                        ->setUrl(route('api.categories'))   // this is the route where data will be retrieved
                        ->render() }}
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