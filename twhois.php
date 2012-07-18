#!/usr/bin/php -q

<?php

define("ENDPOINT_URL_PREFIX","https://api.twitter.com/1/users/show.json?screen_name=");

if (sizeof($argv) == 2) {

    try {

        $screen_name = $argv[1];
    
        $url = ENDPOINT_URL_PREFIX . $screen_name;
    
        $response = @file_get_contents($url);
    
        $user = json_decode($response);
        
        if ( strpos($http_response_header[0], "200") ) {       
        
            print "       User: @" . $user->screen_name . "\r\n";
            print "      Since: " . $user->created_at . "s\r\n";
            print "\r\n";
            print "       Name: " . $user->name . "\r\n";
            print "        Bio: " . $user->description. "\r\n";
            print "   Location: " . $user->location . "\r\n";
            print "        Web: " . $user->url . "\r\n";
            print "\r\n";
            print "     Tweets: " . $user->statuses_count . "\r\n";
            print "  Favorites: " . $user->favourites_count. "\r\n";
            print "  Followers: " . $user->followers_count . "\r\n";
            print "  Following: " . $user->friends_count. "\r\n";
            print "Last status: " . $user->status->text . "\r\n";
        
        } else {
            
            print "Twitter says: " . $http_response_header[0] . "\r\n";
            
        }

    } catch(Exception $e) {

        print $e . "\r\n";

    }

} else {

    print "Error: missing argument\r\nUsage: ./twping.php screen_name\r\n";

}

?>
