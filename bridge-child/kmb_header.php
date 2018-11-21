<header id="kmb-header">
	<div class="container_inner">
		<div class="vertical-align">
			<div class="vertical-child">
				<div class="clearfix">
					<div class="toggle-mobile">
						<span>
							<span aria-hidden="true" class="qode_icon_font_elegant icon_menu"></span>
						</span>
					</div>
					<div class="logo col-left">
						<a href="<?php echo get_site_url(); ?>">
							<img src="<?php echo get_stylesheet_directory_uri() . '/images/logo-dark-2017.svg'; ?>" alt="Ryver" width="160" height="39" />
						</a>
					</div>
					<div class="user-actions col-right">
						<?php dynamic_sidebar( 'header_bottom_right') ; ?>
					</div>					
					<div class="kmb-search">
						<?php if(isset($qode_options_proya['enable_search']) && $qode_options_proya['enable_search'] == 'yes') {
							$search_type_class = 'search_slides_from_window_top';
							if(isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] !== '') {
								$search_type_class = $qode_options_proya['search_type'];
							}
							if(isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] == 'search_covers_header') {
								if (isset($qode_options_proya['search_cover_only_bottom_yesno']) && $qode_options_proya['search_cover_only_bottom_yesno']=='yes') {
									$search_type_class .= ' search_covers_only_bottom';
								}
							}
							?>
							<a class="search_button <?php echo esc_attr($search_type_class); ?> <?php echo esc_attr($header_button_size); ?>" href="javascript:void(0)">
								<?php $qodeIconCollections->getSearchIcon(qodef_option_get_value('search_icon_pack')); ?>
							</a>
				
							<?php if($search_type_class == 'fullscreen_search' && $fullscreen_search_animation=='from_circle'){ ?>
								<div class="fullscreen_search_overlay"></div>
							<?php } ?>
						<?php } ?>	
					</div>	
					<div class="menu col-mid">
						<?php
						wp_nav_menu( array( 'theme_location' => 'top-navigation' ,
							'container'  => '',
							'container_class' => '',
							'menu_class' => '',
							'menu_id' => '',
							'fallback_cb' => 'top_navigation_fallback',
							'link_before' => '<span>',
							'link_after' => '</span>',
							'walker' => new qode_type1_walker_nav_menu()
						));
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

					<!-- DAF START - ADDED BY DAPHNE TO ENABLE SEARCH ON CUSTOM HEADER -->
						<?php if(isset($qode_options_proya['enable_search']) && $qode_options_proya['enable_search'] == "yes"){ ?>
						
							<?php if(($header_color_transparency_per_page == '' || $header_color_transparency_per_page == '1') && isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] == "search_slides_from_header_bottom"){ ?>
								<form role="search" action="<?php echo esc_url(home_url('/')); ?>" class="qode_search_form_2" method="get">
									<?php if($header_in_grid){ ?>
									<div class="container">
										<div class="container_inner clearfix">
										<?php if($overlapping_content) {?><div class="overlapping_content_margin"><?php } ?>
										 <?php } ?>
											<div class="form_holder_outer">
												<div class="form_holder">
													<input type="text" placeholder="<?php _e('Search', 'qode'); ?>" name="s" class="qode_search_field" autocomplete="off" />
													<a class="qode_search_submit" href="javascript:void(0)">
														<?php $qodeIconCollections->getSearchIcon(qodef_option_get_value('search_icon_pack')); ?>
													</a>
												</div>
											</div>
											<?php if($header_in_grid){ ?>
											<?php if($overlapping_content) {?></div><?php } ?>
										</div>
									</div>
								<?php } ?>
								</form>

							<?php } else if(isset($qode_options_proya['search_type']) && $qode_options_proya['search_type'] == "search_covers_header") { ?>
								<form role="search" action="<?php echo esc_url(home_url('/')); ?>" class="qode_search_form_3" method="get">
										<?php if($header_in_grid){ ?>
										<div class="container">
											<div class="container_inner clearfix">
											<?php if($overlapping_content) {?><div class="overlapping_content_margin"><?php } ?>
										<?php } ?>
												<div class="form_holder_outer">
													<div class="form_holder">
														
														<input type="text" placeholder="<?php _e('Search', 'qode'); ?>" name="s" class="qode_search_field" autocomplete="off" />
														<div class="qode_search_close">
															<a href="#">
																<?php //$qodeIconCollections->getSearchClose(qodef_option_get_value('search_icon_pack')); ?>
																<img src="<?php echo get_stylesheet_directory_uri() . '/images/close-24px.svg'; ?>" alt="close" width="24" height="24" />
															</a>
														</div>
													</div>
												</div>
										<?php if($header_in_grid){ ?>
											<?php if($overlapping_content) {?></div><?php } ?>
											</div>
										</div>
										<?php } ?>
								</form>
							<?php } else { ?>
								<form role="search" id="searchform" action="<?php echo home_url('/'); ?>" class="qode_search_form" method="get">
									<?php if($header_in_grid){ ?>
										<div class="container">
										<div class="container_inner clearfix">
									<?php } ?>

									<?php $qodeIconCollections->getSearchIcon(qodef_option_get_value('search_icon_pack'), array('icon_attributes' => array('class' => 'qode_icon_in_search'))); ?>
									<input type="text" placeholder="<?php _e('Search', 'qode'); ?>" name="s" class="qode_search_field" autocomplete="off" />
									<input type="submit" value="Search" />

									<div class="qode_search_close">
										<a href="#">
											<?php $qodeIconCollections->getSearchClose(qodef_option_get_value('search_icon_pack'), array('icon_attributes' => array('class' => 'qode_icon_in_search'))); ?>
										</a>
									</div>
									<?php if($header_in_grid){ ?>
											</div>
										</div>
									<?php } ?>
								</form>
							<?php } ?>
							
						<?php } ?>
						<!-- DAF END - ADDED BY DAPHNE TO ENABLE SEARCH ON CUSTOM HEADER -->
					
</header>
