<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials", "views" and "widgets"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
    */

    'events' => array(

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function($theme)
        {
            // You can remove this line anytime.
            $theme->setTitle('MerahPutih Video+');
            $theme->setDescription('MerahPutih Video+');
            $theme->setKeywords('Video,Upload,Online TV,MerahPutih,Kartu Merah Putih');

            // Breadcrumb template.
            // $theme->breadcrumb()->setTemplate('
            //     <ul class="breadcrumb">
            //     @foreach ($crumbs as $i => $crumb)
            //         @if ($i != (count($crumbs) - 1))
            //         <li><a href="{{ $crumb["url"] }}">{{ $crumb["label"] }}</a><span class="divider">/</span></li>
            //         @else
            //         <li class="active">{{ $crumb["label"] }}</li>
            //         @endif
            //     @endforeach
            //     </ul>
            // ');
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function($theme)
        {
            // You may use this event to set up your assets.
            
            $theme->asset()->add('jquery', 'assets/js/jquery-2.1.1.min.js');
            // $theme->asset()->add('jquery-ui', 'vendor/jqueryui/jquery-ui.min.js', array('jquery'));
            $theme->asset()->add('resumable', 'assets/js/resumable.js');

            $theme->asset()->container('footer')->usePath()->add('bootstrap', 'js/bootstrap.min.js');
            $theme->asset()->container('footer')->usePath()->add('flexverticalcenter', 'js/jquery.flexverticalcenter.js');
            $theme->asset()->container('footer')->usePath()->add('retina', 'js/retina-1.1.0.min.js');
            $theme->asset()->container('footer')->usePath()->add('stellar', 'js/jquery.stellar.min.js');
            $theme->asset()->container('footer')->usePath()->add('smooth-scroll', 'js/jquery.smooth-scroll.min.js');
            $theme->asset()->container('footer')->usePath()->add('venobox', 'js/venobox.min.js');
            $theme->asset()->container('footer')->usePath()->add('carousel', 'js/owl.carousel.min.js');
            //$theme->asset()->container('footer')->usePath()->add('video-js', 'plugins/video-js/video.js');
            //$theme->asset()->container('footer')->add('big-upload', 'assets/js/bigUpload.js');
            
            $theme->asset()->container('footer')->add('datatable', 'assets/js/jquery.dataTables.js');
            $theme->asset()->container('footer')->add('datatable-bootstrap', 'assets/js/dataTables.bootstrap.js');
            $theme->asset()->container('footer')->add('humanize-duration', 'assets/js/humanize-duration.js');
            
            $theme->asset()->container('footer')->usePath()->add('app', 'js/app.js');

            // Partial composer.
            $theme->partialComposer('header', function($view)
            {
                $view->with('auth', Sentry::getUser());
            });
        },
        
        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => array(

            'default' => function($theme)
            {
                $theme->asset()->usePath()->add('bootstrap', 'css/bootstrap.min.css');
                // $theme->asset()->usePath()->add('font-awesome', 'css/font-awesome.min.css');
                $theme->asset()->usePath()->add('ionicons', 'css/ionicons.min.css');
                $theme->asset()->usePath()->add('owl-venobox', 'css/venobox.css');
                $theme->asset()->usePath()->add('owl-carousel', 'css/owl.carousel.css');
                $theme->asset()->usePath()->add('owl-theme', 'css/owl.theme.css');
                $theme->asset()->usePath()->add('owl-transitions', 'css/owl.transitions.css');
                $theme->asset()->usePath()->add('style', 'css/style.css');
                $theme->asset()->usePath()->add('video-css', 'plugins/video-js/video-js.css');
                $theme->asset()->usePath()->add('color-emerald', 'css/color/emerald.css');

                $theme->asset()->add('datatable', 'assets/css/jquery.dataTables.min.css');
                $theme->asset()->add('datatable', 'assets/css/dataTables.bootstrap.css');
            }

        )

    )

);