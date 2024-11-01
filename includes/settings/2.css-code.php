<?php
/*
 * Page Name: CSS
 */

use WPCoder\Dashboard\Field;
use WPCoder\Dashboard\FolderManager;
use WPCoder\Dashboard\Option;

defined( 'ABSPATH' ) || exit;

$default = Field::getDefault();
$opt     = include( 'options/css-code.php' );

$css_link = '';
if ( ! empty( $default['css_code'] ) ) {
	$css_link = FolderManager::path_upload_url() . 'style-' . $default['id'] . '.css';
}

?>

    <h4>
        <span class="codericon codericon-filetype-css"></span>
		<?php esc_html_e( 'CSS Code', 'wp-coder' ); ?>
    </h4>

    <details class="details">
        <summary><?php esc_html_e( 'Settings', 'wp-coder' ); ?></summary>
        <div>
			<?php Option::init( [
				$opt['inline'],
				$opt['minified'],
			] ); ?>
        </div>
    </details>

    <details class="details">
        <summary>
			<?php esc_html_e( 'Navigation', 'wpcoderpro' ); ?>
            <div class="button-group alignright">
                <button class="button-editor button" id="cssnav">Add NAV Comment</button>
            </div>
        </summary>
        <div class="wowp-field">
            <ol id="cssNavigationMenu" class="wowp-php-nav-menu"></ol>
        </div>
    </details>


<?php Option::init( [ $opt['css_code'] ] ); ?>

    <div class="wowp-notification -warning">
        Please input just the CSS content, leaving out the <code>style</code> tag.
    </div>

<?php if ( ! empty( $css_link ) ): ?>
    <div class="wowp-fields-group has-mt">
        <div class="wowp-field is-full has-addon border-default">
            <label for="url-css-file" class="is-addon">
                <span class="dashicons dashicons-admin-links"></span>
            </label>
            <input type="url" id="url-css-file" readonly="readonly" value="<?php echo esc_url( $css_link ); ?>">
            <span class="label"><?php esc_html_e( 'URL to the CSS file', 'wp-coder' ); ?></span>
        </div>
    </div>

<?php endif;

