<!-- feed HTML -->        
                
 <div id="facebook-feed" class="col-12 col-md-6 wow slideInLeft mb-3" data-wow-delay="0s" data-wow-duration="0.3s" data-wow-offset="150">
     <div class="box-inner">
        
          <h2 class="facebook center"><i class="fa fa-facebook-official mr-2" aria-hidden="true"></i>Facebook</h2>

        <?php
          // set page id
        $fb_account = esc_attr(get_theme_mod( 'contact_fb','' ));
         if($fb_account): ?>

        <?php
            /**
             * This is the link to my page graph
             * I've included it here so i can copy an paste for quick reference
             *
             * Copying and pasting this into the browser url bar gives you a full graph of the feed
             * which is very handy for browsing and seeing what exists in the array
             *
             * Change the values to suit your own needs, and when your script is final, remove this
             * comment block
             *
             * Typing this into the url will get you the super array (graph) to analyze
             * https://graph.facebook.com/YOUR_PAGE_ID/feed?access_token=APP_ACCESS_TOKEN
             */

          require_once __DIR__ . '/../vendor/autoload.php';
          
            $fb = new Facebook\Facebook([
                'app_id'     =>'1660078304242267',
                'app_secret' => '32ca0ffcf075a9a030020dbb3b8572e0',
                'default_graph_version' => 'v2.5',
            ]);
            

            
            
          // On garde le token par defaut
          $facebookToken='1660078304242267|4MycjSyzs_2ZwD4oBSFZmhL7q2w';
          $fb->setDefaultAccessToken($facebookToken);
         
          // On récupère les informations personnel
          $response = $fb->get('/'.$fb_account .'/posts?fields=id,message,created_time,picture,likes,shares,link');
          $fbposts = $response->getGraphEdge();
          $json = json_decode($fbposts, true);
          $fbposts = array_chunk($json, 5);
          
            
         
          echo '<div class="feed-wrapper scrollbar shadow"><ul class="feed-list ">';
          foreach ($fbposts[0] as $post) {
            $message = isset($post['message']) ? $post['message'] : NULL;
            $link = isset($post['link']) ? $post['link'] : NULL;
            $picture = isset($post['picture']) ? $post['picture'] : NULL;
            $fblikes = isset($post['likes']) ? count($post['likes']) : '0';


            echo '<li class="feed-item d-flex flex-column container-fluid p-2 m-0">'; 
            echo '
            <div class="d-flex flex-row justify-content-between  p-0">
              <a class="mr-2 feed-thumbnail" target="_blank" href="'. $link .'">
                <img src="'. $picture .'" />
              </a>
              ';
            echo '
              <div class="fbpost">'. $message .'
              </div>
            </div>
            <div class="d-flex flex-row justify-content-between  p-0">
              <div class="meta likes-count  small">' . $fblikes .' likes 
              </div>'; 
            //human readable time
                $datepost = $post['created_time']['date'];
                $datepost = strtotime($datepost);
            echo '
              <div class="meta feed-date  small">';
            printf( _x( '%s ago', '%s = human-readable time difference', 'sage' ), human_time_diff( $datepost, current_time( 'timestamp' ) ) );
            echo '
              </div>';    
            
            echo '<a class="feed-link badge badge-primary " href="'. $link .'" target="_blank"><div><i class="fa fa-external-link" aria-hidden="true"></i>
'. __( "follow the link", "sage" ) . '</div></a></div>' ;
            
            echo '</li>';
          }
            echo '</ul></div>';     
             ?>

            <?php else: ?>
            <?php echo __( 'Error : To display this section, you have to set your facebook page or profile ID in "dashboard" > "appearance" > "customize" > "my contact informations".', 'sage' ); ?>
            <?php endif ?>
     </div>  <?php /* end box-inner */ ?>
 </div>  <?php /* end facebook-feed */ ?>

 
 
<div id="twitter-feed" class="col-12 col-md-6 wow slideInRight mb-3" data-wow-delay="0s" data-wow-duration="0.3s" data-wow-offset="150">
     <div class="box-inner">
         <h2 class="twitter center"><i class="fa fa-twitter mr-2" aria-hidden="true"></i>Twitter</h2>

            <?php
            require_once __DIR__ . '/../vendor/autoload.php';
            // Require our TwitterTextFormatter library
            
            require_once __DIR__ . '/../vendor/TwitterTextFormatter.php';
            // Use the class TwitterTextFormatter
            use Netgloo\TwitterTextFormatter;
            // set page id
            $screen_name = esc_attr(get_theme_mod( 'contact_tw','' ));
            if($screen_name):

            // Set here your twitter application tokens
            $settings = array(
              'consumer_key' => 'bxw190jifguM2lHpAZSAvOzCG',
              'consumer_secret' => '0UHSntbKOHn3wIYxK55Y6zFM5roAVlWx7Z5UnwehPbehkTFqxw',
              // These two can be left empty since we'll only read from the Twitter's 
              // timeline
              'oauth_access_token' => '',
              'oauth_access_token_secret' => '',
            );




            // Get timeline using TwitterAPIExchange
            $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
            $getfield = "?screen_name={$screen_name}";
            $requestMethod = 'GET';
            $twitter = new TwitterAPIExchange($settings);
            $user_timeline = $twitter
              ->setGetfield($getfield)
              ->buildOauth($url, $requestMethod)
              ->performRequest();
            $user_timeline = json_decode($user_timeline);

            // Print each tweet using TwitterTextFormatter to get the HTML text
            echo "<div class='feed-wrapper scrollbar shadow'><ul class='feed-list'>";
            foreach ($user_timeline as $user_tweet) {

              $user_name = $user_tweet->user->screen_name;
              $tweet_id = $user_tweet->id_str;
              if (isset($user_tweet->retweeted_status)){
              $retweet_author_name = $user_tweet->retweeted_status->user->name;
              $retweet_author_screen_name = $user_tweet->retweeted_status->user->screen_name;
            }
              echo '<li class="feed-item d-flex flex-column p-2 m-0">';
                // Print also the tweet"s image if is set


              echo "<div class='d-flex flex-row justify-content-between  p-0'>";

              if (isset($user_tweet->entities->media)) {
                $media_url = $user_tweet->entities->media[0]->media_url;
                echo "<a class='mr-2 feed-thumbnail' target='_blank' href='https://twitter.com/". $user_name . "/status/". $tweet_id ."'><img src='{$media_url}' width='150px' ></a>";
              }

            //tweet
                echo "<div class='fbpost'>";
                echo  TwitterTextFormatter::format_text($user_tweet) . "</div></div>";
                echo '<div class="d-flex flex-row justify-content-between  p-0">';

            //twitter date
                $datepost = $user_tweet->created_at;
                $datepost = strtotime($datepost);
                echo '<div class="meta feed-date  small">';
                  printf( _x( '%s ago', '%s = human-readable time difference', 'sage' ), human_time_diff( $datepost, current_time( 'timestamp' ) ) ); 
                echo "</div>";

                echo "<a class='feed-link badge badge-primary' target='_blank' href='https://twitter.com/". $user_name;
                echo "/status/". $tweet_id . "'>";
                echo "<span>". __( 'see the tweet', 'sage' ) . "</span></a>";
               
              echo "</div></li>";
            }
            echo "</ul></div>";
            ?>

            <?php else: ?>
            <?php echo __( 'Error : To display this section, you have to set your twitter account in "dashboard" > "appearance" > "customize" > "my contact informations".', 'sage' ); ?>
            <?php endif ?>

     </div>  <?php /* end box-inner */ ?>
 </div>  <?php /* end twitter-feed */