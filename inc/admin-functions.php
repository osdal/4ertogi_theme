<?php 
add_action('admin_menu', 'add_admin_page_setting_page');

function add_admin_page_setting_page(){
	$hook_suffix = add_menu_page( 'Страница настроек', 
											'Мои настройки', 
											'edit_others_posts', 
											'page-options', 'create_settings_options_page',
											'');
						add_submenu_page(	'page-options',
							'Настройки главной страницы', 
							'Настройки главной', 
							'edit_others_posts', 
							'frontpage-options', 
							'create_frontpage_options', 
							'dashicons-admin-generic' );

						}
add_action('admin_init', 'custom_settings');

function custom_settings(){
	register_setting( 'frontpage_group', 'title_frontpage' );

	add_settings_section( 'frontpage_group_section', 'Текстовые настройки', '', 'frontpage-options');

	add_settings_field( 'field_title_frontpage', 
								'Заголовок главной страницы', 
								'frontpage_title_field', 
								'frontpage-options', 
								'frontpage_group_section',
								array('label_for' => 'field_title_frontpage'));
}

function frontpage_title_field(){
	$content_title_fronpage = esc_attr(get_option('title_frontpage')) ;

echo 	'<input 	type="text" 
					name="title_frontpage" 
					class="regular-text" 
					id="field_title_frontpage"
					value="' . $content_title_fronpage .'">';
}

function create_settings_options_page(){
	require get_template_directory() . '/inc/templates/settings_options_page.php';	
}

function create_frontpage_options(){
	require get_template_directory() . '/inc/templates/frontpage_settings.php';
}

?>