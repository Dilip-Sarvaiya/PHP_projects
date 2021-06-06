<?php
/**
 * Post/page Metabox.
 *
 * This is the template that includes metaboxes of Surplus Concert theme
 *
 * @package Surplus_Concert
 */
 
/**
 * Class to Renders and save metabox options
 *
 * @since 1.0.0
 */
class Surplus_Concert_MetaBox {
    private $meta_box;

    private $fields;

    /**
    * Constructor
    *
    * @since 1.0.0
    *
    * @access public
    *
    */
    public function __construct( $meta_box_id, $meta_box_title, $post_type ) {
        
        $this->meta_box = array (
            'id'        => $meta_box_id,
            'title'     => $meta_box_title,
            'post_type' => $post_type,
        );

        $this->fields = array(
            'sidebar_layout',
            'banner_option',
        );

        // Add metaboxes
        add_action( 'add_meta_boxes', array( $this, 'add' ) );
        
        add_action( 'save_post', array( $this, 'save' ) );  
    }

    /**
    * Add Meta Box for multiple post types.
    *
    * @since 1.0.0
    *
    * @access public
    */
    public function add($postType) {
        if( in_array( $postType, $this->meta_box['post_type'] ) ) {
            add_meta_box( $this->meta_box['id'], $this->meta_box['title'], array( $this, 'show' ), $postType );
        }
    }

    /**
    * Renders metabox
    *
    * @since 1.0.0
    *
    * @access public
    */
    public function show() {
        global $post;

        $layout_options = array(    
            'default-sidebar'=> array(
                'value'     => 'default-sidebar',
                'label'     => __( 'Default Sidebar', 'surplus-concert' ),
                'thumbnail' => get_template_directory_uri() . '/assets/images/default-sidebar.png'
            ),
            'left-sidebar' => array(
                'value'     => 'left-sidebar',
                'label'     => __( 'Left Sidebar', 'surplus-concert' ),
                'thumbnail' => get_template_directory_uri() . '/assets/images/left-sidebar.png'         
            ),
            'no-sidebar'     => array(
                'value'     => 'no-sidebar',
                'label'     => __( 'Full Width', 'surplus-concert' ),
                'thumbnail' => get_template_directory_uri() . '/assets/images/no-sidebar.png'
            ),    
            'right-sidebar' => array(
                'value'     => 'right-sidebar',
                'label'     => __( 'Right Sidebar', 'surplus-concert' ),
                'thumbnail' => get_template_directory_uri() . '/assets/images/right-sidebar.png'         
            ),
            'full-width'    => array(
                'value'     => 'full-width',
                'label'     => __( 'Full Width', 'surplus-concert' ),
                'thumbnail' => get_template_directory_uri() . '/assets/images/full-width.png'
            ),         
        );

        // Use nonce for verification  
        wp_nonce_field( basename( __FILE__ ), 'surplus_concert_custom_meta_box_nonce' );

        // Begin the field table and loop  ?>  
        <div id="surplus-concert-ui-tabs" class="ui-tabs">
            <ul class="surplus-concert-ui-tabs-nav" id="surplus-concert-ui-tabs-nav">
                <li><a href="#frag1"><?php esc_html_e( 'Sidebar Layout', 'surplus-concert' ); ?></a></li>
                <li><a href="#frag2"><?php esc_html_e( 'Banner Option', 'surplus-concert' ); ?></a></li>
            </ul> 
            
            <div id="frag1" class="metabox_tabhead">
                <table id="layout-options" class="form-table" width="100%">
                    <tbody>
                        <tr>
                           <?php  
                            $sidebar_layout = get_post_meta( $post->ID, 'sidebar_layout', true );
                            if ( empty( $sidebar_layout ) ){
                                $sidebar_layout = 'default-sidebar';
                            }
                            foreach( $layout_options as $field ){ ?>

                            <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                                <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="sidebar_layout" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $sidebar_layout ); if( empty( $sidebar_layout ) ){ checked( $field['value'], 'default-sidebar' ); }?>/>
                                <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                                    <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="<?php echo esc_attr( $field['value'] ); ?>" />
                                </label>
                            </div>
                            <?php } // end foreach ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="frag2" class="metabox_tabhead">
                <table id="banner-metabox" class="form-table" width="100%">
                    <tbody> 
                        <tr>
                            <?php
                            $banner_options  = array(
                                'header_image' => __( 'Header Image', 'surplus-concert' ),
                                'featured_image' => __( 'Featured Image', 'surplus-concert' ),
                            );
                            $meta_banner     = get_post_meta( $post->ID, 'banner_option', true );

                            if ( empty( $meta_banner ) ){
                                $meta_banner = 'header_image';
                            }?>

                            <select name="banner_option">
                            <?php 
                                foreach( $banner_options as $k => $v ){ ?>
                                    <option value="<?php echo esc_attr( $k ); ?>" <?php selected( $meta_banner, $k ); ?> ><?php echo esc_html( $v ); ?></option>
                                <?php }
                            ?>
                            </select>
                        </tr>
                    </tbody>
                </table>        
            </div>

        </div>
    <?php 
    }

    /**
     * Save custom metabox data
     * 
     * @action save_post
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function save( $post_id ) { 
    
        // Checks save status
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'surplus_concert_custom_meta_box_nonce' ] ) && wp_verify_nonce( $_POST[ 'surplus_concert_custom_meta_box_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

        // Exits script depending on save status
        if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
            return;
        }
      
        foreach ( $this->fields as $field ) {      
            // Checks for input and sanitizes/saves if needed
            if( isset( $_POST[ $field ] ) ) {
                update_post_meta( $post_id, $field, ( $_POST[ $field ] ) );
            }
        } // end foreach         
    }
}

$surplus_concert_metabox = new Surplus_Concert_MetaBox( 
    'surplus_concert_metabox',                  //metabox id
    esc_html__( 'Sidebar and Banner Options', 'surplus-concert' ), //metabox title
    array( 'page', 'post' )             //metabox post types
);

/**
 * Enqueue scripts and styles for Metaboxes
 * @uses wp_enqueue_script, and  wp_enqueue_style
 *
 * @since 1.0.0
 */
function surplus_concert_enqueue_metabox_scripts( $hook ) {
    // Use minified libraries if SCRIPT_DEBUG is turned off
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

    if( $hook == 'post.php' || $hook == 'post-new.php'  ){

        //Scripts
        wp_enqueue_script( 'surplus-concert-metabox', get_template_directory_uri() . '/js'. UNMINIFIED .'/metabox'. SUFFIX .'.js', array( 'jquery', 'jquery-ui-tabs' ), '2013-10-05' );
        //CSS Styles
        wp_enqueue_style( 'surplus-concert-metabox-tabs', get_template_directory_uri() . '/css/unminified/metabox-tabs.css' );
    }
    return;
}
add_action( 'admin_enqueue_scripts', 'surplus_concert_enqueue_metabox_scripts', 11 );