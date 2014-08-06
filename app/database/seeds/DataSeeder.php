<?php

class DataSeeder extends Seeder {

    public function run()
    {
        $categories = array(
       		array('id' => 1, 'category' => 'Education', 'slug'=>'education'),
          array('id' => 2, 'category' => 'Entertainment', 'slug'=>'entertainment')
       	);

        \Merahputih\Categories\Models\Category::insert($categories);

        $licenses = array(
          array('id'=> 1, 'license' => 'Video+ License', 'slug' => 'video-license'),
          array('id'=> 2, 'license' => 'No Creative Commons License', 'slug' => 'no-creative-commons-license'),
          array('id'=> 3, 'license' => 'Attribution', 'slug' => 'attribution'),
          array('id'=> 4, 'license' => 'Attribution Share Alike', 'slug' => 'attribution-share-alike'),
          array('id'=> 5, 'license' => 'Attribution No Derivatives', 'slug' => 'attribution-no-derivatives'),
          array('id'=> 6, 'license' => 'Attribution Non-Commercial Share Alike', 'slug' => 'attribution-non-commercial-share-alike'),
          array('id'=> 7, 'license' => 'Public Domain Dedication', 'slug' => 'public-domain-dedication')
        );

        \Merahputih\License\Models\License::insert($licenses);

    }

}