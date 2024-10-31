<?php

class sokhanak_random_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'sokhanak_random_widget',
			__('Sokhanak: Random Quote', 'sokhanak'),
			array(
			'classname' => 'sokhanak-random-widget', 
			'description' => __('Random Quote', 'sokhanak')
			)
		);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;
		echo $before_title.$title.$after_title;
?>
	<!-- embed widgets [sokhanak.com] -->
	<script type="text/javascript">
	var sokhanak_embed = sokhanak_embed || []; 
	sokhanak_embed['id'] = 0; 
	sokhanak_embed['lang'] = 'fa_IR'; 
	sokhanak_embed['type'] = 'random'; 
	sokhanak_embed['profiles'] = ''; 
	sokhanak_embed['categories'] = ''; 
	sokhanak_embed['background_color'] = '<?php echo $instance['sokhanak_bgcolor']; ?>'; 
	sokhanak_embed['text_color'] = '<?php echo $instance['sokhanak_tcolor']; ?>'; 
	sokhanak_embed['border_color'] = '<?php echo $instance['sokhanak_bcolor']; ?>'; 
	sokhanak_embed['border'] = '<?php echo $instance['sokhanak_border']; ?>'; 
	sokhanak_embed['photo'] = '<?php echo $instance['sokhanak_photo']; ?>'; 
	sokhanak_embed['loading'] = '<?php echo $instance['sokhanak_loading']; ?>'; 
	sokhanak_embed['paragraph'] = '<?php echo $instance['sokhanak_paragraph']; ?>'; 
	sokhanak_embed['padding'] = '<?php echo $instance['sokhanak_padding']; ?>'; 
	</script>
	<script type="text/javascript" src="//platform.sokhanak.com/js/embed.js"></script>
	<!-- /embed widgets [sokhanak.com] -->
