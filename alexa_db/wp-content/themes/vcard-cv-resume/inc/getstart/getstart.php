<?php
//about theme info
add_action( 'admin_menu', 'vcard_cv_resume_gettingstarted' );
function vcard_cv_resume_gettingstarted() {
	add_theme_page( esc_html__('About Vcard CV Resume', 'vcard-cv-resume'), esc_html__('About Vcard CV Resume', 'vcard-cv-resume'), 'edit_theme_options', 'vcard_cv_resume_guide', 'vcard_cv_resume_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function vcard_cv_resume_admin_theme_style() {
	wp_enqueue_style('vcard-cv-resume-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('vcard-cv-resume-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vcard_cv_resume_admin_theme_style');

//guidline for about theme
function vcard_cv_resume_mostrar_guide() { 
	//custom function about theme customizer
	$vcard_cv_resume_return = add_query_arg( array()) ;
	$vcard_cv_resume_theme = wp_get_theme( 'vcard-cv-resume' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Vcard CV Resume', 'vcard-cv-resume' ); ?> <span class="version"><?php esc_html_e( 'Version', 'vcard-cv-resume' ); ?>: <?php echo esc_html($vcard_cv_resume_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vcard-cv-resume'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Vcard CV Resume at 20% Discount','vcard-cv-resume'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vcard-cv-resume'); ?> ( <span><?php esc_html_e('vwpro20','vcard-cv-resume'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VCARD_CV_RESUME_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vcard-cv-resume' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="vcard_cv_resume_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vcard-cv-resume' ); ?></button>
			<button class="tablinks" onclick="vcard_cv_resume_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vcard-cv-resume' ); ?></button>
			<button class="tablinks" onclick="vcard_cv_resume_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutenberg Block', 'vcard-cv-resume' ); ?></button>
			<button class="tablinks" onclick="vcard_cv_resume_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'vcard-cv-resume' ); ?></button>
			<button class="tablinks" onclick="vcard_cv_resume_open_tab(event, 'pro_theme')"><?php esc_html_e( 'Get Premium', 'vcard-cv-resume' ); ?></button>
			<button class="tablinks" onclick="vcard_cv_resume_open_tab(event, 'lite_pro')"><?php esc_html_e( 'Support', 'vcard-cv-resume' ); ?></button>
		</div>

		<?php
			$vcard_cv_resume_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vcard_cv_resume_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Vcard_CV_Resume_Plugin_Activation_Settings::get_instance();
				$vcard_cv_resume_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vcard-cv-resume-recommended-plugins">
				    <div class="vcard-cv-resume-action-list">
				        <?php if ($vcard_cv_resume_actions): foreach ($vcard_cv_resume_actions as $key => $vcard_cv_resume_actionValue): ?>
				                <div class="vcard-cv-resume-action" id="<?php echo esc_attr($vcard_cv_resume_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vcard_cv_resume_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vcard_cv_resume_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vcard_cv_resume_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vcard-cv-resume'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vcard_cv_resume_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vcard-cv-resume' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('If you are looking to set up a Vcard for your business or want to create an online resume for your profession, what could be better than starting with a quality Free CV Resume WordPress Theme. With its stunningly professional design, you can give a meaningful presentation to Business. As our developers know very well how to make your content pop, there you will find the different content elements accompanied by a responsive and retina-ready design for a stunning display of all your services. As there is a professional design, your potential clients and customers are bound to appreciate the work displayed over the well-designed template powered by strong and secure HTML codes. On top of it, developers have also considered your SEO demands well in advance. That is why, you will see the H1, H2,…..tags included for better search engine ranks. Overall, it is a responsive and user-friendly theme that doesn’t demand any coding skills.','vcard-cv-resume'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vcard-cv-resume' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vcard-cv-resume' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VCARD_CV_RESUME_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vcard-cv-resume' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vcard-cv-resume'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vcard-cv-resume'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vcard-cv-resume'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vcard-cv-resume'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vcard-cv-resume'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VCARD_CV_RESUME_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vcard-cv-resume'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vcard-cv-resume'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vcard-cv-resume'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VCARD_CV_RESUME_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vcard-cv-resume'); ?></a>
					</div>
					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vcard-cv-resume' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vcard-cv-resume'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vcard_cv_resume_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vcard-cv-resume'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vcard_cv_resume_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vcard-cv-resume'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vcard_cv_resume_services') ); ?>" target="_blank"><?php esc_html_e('Services Section','vcard-cv-resume'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vcard-cv-resume'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vcard-cv-resume'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vcard_cv_resume_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vcard-cv-resume'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vcard_cv_resume_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vcard-cv-resume'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vcard-cv-resume'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vcard-cv-resume'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vcard-cv-resume'); ?></span><?php esc_html_e(' Go to ','vcard-cv-resume'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vcard-cv-resume'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vcard-cv-resume'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vcard-cv-resume'); ?></span><?php esc_html_e(' Go to ','vcard-cv-resume'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vcard-cv-resume'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vcard-cv-resume'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','vcard-cv-resume'); ?> <a class="doc-links" href="<?php echo esc_url( VCARD_CV_RESUME_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','vcard-cv-resume'); ?></a></p>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Vcard_CV_Resume_Plugin_Activation_Settings::get_instance();
			$vcard_cv_resume_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vcard-cv-resume-recommended-plugins">
				    <div class="vcard-cv-resume-action-list">
				        <?php if ($vcard_cv_resume_actions): foreach ($vcard_cv_resume_actions as $key => $vcard_cv_resume_actionValue): ?>
				                <div class="vcard-cv-resume-action" id="<?php echo esc_attr($vcard_cv_resume_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vcard_cv_resume_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vcard_cv_resume_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vcard_cv_resume_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vcard-cv-resume'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vcard_cv_resume_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vcard-cv-resume' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vcard-cv-resume'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','vcard-cv-resume'); ?></span></b></p>
	              	<div class="vcard-cv-resume-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vcard-cv-resume'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

              	<div class="block-pattern-link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'vcard-cv-resume' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vcard-cv-resume'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vcard_cv_resume_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vcard-cv-resume'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vcard-cv-resume'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vcard_cv_resume_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vcard-cv-resume'); ?></a>
							</div>
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vcard_cv_resume_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vcard-cv-resume'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vcard-cv-resume'); ?></a>
							</div> 
						</div>
					</div>
				</div>
					
	        </div>
		</div>
		
		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Vcard_CV_Resume_Plugin_Activation_Settings::get_instance();
			$vcard_cv_resume_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vcard-cv-resume-recommended-plugins">
				    <div class="vcard-cv-resume-action-list">
				        <?php if ($vcard_cv_resume_actions): foreach ($vcard_cv_resume_actions as $key => $vcard_cv_resume_actionValue): ?>
				                <div class="vcard-cv-resume-action" id="<?php echo esc_attr($vcard_cv_resume_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vcard_cv_resume_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vcard_cv_resume_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vcard_cv_resume_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutenberg Blocks', 'vcard-cv-resume' ); ?></h3>
				<hr class="h3hr">
				<div class="vcard-cv-resume-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vcard-cv-resume'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'vcard-cv-resume' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vcard-cv-resume'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vcard_cv_resume_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vcard-cv-resume'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vcard-cv-resume'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vcard_cv_resume_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vcard-cv-resume'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vcard_cv_resume_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vcard-cv-resume'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vcard-cv-resume'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = Vcard_CV_Resume_Plugin_Activation_Woo_Products::get_instance();
				$vcard_cv_resume_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vcard-cv-resume-recommended-plugins">
					    <div class="vcard-cv-resume-action-list">
					        <?php if ($vcard_cv_resume_actions): foreach ($vcard_cv_resume_actions as $key => $vcard_cv_resume_actionValue): ?>
					                <div class="vcard-cv-resume-action" id="<?php echo esc_attr($vcard_cv_resume_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($vcard_cv_resume_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($vcard_cv_resume_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($vcard_cv_resume_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'vcard-cv-resume' ); ?></h3>
				<hr class="h3hr">
				<div class="vcard-cv-resume-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','vcard-cv-resume'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','vcard-cv-resume'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','vcard-cv-resume'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','vcard-cv-resume'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','vcard-cv-resume'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','vcard-cv-resume'); ?></span></b></p>
	              	<div class="vcard-cv-resume-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','vcard-cv-resume'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','vcard-cv-resume'); ?></span></p>
			    </div>
			<?php } ?>
		</div>

		<div id="pro_theme" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vcard-cv-resume' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Want a new job or make more clients land on your page? Creating a resume or CV site will do wonders and for such sites, CV Resume WordPress Theme will be an ideal match. Building such a website is no more a tough task since the theme layout built has ready to go demo to get you started within minutes. The unique homepage designs and enticing slider catch the attention by picturing your image on the page and highlighting your profession and business in the most innovative way. WP CV Resume WordPress Theme has got a retina-ready design following a joyful concept making all the pictures and images displayed on your site stand out. This theme is packed in all senses which means you will enjoy working with the range of page templates and other customization options provided accompanied by modern page building tools. Giving much attention to easy navigation, developers have provided it with simple menus and a sticky header.','vcard-cv-resume'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VCARD_CV_RESUME_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vcard-cv-resume'); ?></a>
					<a href="<?php echo esc_url( VCARD_CV_RESUME_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vcard-cv-resume'); ?></a>
					<a href="<?php echo esc_url( VCARD_CV_RESUME_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vcard-cv-resume'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vcard-cv-resume' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vcard-cv-resume'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vcard-cv-resume'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vcard-cv-resume'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vcard-cv-resume'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vcard-cv-resume'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><?php esc_html_e('13', 'vcard-cv-resume'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vcard-cv-resume'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vcard-cv-resume'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vcard-cv-resume'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vcard-cv-resume'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vcard-cv-resume'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vcard-cv-resume'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vcard-cv-resume'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VCARD_CV_RESUME_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vcard-cv-resume'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="lite_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vcard-cv-resume'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vcard-cv-resume'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VCARD_CV_RESUME_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vcard-cv-resume'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vcard-cv-resume'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vcard-cv-resume'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VCARD_CV_RESUME_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vcard-cv-resume'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vcard-cv-resume'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vcard-cv-resume'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VCARD_CV_RESUME_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vcard-cv-resume'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vcard-cv-resume'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vcard-cv-resume'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VCARD_CV_RESUME_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vcard-cv-resume'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vcard-cv-resume'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vcard-cv-resume'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VCARD_CV_RESUME_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vcard-cv-resume'); ?></a>
				</div>
		  	</div>
		</div>

	</div>
</div>

<?php } ?>