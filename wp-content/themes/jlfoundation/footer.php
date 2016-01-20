	<?php global $jlfoundation; ?>
	<?php global $jlfoundation_theme; ?>

	<footer class="site-footer">
				
		<div class="site-footer__nav">
			<?php echo $jlfoundation_theme->footer_menu('footer-nav'); ?>
		</div>

		<div class="site-footer__legal">
			<p class="site-footer__legal--text">&copy; 2015 The Labuschagne Foundation. All Rights reserved.</p>
			<ul class="nav-items">
				<li class="nav-items__item">
					<a href="http://www.facebook.com" target="_blank" class="nav-items__item--link icon icon-facebook"></a>
				</li>
				<li class="nav-items__item">
					<a href="http://www.twitter.com" target="_blank" class="nav-items__item--link icon icon-twitter"></a>
				</li>
				<li class="nav-items__item">
					<a href="http://www.facebook.com" target="_blank" class="nav-items__item--link icon icon-instagram"></a>
				</li>
				<li class="nav-items__item">
					<a href="http://www.youtube.com" target="_blank" class="nav-items__item--link icon icon-youtube"></a>
				</li>
				<li class="nav-items__item">
					<a href="http://www.pinterest.com" target="_blank" class="nav-items__item--link icon icon-pinterest"></a>
				</li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</footer>
	
	<div id="myModal" class="modal fade modal--dyk">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true"><i class="icon icon-close"></i></span>
	        </button>
	        <h4 class="modal-title">What is a Neuron?</h4>
	      </div>
	      <div class="modal-body">
	      	<p style="text-align: center;"><img width="405" height="276" src="http://clients.plusplusminus.co.za/foundation/preview/wp-content/uploads/2016/01/neuron.png" class="img-responsive article-block__img wp-post-image" alt="neuron" srcset="http://localhost/jlfoundation/wp-content/uploads/2016/01/neuron-300x204.png 300w, http://localhost/jlfoundation/wp-content/uploads/2016/01/neuron.png 405w" sizes="(max-width: 405px) 100vw, 405px"></p>
	        <p>A neuron is a specialized cell that is the basic building block of the nervous system. It transports information electrically and chemically throughout the body.</p>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

    <?php wp_footer(); ?>

  </body>

</html>