<?php 
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$new_instance['title'] = strip_tags($new_instance['title']);
		$new_instance['sokhanak_bgcolor'] = $new_instance['sokhanak_bgcolor'];
		$new_instance['sokhanak_tcolor'] = $new_instance['sokhanak_tcolor'];
		$new_instance['sokhanak_bcolor'] = $new_instance['sokhanak_bcolor'];
		$new_instance['sokhanak_border'] = $new_instance['sokhanak_border'];
		$new_instance['sokhanak_photo'] = $new_instance['sokhanak_photo'];
		$new_instance['sokhanak_loading'] = $new_instance['sokhanak_loading'];
		$new_instance['sokhanak_paragraph'] = $new_instance['sokhanak_paragraph'];
		$new_instance['sokhanak_padding'] = $new_instance['sokhanak_padding'];
		return $new_instance;
	}

	function form($instance) {
				
		//show widget form in admin panel
		$default_settings = array(
		  'title' => __('Random Quote', 'sokhanak'),
		  'sokhanak_bgcolor' => '#ffffff',
		  'sokhanak_tcolor' => '#5b5b5b',
		  'sokhanak_bcolor' => '#dddddd',
		  'sokhanak_border' => '0',
		  'sokhanak_photo' => 'rounded',
		  'sokhanak_loading' => 'true',
		  'sokhanak_paragraph' => 'true',
		  'sokhanak_padding' => '15',
		  );
		$instance = wp_parse_args(
		  (array) $instance,
		  $default_settings
		  );
		$title = $instance['title'];
		$sokhanak_bgcolor = $instance['sokhanak_bgcolor'];
		$sokhanak_tcolor = $instance['sokhanak_tcolor'];
		$sokhanak_bcolor = $instance['sokhanak_bcolor'];
		$sokhanak_border = $instance['sokhanak_border'];
		$sokhanak_photo = $instance['sokhanak_photo'];
		$sokhanak_loading = $instance['sokhanak_loading'];
		$sokhanak_paragraph = $instance['sokhanak_paragraph'];
		$sokhanak_padding = $instance['sokhanak_padding'];

		?>
<script type="text/javascript">
    jQuery(document).ready(function($) {

    $('#widgets-right .color-picker, .inactive-sidebar .color-picker').wpColorPicker();

    // Executes wpColorPicker function after AJAX is fired on saving the widget
    $(document).ajaxComplete(function() {
        $('#widgets-right .color-picker, .inactive-sidebar .color-picker').wpColorPicker();
    });
});
</script>
		<p>
			<label for="<?php echo $this->get_field_name('title') ?>"><?php echo __('Name', 'sokhanak'); ?>:</label>
			<input class="widefat" name="<?php echo $this->get_field_name('title') ?>" type="text" value="<?php echo esc_attr($title)?>"/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name('sokhanak_bgcolor') ?>"><?php echo __('Background color', 'sokhanak'); ?>:</label><br>
			<input class="widefat color-picker" dir="ltr" name="<?php echo $this->get_field_name('sokhanak_bgcolor') ?>" type="text" value="<?php echo esc_attr($sokhanak_bgcolor)?>"/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name('sokhanak_tcolor') ?>"><?php echo __('Text color', 'sokhanak'); ?>:</label><br>
			<input class="widefat color-picker" dir="ltr" name="<?php echo $this->get_field_name('sokhanak_tcolor') ?>" type="text" value="<?php echo esc_attr($sokhanak_tcolor)?>"/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name('sokhanak_bcolor') ?>"><?php echo __('Border color', 'sokhanak'); ?>:</label><br>
			<input class="widefat color-picker" dir="ltr" name="<?php echo $this->get_field_name('sokhanak_bcolor') ?>" type="text" value="<?php echo esc_attr($sokhanak_bcolor)?>"/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name('sokhanak_border') ?>"><?php echo __('Border', 'sokhanak'); ?>:</label>
			<input class="widefat" dir="ltr" name="<?php echo $this->get_field_name('sokhanak_border') ?>" type="text" value="<?php echo esc_attr($sokhanak_border)?>"/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name('sokhanak_padding') ?>"><?php echo __('Padding', 'sokhanak'); ?>:</label>
			<input class="widefat" dir="ltr" name="<?php echo $this->get_field_name('sokhanak_padding') ?>" type="text" value="<?php echo esc_attr($sokhanak_padding)?>"/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name('sokhanak_paragraph') ?>"><?php echo __('Paragraph', 'sokhanak'); ?>:</label>
			<select class="widefat" id="<?php echo $this->get_field_name('sokhanak_paragraph') ?>" name="<?php echo $this->get_field_name('sokhanak_paragraph') ?>">
				<option value='true'<?php echo ( esc_attr($sokhanak_paragraph) == 'true' ? ' selected' : '' ); ?>><?php echo __('Yes', 'sokhanak'); ?></option>
				<option value='false'<?php echo ( esc_attr($sokhanak_paragraph) == 'false' ? ' selected' : ''); ?>><?php echo __('No', 'sokhanak'); ?></option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name('sokhanak_photo') ?>"><?php echo __('Photo', 'sokhanak'); ?>:</label>
			<select class="widefat" id="<?php echo $this->get_field_name('sokhanak_photo') ?>" name="<?php echo $this->get_field_name('sokhanak_photo') ?>">
				<option value='rounded'<?php echo ( esc_attr($sokhanak_photo) == 'rounded' ? ' selected' : ( esc_attr($sokhanak_photo) == 'circle' OR esc_attr($sokhanak_photo) == 'false' ) ? '' : ' selected' ); ?>><?php echo __('Rounded', 'sokhanak'); ?></option>
				<option value='circle'<?php echo ( esc_attr($sokhanak_photo) == 'circle' ? ' selected' : ''); ?>><?php echo __('Circle', 'sokhanak'); ?></option>
				<option value='false'<?php echo ( esc_attr($sokhanak_photo) == 'false' ? ' selected' : ''); ?>><?php echo __('No', 'sokhanak'); ?></option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name('sokhanak_loading') ?>"><?php echo __('Loading', 'sokhanak'); ?>:</label>
			<select class="widefat" dir="ltr" id="<?php echo $this->get_field_name('sokhanak_loading') ?>" name="<?php echo $this->get_field_name('sokhanak_loading') ?>">
				<option value='true'<?php echo ( esc_attr($sokhanak_loading) == 'true' ? ' selected' : ( esc_attr($sokhanak_loading) == '2') ? '' : ' selected' ); ?>><?php echo __('Yes', 'sokhanak'); ?></option>
				<option value='false' <?php echo ( esc_attr($sokhanak_loading) == 'false' ? ' selected' : ''); ?>><?php echo __('No', 'sokhanak'); ?></option>
			</select>
		</p>
		<?php
	}
}

