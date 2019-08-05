
        <?php 
        $email= get_field('email', 'option');
        $fb_url = get_field('fb_url' ,'option');
        $twitter_url = get_field('twitter_url' ,'option');
        $google_url = get_field('google_url' ,'option');
        ?>
<!-- home_contact-->
<div class="main_container bg_homect">
  <div class="home_contact">
    <div class="container">
      <div class="row-fluid"> 
        <!--contact_bg -->
        <div class="span4">
          <div class="ht_bg">
            <h3>Say hello!</h3>
            <div class="ht_inner">
              <label>Drop a line</label>
              <a href="mailto:<?php echo $email; ?>" class="ct_mail"></a> </div>
          </div>
        </div>
        <!--/contact_bg --> 
        
        <!--contact_bg -->
        <div class="span4">
          <div class="ht_bg">
            <h3>Career</h3>
            <div class="ht_inner">
              <label>Let’s Build</label>
              <a href="#" class="ct_career"></a> </div>
          </div>
        </div>
        <!--/contact_bg --> 
        
        <!--contact_bg -->
        <div class="span4 social">
          <div class="ht_bg">
            <h3>Stay Updated</h3>
            <div class="ht_inner">
              <label>Follow us</label>
              <ul>
                <li><a href="<?php echo $fb_url; ?>" class="fb"></a></li>
                <li><a href="<?php echo $twitter_url; ?>" class="tw"></a></li>
                <li><a href="<?php echo $google_url; ?>" class="gp"></a></li>
              </ul>
            </div>
          </div>
        </div>
        <!--/contact_bg --> 
        
      </div>
    </div>
  </div>
</div>
<!-- home_contact--> 

<!--footer -->

<div class="main_container bg_homect">
  <div class="footer">
    <div class="container">
      <div class="footer_inner">
        <div class="footer_left">
          <p><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/ftr_logo.png" alt="footer_logo"></a><span>All rights reserved. 2013, Multunus</span></p>
           </div>
      </div>
    </div>
  </div>
</div>
<!--/footer --> 

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.bxslider.js"></script> 
<script>
$('.bxslider').bxSlider({
  mode: 'fade',
  pager:false,
  auto:true,
  controls:false,
  speed:100
});

$('.bxslider1').bxSlider({
  pager:false,
 // auto:true,
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

<script>
    $('#myTab a, #myTab_ser a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
    })
</script>
</body>
</html>