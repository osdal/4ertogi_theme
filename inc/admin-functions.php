<?php 
add_action('admin_menu', 'add_admin_page_setting_page');

function add_admin_page_setting_page(){
	$hook_suffix = add_menu_page( 'Страница настроек', 
											'Мои настройки', 
											'edit_others_posts', 
											'page-options', 
											'create_settings_options_page',
											'');
						add_submenu_page(	
							'page-options',//Название (slug) родительского меню в которое будет добавлен пункт или название файла админ-страницы WordPress.
							'Настройки главной страницы',//Текст, который будет использован в теге title на странице.
							'Настройки главной', //Текст, который будет использован как название пункта меню
							'edit_others_posts', //Возможность пользователя, чтобы иметь доступ к меню.
							'frontpage-options', //Уникальное название (slug), по которому затем можно обращаться к этому меню.
							'create_frontpage_options', //Название функции которая будет вызваться, чтобы вывести контент создаваемой страницы
							'dashicons-admin-generic' );//Иконка

}

add_action('admin_init', 'custom_settings');

function custom_settings(){
	//Регистрирует новую опцию и callback функцию для обработки значения опции при её сохранении в БД.
	register_setting(  'frontpage_group',/*Название группы, к которой будет принадлежать опция. 
														Это название должно совпадать с названием группы в функции settings_fields().*/
	 						  'title_frontpage' );//Название опции, которая будет сохраняться в БД.

	add_settings_section('frontpage_group_section',/*Идентификатор секции, по которому нужно "цеплять" поля к секции. 
																	Строка, которая будет использована для id атрибутов тегов.*/
								'Текстовые настройки',//Заголовок секции.
								'',//Коллбэк (функция), которая заполняет секцию описанием. Вызывается перед выводом полей.
								'frontpage-options');//Страница на которой выводить секцию.

	
	//Создает поле опции для указанной секции (указанного блока настроек).
	add_settings_field( 'field_title_frontpage', /*Ярлык (slug) опции, используется как идентификатор поля. 
																Используется в ID атрибуте тега.*/
								'Заголовок главной страницы', //Название поля.
								'frontpage_title_field', /*Название функции обратного вызова. Функция должна заполнять поле нужным <input> тегом, который станет частью одной большой формы.
																	Атрибут nameдолжен быть равен параметру $option_name из register_setting().
																	Атрибут idобычно равен параметру $id.
																	Результат должен сразу выводиться на экран (echo).*/
								'frontpage-options',//Страница меню в которую будет добавлено поле.  
								'frontpage_group_section',//Название секции настроек, в которую будет добавлено поле. 
								array('label_for' => 'field_title_frontpage'));/*Дополнительные параметры, 
																								которые нужно передать callback функции. 
																								label_for - Строка. Если указать, то заголовок настройки будет обернут тегом 
																								<label for="ЗНАЧЕНИЕ ПОЛЯ">*/
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