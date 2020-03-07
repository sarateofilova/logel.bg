<div id="logoWrap">
	<div class="container logorow">
		
			<div class="headerLogoLeft">
				<a href="/"><img src="http://localhost:8888/logel.bg/wp-content/uploads/2020/02/Logo_logel_sm_02.png" alt="лого"/></a>
			</div>
			<div class="headerLogoMiddle">
				<a href="/">
					<h1 class="text-logo-header">ЛОГЕЛ ООД</h1>
					<img src="http://localhost:8888/logel.bg/wp-content/uploads/2020/02/logel_slogan.png" alt="лого"/>
				</a>
			</div>
			<div class="headerLogoRight">
				<img src="http://localhost:8888/logel.bg/wp-content/uploads/2020/02/sertifcation_logo.png" alt="лого"/>
			</div>
		
	</div>
</div>

<div id="navWrap">
	
	<div class="container mobile-nav">	
		<div class="logo mobile">
			<a href="http://localhost:8888/logel.bg/"><img src="http://localhost:8888/logel.bg/wp-content/uploads/2020/02/Logo_logel_sm_01.png" alt="лого"/></a>
		</div>
		<?php
		wp_nav_menu( array(
			'theme_location'  => 'header',
			'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
			'container'       => 'div',
			'container_class' => 'stellarnav',
			'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
			'walker'          => new WP_Bootstrap_Navwalker(),
		) ); ?>	
	</div>
</div>
