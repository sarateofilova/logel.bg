<?php wp_footer(); ?>

	<!-- <div class="container"> -->
		<!-- <div class="row no-gutters"> -->
			<!--WS Share buttons-->
				<!-- <ul class="share-buttons">
				  <li><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2F%D0%BA%D0%BB%D1%8E%D1%87%D0%B0%D1%80%D1%81%D0%BA%D0%B8-%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8.bg%2F&quote=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&quote=' + encodeURIComponent(document.URL)); return false;"><i class="sprite sprite-Facebook"></i></a></li>
				  <li><a href="https://twitter.com/intent/tweet?source=https%3A%2F%2F%D0%BA%D0%BB%D1%8E%D1%87%D0%B0%D1%80%D1%81%D0%BA%D0%B8-%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8.bg%2F&text=:%20https%3A%2F%2F%D0%BA%D0%BB%D1%8E%D1%87%D0%B0%D1%80%D1%81%D0%BA%D0%B8-%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8.bg%2F" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><i class="sprite sprite-Twitter"></i></a></li>
				  <li><a href="https://plus.google.com/share?url=https%3A%2F%2F%D0%BA%D0%BB%D1%8E%D1%87%D0%B0%D1%80%D1%81%D0%BA%D0%B8-%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8.bg%2F" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;"><i class="sprite sprite-Google_"></i></a></li>
				  <li><a href="http://www.tumblr.com/share?v=3&u=https%3A%2F%2F%D0%BA%D0%BB%D1%8E%D1%87%D0%B0%D1%80%D1%81%D0%BA%D0%B8-%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8.bg%2F&quote=&s=" target="_blank" title="Post to Tumblr" onclick="window.open('http://www.tumblr.com/share?v=3&u=' + encodeURIComponent(document.URL) + '&quote=' +  encodeURIComponent(document.title)); return false;"><i class="sprite sprite-Tumblr"></i></a></li>
				  <li><a href="http://pinterest.com/pin/create/button/?url=https%3A%2F%2F%D0%BA%D0%BB%D1%8E%D1%87%D0%B0%D1%80%D1%81%D0%BA%D0%B8-%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8.bg%2F&description=" target="_blank" title="Pin it" onclick="window.open('http://pinterest.com/pin/create/button/?url=' + encodeURIComponent(document.URL) + '&description=' +  encodeURIComponent(document.title)); return false;"><i class="sprite sprite-Pinterest"></i></a></li>
				  <li><a href="http://www.reddit.com/submit?url=https%3A%2F%2F%D0%BA%D0%BB%D1%8E%D1%87%D0%B0%D1%80%D1%81%D0%BA%D0%B8-%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8.bg%2F&title=" target="_blank" title="Submit to Reddit" onclick="window.open('http://www.reddit.com/submit?url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><i class="sprite sprite-Reddit"></i></a></li>
				  <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2F%D0%BA%D0%BB%D1%8E%D1%87%D0%B0%D1%80%D1%81%D0%BA%D0%B8-%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8.bg%2F&title=&summary=&source=https%3A%2F%2F%D0%BA%D0%BB%D1%8E%D1%87%D0%B0%D1%80%D1%81%D0%BA%D0%B8-%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8.bg%2F" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><i class="sprite sprite-LinkedIn"></i></a></li>
				</ul> -->
			<!--END WS Share buttons-->
		<!-- </div>
	</div> -->
	<footer id="footer">
		<div class="col-lg-12">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
					<?php dynamic_sidebar( 'footer_1' ); ?>
					</div>
					<div class="col-lg-3">
					<?php dynamic_sidebar( 'footer_2' ); ?>
					</div>
					<div class="col-lg-3">
					<?php dynamic_sidebar( 'footer_3' ); ?>
					</div>			
					<div class="col-lg-3">
					<?php dynamic_sidebar( 'footer_4' ); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<p class="footer-copyright">Logel &copy; <?php echo date("Y"); ?> | <a href="http://localhost:8888/logel.bg/privacy-policy/">PRIVACY POLICY</a></p>			
					</div>
				</div>
			</div>
		</div>
	</footer>
	
	<!--Register service worker-->

	<script>
	if ('serviceWorker' in navigator) {
	  window.addEventListener('load', function() {
		navigator.serviceWorker.register('/sw.js').then(function(registration) {
		  // Registration was successful
		  console.log('ServiceWorker registration successful with scope: ', registration.scope);
		}, function(err) {
		  // registration failed :(
		  console.log('ServiceWorker registration failed: ', err);
		});
	  });
	}
	</script>

<!--END Register service worker-->
	
</body>
</html>
