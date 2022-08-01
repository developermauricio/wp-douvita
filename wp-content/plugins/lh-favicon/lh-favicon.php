<?php
/**
 * Plugin Name: LH Favicon
 * Plugin URI:  https://lhero.org/portfolio/lh-favicon/
 * Description: Set a favicon that is different than the generic wordpress site icon
 * Version:     1.02
 * Author:      Peter Shaw
 * Author URI:  https://shawfactor.com
 */
 
 if (!class_exists('LH_Favicon_plugin')) {


class LH_Favicon_plugin {
    
    private static $instance;
    
static function return_plugin_namespace(){

    return 'lh_favicon';

    }
    
static function plugin_name(){
    
    return 'LH Favicon';
    
    
}
    
static function return_file_name(){

return plugin_basename( __FILE__ );

}

static function return_generic_favicon_url_name(){

return 'lh_favicon-generic-favicon_url';    
    
}

static function return_svg_favicon_url_name(){

return 'lh_favicon-svg-favicon_url';    
    
}
    

static function isValidURL($url){ 

return (bool)parse_url($url);
}
    

static function maybe_return_generic_favicon_url(){
    
 $generic_favicon_url = get_option(self::return_generic_favicon_url_name());
 


        
        if (!empty($generic_favicon_url) && self::isValidURL($generic_favicon_url)){
            
            return  $generic_favicon_url;
            
        } else {
            
            return false;
            
        }
    
    
    
}


static function maybe_return_svg_favicon_url(){
    
 $svg_favicon_url = get_option(self::return_svg_favicon_url_name());




            
if (!empty($svg_favicon_url) && self::isValidURL($svg_favicon_url)){
            
     return  $svg_favicon_url;
            
        } else {
            
            return false;
            
        }
    
    
    
}




public function add_customizer_support( $wp_customize ) {
  
    // Add Settings
    $wp_customize->add_setting(self::return_generic_favicon_url_name(), array(
        'transport'         => 'refresh',
        'type' => 'option',
    ));
    
        // Add Settings
    $wp_customize->add_setting(self::return_svg_favicon_url_name(), array(
        'transport'         => 'refresh',
        'type' => 'option',
    ));
  
    // Add Section
    $wp_customize->add_section(self::return_plugin_namespace().'_section', array(
        'title'             => __('Favicons', self::return_plugin_namespace()), 
        'priority'          => 70,
    ));    
  
    // Add Controls
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, self::return_generic_favicon_url_name(), array(
        'label'             => __('Generic Favicon', self::return_plugin_namespace()),
        'section'           => self::return_plugin_namespace().'_section',
        'settings'          => self::return_generic_favicon_url_name(),    
    )));
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, self::return_svg_favicon_url_name(), array(
        'label'             => __('SVG Favicon', self::return_plugin_namespace()),
        'section'           => self::return_plugin_namespace().'_section',
        'settings'          => self::return_svg_favicon_url_name(),    
    )));
}







public function remove_metatags($meta_tags) {
    
            
        
 
    
    
    if (self::maybe_return_generic_favicon_url() && !is_network_admin() && !is_admin()) {
 $return = array();
 
 foreach( $meta_tags as $meta_tag ) {
     
     if (strpos($meta_tag, 'icon') !== false) {
         
     } else {
         
      $return[] = $meta_tag;  
         
     }
     
     }
     
     return $return;
     
    } else {
        
        
     return $meta_tags;   
        
    }
}


public function maybe_add_icon_links(){
    
    if ( !is_admin() && !is_network_admin() ) {
        
        if (($svg_attachment_url = self::maybe_return_svg_favicon_url()) && ($favicon_attachment_url = self::maybe_return_generic_favicon_url())){
            
        echo "\n\n<!-- begin LH Favicon output -->\n";
         echo "<link rel=\"icon\" href=\"".$svg_attachment_url."\" />\n";
        echo "<link rel=\"alternate icon\" href=\"".$favicon_attachment_url."\" />\n";
        echo "<!-- end LH Favicon output -->\n\n";
        
        
        } elseif ($favicon_attachment_url = self::maybe_return_generic_favicon_url()){
        
        echo "\n\n<!-- begin LH Favicon output -->\n";
        echo "<link rel=\"icon\" href=\"".$favicon_attachment_url."\" />\n";
        echo "<!-- end LH Favicon output -->\n\n";
        
        }
        
    }
    
    
    
}


public function maybe_redirect_to_favicon(){
    
    


    
    if ( !is_admin() && !is_network_admin() ) {
        
        
        
        if ($favicon_attachment_url = self::maybe_return_generic_favicon_url()){
            
        
        wp_redirect($favicon_attachment_url, 301,  self::plugin_name()); exit();

            
            
        }
        
        
    }
    
    
    
}




    public function plugin_init(){
        
        
        //add settings of favicon to customizer
        add_action('customize_register', array($this,'add_customizer_support'),10,1);
        
        
      //remove redundant theme meta tags
        add_filter('site_icon_meta_tags', array($this,'remove_metatags'));
        
        //maybe add the link icon meta data
        add_action( 'wp_head', array($this,'maybe_add_icon_links'));
        add_action( 'embed_head', array($this,'maybe_add_icon_links'));
        
        //maybe redirect to the favicon we have set (this does not seem to work but I've built a fallback)
        add_action( 'do_faviconico', array($this,'maybe_redirect_to_favicon'),5 );
            
        
        
        
    }
    
    
        
              /**
     * Gets an instance of our plugin.
     *
     * using the singleton pattern
     */
    public static function get_instance(){
        if (null === self::$instance) {
            self::$instance = new self();
        }
 
        return self::$instance;
    }
    
        public function __construct() {
            
            
    /* Initialize the plugin */       
 add_action( 'plugins_loaded', array($this,'plugin_init'),11);
            

            
        }
    
    
}

$lh_favicon_instance = LH_Favicon_plugin::get_instance();

}



 
 ?>