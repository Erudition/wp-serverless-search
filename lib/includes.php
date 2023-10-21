<?php

/**
 * Register Option Fields
 */

add_action( 'admin_init', 'register_sls_search_ext_settings' );
function register_sls_search_ext_settings() {
  register_setting( 'wp-sls-search-settings-group', 'wp_sls_search_form' );
  register_setting( 'wp-sls-search-settings-group', 'wp_sls_search_form_input' );
  register_setting( 'wp-sls-search-settings-group', 'wp_sls_search_post_type' );
}

/**
 * Create Options Page
 */

function wp_sls_search_options() { ?>
  <div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <h2>Created by <a style="color:#bc4e9c;" href="https://getshifter.io" target="_blank">Shifter</a></h2>
    <div class="card">
      <h2 class="title">Search Settings</h2>
      <p>Target class to activate the WP Serverless Search modal.</p>
      <form method="post" action="options.php">
          <?php settings_fields( 'wp-sls-search-settings-group' ); ?>
          <?php do_settings_sections( 'wp-sls-search-settings-group' ); ?>
          <table class="form-table">
            <tr valign="top">
              <th scope="row">Form Class:</th>
              <td>
                <p>Target class to trigger search modal on submit.</p>
                <input placeholder="[role=search]" name="wp_sls_search_form" type="text" aria-describedby="serverless-search-target-class" value="<?php echo get_option( 'wp_sls_search_form' ); ?>" class="regular-text code">
              </td>
            </tr>
            <tr valign="top">
              <th scope="row">Input Class:</th>
              <td>
                <p>Search input field to display results while typing.</p>
                <input placeholder="input[type=search]" name="wp_sls_search_form_input" type="text" aria-describedby="serverless-search-target-class" value="<?php echo get_option( 'wp_sls_search_form_input' ); ?>" class="regular-text code">
              </td>
            </tr>
            <tr valign="top">
              <th scope="row">Search Post types:</th>
              <td>
                <p>Type of posts to index. Accepts <a href="https://developer.wordpress.org/reference/functions/export_wp/#parameters" target="_blank">these possibilities</a>: 'all', 'post', 'page', 'attachment', or a defined custom post.</p>
                <input placeholder="post" name="wp_sls_search_post_type" type="text" aria-describedby="serverless-search-target-class" value="<?php echo get_option( 'wp_sls_search_post_type' ); ?>" class="regular-text code">
              </td>
            </tr>
          </table>
      <?php submit_button(); ?>
      </form>
    </div>
  </div>
<?php }
