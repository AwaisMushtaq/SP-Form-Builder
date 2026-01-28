<?php 

	wp_enqueue_style( ['wp-jquery-ui-dialog', 'sp-fb-admin-style'] );
	wp_enqueue_script( ['jquery-ui-draggable', 'jquery-ui-droppable', 'jquery-ui-sortable' ] );

?>

<div class="sp-add-form">
	<h1> <?php echo esc_html__( 'Add New Form', 'sp-fb' ) ?> </h1>
	<div class="flex-row">
		<div class="flex-col-8">
			<div id="sp-form-canvas">
				<p class="placeholder">Drag fields here</p>
			</div>
		</div>
		<div class="flex-col-4">
			<div class="sp-feilds-tray">
				<div class="sp-field-item" data-type="text">
					<img width="48" height="48" src="<?php echo SP_FB_URL ?>/assets/admin/img/tray-fields/text.png" alt="text-field" />
					<span> <?php echo esc_html__( 'Text', 'sp-fb' ) ?> </span>
				</div>
				<div class="sp-field-item">
					<img width="48" height="48" src="<?php echo SP_FB_URL ?>/assets/admin/img/tray-fields/mail.png" alt="text-field" />
					<span> <?php echo esc_html__( 'Email', 'sp-fb' ) ?> </span>
				</div>
			</div>
		</div>
	</div>
</div>