<div id="highlighted" class="bg-color-grayLight1">
      <div class="container">
        <div class="row">
          <div class="highlighted-blog-single col-xs-12">
            <div class="fade-in text-center vertical-center">
              <h2 class="blog-single-title text-color-theme">Upload Form Example Function</h2>
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

	              <div class="blog-single block">
	                <div class="blog-post">
						<div class="blog-single-post-content">
						{{ Form::open(array('route' => 'uploadvideo', 'files' => true)) }}

							{{ Form::token() }}
							
							FILE :
							{{ Form::file('file') }}
							<br>
							TITLE:
							{{ Form::text('title') }}
							<br>
							DESCRIPTION:
							{{ Form::textarea('description') }} 
							<br>
							LICENSE:
							{{ Form::select('license', array('public' => 'Public', 'private' => 'Private')) }}
							<br>
							{{ Form::submit('Upload') }}

						{{ Form::close() }}
						</div>
						<br>
						<div class="blog-single-post-content">
							ini simple upload form untuk mengupload video bisa di ganti dengan dropzone js untuk frontend uploadnya

						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