class sokhanak_today_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'sokhanak_today_widget',
			__('Sokhanak: Today Quote', 'sokhanak'),
			array(
			'classname' => 'sokhanak-todayt-widget', 
			'description' => __('Today Quote', 'sokhanak')
			)
		);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;
		echo $before_title.$title.$after_title;
?>
	<!-- embed widgets [sokhanak.com] -->
	<script type="text/javascript">
	var sokhanak_embed = sokhanak_embed || []; 
	sokhanak_embed['id'] = 0; 
	sokhanak_embed['lang'] = 'fa_IR'; 
	sokhanak_embed['type'] = 'today'; 
	sokhanak_embed['profiles'] = ''; 
	sokhanak_embed['categories'] = ''; 
	sokhanak_embed['background_color'] = '<?php echo $instance['sokhanak_bgcolor']; ?>'; 
	sokhanak_embed['text_color'] = '<?php echo $instance['sokhanak_tcolor']; ?>'; 
	sokhanak_embed['border_color'] = '<?php echo $instance['sokhanak_bcolor']; ?>'; 
	sokhanak_embed['border'] = '<?php echo $instance['sokhanak_border']; ?>'; 
	sokhanak_embed['photo'] = '<?php echo $instance['sokhanak_photo']; ?>'; 
	sokhanak_embed['loading'] = '<?php echo $instance['sokhanak_loading']; ?>'; 
	sokhanak_embed['paragraph'] = '<?php echo $instance['sokhanak_paragraph']; ?>'; 
	sokhanak_embed['padding'] = '<?php echo $instance['sokhanak_padding']; ?>'; 
	</script>
	<script type="text/javascript" src="//platform.sokhanak.com/js/embed.js"></script>
	<!-- /embed widgets [sokhanak.com] -->
