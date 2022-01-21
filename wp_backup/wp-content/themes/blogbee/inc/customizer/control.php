<?php 

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

class BlogBee_Dropdown_Chooser extends WP_Customize_Control{
	public $type = 'dropdown_chooser';

	public function render_content(){
		if ( empty( $this->choices ) )
                return;
		?>
            <label>
                <span class="customize-control-title">
                	<?php echo esc_html( $this->label ); ?>
                </span>

                <?php if($this->description){ ?>
	            <span class="description customize-control-description">
	            	<?php echo wp_kses_post($this->description); ?>
	            </span>
	            <?php } ?>

                <select class="blogbee-chosen-select" <?php $this->link(); ?>>
                    <?php
                    foreach ( $this->choices as $value => $label )
                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
                    ?>
                </select>
            </label>
		<?php
	}
}

//Custom control for horizontal line
Class BlogBee_Customize_Horizontal_Line extends WP_Customize_Control {
    public $type = 'hr';

    public function render_content() {
        ?>
        <div>
            <hr style="border: 2px solid #72777c;" />
        </div>
        <?php
    }
}
 ?>