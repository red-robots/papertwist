<?php 
$setup = get_instagram_setup();
if($setup) {
    $num_photos = ($setup['sb_instagram_num']) ? $setup['sb_instagram_num'] : 4;
    $follow_btn_text = $setup['sb_instagram_follow_btn_text'];
    $opt = $setup['connected_accounts'];
    $instaData = array();
    if($opt) {
        foreach($opt as $insta_id => $data) {
            $instaData = $data;
        }
    }

    $instagram_access_token = ( isset($instaData['access_token']) && $instaData['access_token'] ) ? $instaData['access_token'] : '';
    $instagram_username = ( isset($instaData['username']) && $instaData['username'] ) ? $instaData['username'] : '';
    $instagram_user_id = ( isset($instaData['user_id']) && $instaData['user_id'] ) ? $instaData['user_id'] : '';
    $instagram_link = 'https://www.instagram.com/'.$instagram_username.'/';
    $clean_token = preg_replace("/[^a-zA-Z0-9\.]+/", "", sbi_maybe_clean( $instagram_access_token ) );
    $split_token = explode( '.', $clean_token );
    $uid = $split_token[0];
    $instagram_sort = $setup['sb_instagram_sort'];
    $insta_sort_by = ($instagram_sort=='random') ? 'random':'recent';
    ?>
    <script type="text/javascript">
        var insta_u_id = '<?php echo $instagram_user_id; ?>';
        var insta_token = '<?php echo $clean_token; ?>';
        var section_title = 'Instagram';
        var instagram_link = '<?php echo $instagram_link; ?>';
        var follow_btn_text = '<?php echo $follow_btn_text; ?>';
        var num_photos = '<?php echo $num_photos; ?>';
        var sortBy = '<?php echo $insta_sort_by; ?>';
        jQuery.noConflict();
        jQuery(document).ready(function ($) {
            /* ==== INSTAGRAM POSTS ==== */
            if(insta_u_id && insta_token) {
                var token = insta_token;
                var userid = insta_u_id;
                var api_call = 'https://api.instagram.com/v1/users/'+userid+'/media/recent?access_token=' + token;
                
                $.ajax({
                    url: api_call, 
                    dataType: 'jsonp',
                    type: 'GET',
                    data: {access_token: token, count: num_photos},
                    success: function(response) {
                        if(response.data!=undefined) {
                            var obj = response.data;
                            $.each( obj, function( k, v ) {
                                
                                var img = v.images;
                                var img_src = img.standard_resolution.url;
                                var cap = v.caption;
                                var caption = (cap) ? cap.text : '';
                                var caption_excerpt = (caption) ? stringTruncate(caption,180) : '';
                                var instalink = v.link;
                                var content = '<div class="instaCol"><div class="instagram-inner clear"><a class="instalink" href="'+instalink+'" target="_blank">';
                                    content += '<span class="insta-image-thumb" style="background-image:url('+img_src+')"></span><img class="ithumb" src="'+img_src+'" alt="" />';
                                if(caption) {
                                    content += '<span class="caption"><span class="txtwrap">'+caption_excerpt+'</span></span>';
                                }
                                content += '</a></div></div>';

                                $("#instagram_feeds").append(content);
                            });

                            $("#instagramLink").attr('href',instagram_link).attr('target','_blank');
                            //$("#instagram_feeds").html(content);

                            $("#instagram_feeds .instaCol").hover(
                                function(){
                                    var captiondiv = $(this).find('.caption').outerHeight();
                                    var cap = captiondiv + 'px';
                                    var transform_value = 'translateY(-'+cap+')';
                                    $(this).find('.insta-image-thumb, .ithumb').css('transform',transform_value);
                                    $(this).addClass('open');
                                }, function(){
                                    $(this).removeClass('open');
                                    $(this).find('.insta-image-thumb, .ithumb').css('transform','none');
                                }
                            );

                        }
                        $('.js-blocks').matchHeight();  
                    },
                    error: function(data){
                    }
                });
            }

            var stringTruncate = function(str, length){
              var dots = str.length > length ? '...' : '';
              return str.substring(0, length)+dots;
            };
        });
    </script>
<?php }  
?>