<?php
    require("config.php");
    require('notify.class.php');
    require_once('TwitterOAuth/TwitterOAuth.php');
    require_once('TwitterOAuth/Exception/TwitterException.php');

    use TwitterOAuth\TwitterOAuth;
    date_default_timezone_set('UTC');
    
    class VlmNotifyTwitter extends VlmNotify {
        var $media = "twitter";
        var $rate_limit = 1;
        var $handle = null;
        var $config = array(
            'consumer_key' => VLM_NOTIFY_TWITTER_CONSUMER_KEY,
            'consumer_secret' => VLM_NOTIFY_TWITTER_CONSUMER_SECRET,
            'oauth_token' => VLM_NOTIFY_TWITTER_OAUTH_TOKEN,
            'oauth_token_secret' => VLM_NOTIFY_TWITTER_OAUTH_TOKEN_SECRET,
            'output_format' => 'object'
        );
        var $sleep = 1;

        function __construct() {
            parent::__construct();
            //create the twitter handle
            $this->handle = new TwitterOAuth($this->config);
        }
        
        function postone($m) {
            if ($m['url'] != '') {
                $status = sprintf("%s - %s", $m['summary'], $m['url']);
            } else {
                $status = $m['summary'];
            }
            $response = $this->handle->post('statuses/update', array('status' => $status));
            return $response && parent::postone($m);
        }
                        
    }    
    
    $twitter = new VlmNotifyTwitter();
    $twitter->fetch();
    $twitter->post();
    $twitter->close();
?>