<?php 
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$new_instance['title'] = strip_tags($new_instance['title']);
		$new_instance['sokhanak_bgcolor'] = $new_instance['sokhanak_bgcolor'];
		$new_instance['sokhanak_tcolor'] = $new_instance['sokhanak_tcolor'];
		$new_instance['sokhanak_bcolor'] = $new_instance['sokhanak_bcolor'];
		$new_instance['sokhanak_border'] = $new_instance['sokhanak_border'];
		$new_instance['sokhanak_photo'] = $new_instance['sokhanak_photo'];
		$new_instance['sokhanak_loading'] = $new_instance['sokhanak_loading'];
		$new_instance['sokhanak_paragraph'] = $new_instance['sokhanak_paragraph'];
		$new_instance['sokhanak_padding'] = $new_instance['sokhanak_padding'];
		return $new_instance;
	}

	function form($instance) {
				
		//show widget form in admin panel
		$default_settings = array(
		  'title' => __('Today Quote', 'sokhanak'),
		  'sokhanak_bgcolor' => '#ffffff',
		  'sokhanak_tcolor' => '#5b5b5b',
		  'sokhanak_bcolor' => '#dddddd',
		  'sokhanak_border' => '0',
		  'sokhanak_photo' => 'rounded',
		  'sokhanak_loading' => 'true',
		  'sokhanak_paragraph' => 'true',
		  'sokhanak_padding' => '15',
		  );
		$instance = wp_parse_args(
		  (array) $instance,
		  $default_settings
		  );
		$title = $instance['title'];
		$sokhanak_bgcolor = $instance['sokhanak_bgcolor'];
		$sokhanak_tcolor = $instance['sokhanak_tcolor'];
		$sokhanak_bcolor = $instance['sokhanak_bcolor'];
		$sokhanak_border = $instance['sokhanak_border'];
		$sokhanak_photo = $instance['sokhanak_photo'];
		$sokhanak_loading = $instance['sokhanak_loading'];
		$sokhanak_paragraph = $instance['sokhanak_paragraph'];
		$sokhanak_padding = $instance['sokhanak_padding'];
		?>
<script type="text/javascript">
    jQuery(document).ready(function($) {

    $('#widgets-right .color-picker, .inactive-sidebar .color-picker').wpColorPicker();

    // Executes wpColorPicker function after AJAX is fired on saving the widget
    $(document).ajaxComplete(function() {
        $('#widgets-right .color-picker, .inactive-sidebar .color-picker').wpColorPicker();
    });
});
</script>
		<p>
			<label for="<?php echo $this->get_field_name('title') ?>"><?php echo __('Name', 'sokhanak'); ?>:</label>
			<input class="widefat" name="<?php echo $this->get_field_name('title') ?>" type="text" value="<?php echo esc_attr($title)?>"/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name('sokhanak_bgcolor') ?>"><?php echo __('Background color', 'sokhanak'); ?>:</label><br>
			<input class="widefat color-picker" dir="ltr" name="<?php echo $this->get_field_name('sokhanak_bgcolor') ?>" type="text" value="<?php echo esc_attr($sokhanak_bgcolor)?>"/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name('sokhanak_tcolor') ?>"><?php echo __('Text color', 'sokhanak'); ?>:</label><br>
			<input class="widefat color-picker" dir="ltr" name="<?php echo $this->get_field_name('sokhanak_tcolor') ?>" type="text" value="<?php echo esc_attr($sokhanak_tcolor)?>"/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name('sokhanak_bcolor') ?>"><?php echo __('Border color', 'sokhanak'); ?>:</label><br>
			<input class="widefat color-picker" dir="ltr" name="<?php echo $this->get_field_name('sokhanak_bcolor') ?>" type="text" value="<?php echo esc_attr($sokhanak_bcolor)?>"/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name('sokhanak_border') ?>"><?php echo __('Border', 'sokhanak'); ?>:</label>
			<input class="widefat" dir="ltr" name="<?php echo $this->get_field_name('sokhanak_border') ?>" type="text" value="<?php echo esc_attr($sokhanak_border)?>"/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name('sokhanak_padding') ?>"><?php echo __('Padding', 'sokhanak'); ?>:</label>
			<input class="widefat" dir="ltr" name="<?php echo $this->get_field_name('sokhanak_padding') ?>" type="text" value="<?php echo esc_attr($sokhanak_padding)?>"/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name('sokhanak_paragraph') ?>"><?php echo __('Paragraph', 'sokhanak'); ?>:</label>
			<select class="widefat" id="<?php echo $this->get_field_name('sokhanak_paragraph') ?>" name="<?php echo $this->get_field_name('sokhanak_paragraph') ?>">
				<option value='true'<?php echo ( esc_attr($sokhanak_paragraph) == 'true' ? ' selected' : '' ); ?>><?php echo __('Yes', 'sokhanak'); ?></option>
				<option value='false'<?php echo ( esc_attr($sokhanak_paragraph) == 'false' ? ' selected' : ''); ?>><?php echo __('No', 'sokhanak'); ?></option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name('sokhanak_photo') ?>"><?php echo __('Photo', 'sokhanak'); ?>:</label>
			<select class="widefat" id="<?php echo $this->get_field_name('sokhanak_photo') ?>" name="<?php echo $this->get_field_name('sokhanak_photo') ?>">
				<option value='rounded'<?php echo ( esc_attr($sokhanak_photo) == 'rounded' ? ' selected' : ( esc_attr($sokhanak_photo) == 'circle' OR esc_attr($sokhanak_photo) == 'false' ) ? '' : ' selected' ); ?>><?php echo __('Rounded', 'sokhanak'); ?></option>
				<option value='circle'<?php echo ( esc_attr($sokhanak_photo) == 'circle' ? ' selected' : ''); ?>><?php echo __('Circle', 'sokhanak'); ?></option>
				<option value='false'<?php echo ( esc_attr($sokhanak_photo) == 'false' ? ' selected' : ''); ?>><?php echo __('No', 'sokhanak'); ?></option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_name('sokhanak_loading') ?>"><?php echo __('Loading', 'sokhanak'); ?>:</label>
			<select class="widefat" dir="ltr" id="<?php echo $this->get_field_name('sokhanak_loading') ?>" name="<?php echo $this->get_field_name('sokhanak_loading') ?>">
				<option value='true'<?php echo ( esc_attr($sokhanak_loading) == 'true' ? ' selected' : ( esc_attr($sokhanak_loading) == '2') ? '' : ' selected' ); ?>><?php echo __('Yes', 'sokhanak'); ?></option>
				<option value='false' <?php echo ( esc_attr($sokhanak_loading) == 'false' ? ' selected' : ''); ?>><?php echo __('No', 'sokhanak'); ?></option>
			</select>
		</p>
		<?php
	}
}
