<?php get_header(); ?>
<style type="text/css">
    body{
        color: black;
    }
</style>
<!--breadcrumb-->
<div class="main_container light_bg">
<div class="bre_crumb">
<div class="crumb_inner">
<ul>
<li><a href="#">Home</a><span>/</span></li>
<li><?php echo basename(get_permalink()); ?><span>/</span></li>
</ul>

</div>
</div>
</div>
<!--breadcrumb-->


    <div class="row">

        <div class="col-sm-8 blog-main" style="margin: 80px;">

            <?php if(have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

<!--career_mdl -->
<div class="main_container bg_white">
  <div class="blog_details">
    <div class="container">
      <div class="row-fluid"> 
        <!--openinf_left -->
        <div class="span9">
          <div class="blog_left">
            <h2><?php the_title(); ?></h2>
            <div class="blg_dt_imgCon"><?php if(has_post_thumbnail()) : ?>
            <?php the_post_thumbnail(); ?>
         <?php endif; ?></div>
            <div class="row-fluid">
              <div class="span2">
              <div class="blog_info">  <div class="left_img_con">
                <?php
$user = wp_get_current_user();
 
if ( $user ) :
    ?>
    <img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" />
<?php endif; ?>
              </div>
                <div class="user_name"><span>By <?php the_author(); ?></span></div>
                <div class="time"><span><label><?php the_time('g:i a'); ?></label></span></div>
                <div class="posted_at"><span><?php echo meks_time_ago(); ?></span></div>
                <div class="social_shrng"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/social_sharing.png" /></a></div>
                </div>
              </div>
              <div class="span10">
                <div class="blg_topic_cont">
                  <p><?php the_content(); ?></p>
                  <div class="btm_cat"><span>Topics :</span><ul>
                    <li>
                        <?php $categories = get_categories( array(
    'orderby' => 'name',
    'parent'  => 0
) );
 
foreach ( $categories as $category ) {
    printf( '<a href="%1$s">%2$s</a><br />',
        esc_url( get_category_link( $category->term_id ) ),
        esc_html( $category->name )
    );
} ?> 
                    </li>
                  </ul></div>
                  <div class="share_btm"><a href="#"><img src="img/share_btm.png" alt="share_btm"></a></div>
                  
                </div>
              </div>
              <br class="clear"/>
              <div class="discuss_con">
                 <?php if(is_single()) : ?>
    <?php comments_template(); ?>
    <?php endif; ?>

                  </div>
            </div>
          </div>
        </div>        
        <!--/career_left --> 
        
        <!--career_right -->
        
        <div class="span3">
          <div class="blg_right"> 
            <!--open_rept -->
            <div class="v_small">
            <div class="rtopen_rept top_pos">
              <nav id="mainNav" class="navbar">
                <div class="navbar-inner">
                    <h3>Categories:</h3>
                  <div class="mobile-menu"> <a data-status="plus" href="#">Menu<i class="ar-plus"></i></a> </div>
                  <div class="right_navigation blg_dtl_nav">
                
                    <ul>
                      
                       <?php   $categories = get_categories();
foreach($categories as $category) {
   echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
} ?>
                    
                    </ul>
                  </div>
                </div>
              </nav>
              
                  </div>
                  
                  <div class="srchbox_con top_ser">
                <label>Search Blog</label>
               <span> <input type="text" onFocus="if(this.value=='Search'){this.value='';}" onBlur="if(this.value==''){this.value='Search';}" value="Search">
        <input type="button"></span>
              </div>
              </div>
              <div class="popular_blog">
                <h3>Most Popular Blog</h3>
                <!--rpt_popular_Blog-->
                <div class="poplrBlog_con">
                  <div class="left_con">
                      
                  </div>
                  <div class="right_con">
                      
<?php                     

// we get an array of posts objects
$posts = get_posts();

// start our string
$str = '<ul style="list-style:none;">';
// then we create an option for each post
foreach($posts as $key=>$post){
  $str .= '<li style="border-bottom:1px dashed #d4d4d4 ; padding:3px; margin-bottom:10px;"><a href="#">'.$post->post_title.'</a></li>';
}
$str .= '</ul>';
echo $str;
?>
                  </div>
                </div>
                <!--rpt_popular_Blog--> 
              </div>
        
            <!--/open_rept --> 
            
          </div>
        </div>
        
        <!--/career_right --> 
        
      </div>
    </div>
  </div>
</div>
<!--/career_mdl --> 

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.bxslider.js"></script> 
<script>
$('.bxslider').bxSlider({
  mode: 'fade',
  pager:false,
  auto:true,
  controls:false
});

$('.bxslider1').bxSlider({
  pager:false,
 // auto:true,
});

$(document).ready(function(){
  $('.sw_slider').bxSlider({
    slideWidth: 300,
    minSlides: 1,
    maxSlides: 3,
     moveSlides: 1,
     slideMargin:20,
 // auto: true,
  pager: false
  });
});
  


</script> 
<!--top_scroll -->
<script>
$('.top_cont a').click(function(){
     

          
          
    if ($(window).width() <= 979)
    {   

     
var toscroll = $('.tab_con').position();
var divtoppos = toscroll.top-0;
$("html, body").animate({ scrollTop: divtoppos }, 600);

 
 
    } else
    {
        
     var toscroll = $('.tab_con').position();
     var divtoppos = toscroll.top-62;
     
        $("html, body").animate({ scrollTop: divtoppos }, 600);
        
    }
        

        });
        
        





</script> 
<!--/top_scroll -->
 
<script type="text/javascript">
  $(document).ready(function() {
      
      

      
      
    $(".mobile-menu a").click(function() {
      $("nav#mainNav .right_navigation").slideToggle();
      var status = $(this).attr('data-status');
      if (status=='plus') {
        $(this).attr('data-status', 'minus');
        $(this).html('<i class="ar-minus"></i> Menu');
      } else if (status == 'minus') {
        $(this).attr('data-status', 'plus');
        $(this).html('<i class="ar-plus"></i> Menu');
      } else {
        $(this).html("I've made a huge mistake."); //A little Arrested Development
                                                   //joke to keep me sane.
                                                   //This else should never be reached.
      }
      
      return false;
     
      
    });
  });
 
  $(window).resize(function() {

    
    if (vwptWidth >768) {
      $(".right_navigation").removeAttr("style");
    }
  });
</script> 
<script>
    $('#myTab a, #myTab_ser a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
    })
</script>


                <?php endwhile; ?>
            <?php else : ?>
                <p><?php __('No Page Found') ?></p>
            <?php endif; ?>

        </div><!-- /.blog-main -->


<?php get_footer(); ?>