<h1>Настройки главной страницы</h1>

<form action="options.php" method="post">
	<?php settings_fields( 'frontpage_group' ); ?>
	<?php do_settings_sections( 'frontpage-options' ); ?>

	<?php submit_button() ?>



</form>
