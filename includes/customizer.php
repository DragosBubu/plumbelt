<?php

function plumbelt_customizer( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

    /*
    ** Header Customizer
    */
    $wp_customize->add_section( 'plumbelt_header' , array(
    	'title'       => __( 'Header', 'ti' ),
    	'priority'    => 200,
	) );

		/* Header - Logo */
		$wp_customize->add_setting( 'ti_header_logo' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ti_header_logo', array(
		    'label'    => __( 'Logo:', 'ti' ),
		    'section'  => 'plumbelt_header',
		    'settings' => 'ti_header_logo',
		    'priority' => '1',
		) ) );

		/* Header - Contact Title */
		$wp_customize->add_setting( 'ti_header_contact_title' );
		$wp_customize->add_control( 'ti_header_contact_title', array(
		    'label'    => __( 'Contact - Title:', 'ti' ),
		    'section'  => 'plumbelt_header',
		    'settings' => 'ti_header_contact_title',
			'priority' => '2',
		) );

		/* Header - Contact Telephone */
		$wp_customize->add_setting( 'ti_header_contact_telephone' );
		$wp_customize->add_control( 'ti_header_contact_telephone', array(
		    'label'    => __( 'Contact - Telephone:', 'ti' ),
		    'section'  => 'plumbelt_header',
		    'settings' => 'ti_header_contact_telephone',
			'priority' => '3',
		) );

		/* Header - Facebook Link */
		$wp_customize->add_setting( 'ti_header_facebook_link' );
		$wp_customize->add_control( 'ti_header_facebook_link', array(
		    'label'    => __( 'Facebook - Link:', 'ti' ),
		    'section'  => 'plumbelt_header',
		    'settings' => 'ti_header_facebook_link',
			'priority' => '4',
		) );

		/* Header - Twitter Link */
		$wp_customize->add_setting( 'ti_header_twitter_link' );
		$wp_customize->add_control( 'ti_header_twitter_link', array(
		    'label'    => __( 'Twitter - Link:', 'ti' ),
		    'section'  => 'plumbelt_header',
		    'settings' => 'ti_header_twitter_link',
			'priority' => '5',
		) );

		/* Header - YouTube Link */
		$wp_customize->add_setting( 'ti_header_youtube_link' );
		$wp_customize->add_control( 'ti_header_youtube_link', array(
		    'label'    => __( 'YouTube - Link:', 'ti' ),
		    'section'  => 'plumbelt_header',
		    'settings' => 'ti_header_youtube_link',
			'priority' => '6',
		) );

	/*
    ** Subheader Customizer
    */
    $wp_customize->add_section( 'plumbelt_subheader' , array(
    	'title'       => __( 'Subheader', 'ti' ),
    	'priority'    => 250,
	) );

		/* Subheader - Title */
		$wp_customize->add_setting( 'ti_subheader_title' );
		$wp_customize->add_control( 'ti_subheader_title', array(
		    'label'    => __( 'Title:', 'ti' ),
		    'section'  => 'plumbelt_subheader',
		    'settings' => 'ti_subheader_title',
			'priority' => '1',
		) );

		/* Subheader - Content */
		$wp_customize->add_setting( 'ti_subheader_content' );
		$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'ti_subheader_content', array(
		            'label' 	=> __( 'Content:', 'ti' ),
		            'section' 	=> 'plumbelt_subheader',
		            'settings' 	=> 'ti_subheader_content',
		            'priority' 	=> '2'
		        )
		    )
		);

		/* Subheader - Contact Form - Shortcode */
		$wp_customize->add_setting( 'ti_subheader_contact_form_shortcode' );
		$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'ti_subheader_contact_form_shortcode', array(
		            'label' 	=> __( 'Contact Form 7 - Shortcode:', 'ti' ),
		            'section' 	=> 'plumbelt_subheader',
		            'settings' 	=> 'ti_subheader_contact_form_shortcode',
		            'priority' 	=> '4'
		        )
		    )
		);

	/*
    ** Frontpage Customizer
    */
    $wp_customize->add_section( 'frontpage_customizer' , array(
    	'title'       => __( 'Frontpage', 'ti' ),
    	'priority'    => 300,
	) );

		/* Frontpage - Box One - Title */
		$wp_customize->add_setting( 'ti_frontpage_boxone_title' );
		$wp_customize->add_control( 'ti_frontpage_boxone_title', array(
		    'label'    => __( 'Box One - Title:', 'ti' ),
		    'section'  => 'frontpage_customizer',
		    'settings' => 'ti_frontpage_boxone_title',
			'priority' => '1',
		) );

		/* Front Page - Box One - Content */
		$wp_customize->add_setting( 'ti_frontpage_boxone_content' );
		$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'ti_frontpage_boxone_content', array(
		            'label' 	=> __( 'Box One - Content:', 'ti' ),
		            'section' 	=> 'frontpage_customizer',
		            'settings' 	=> 'ti_frontpage_boxone_content',
		            'priority' 	=> '2'
		        )
		    )
		);

		/* Frontpage - Box Two - Title */
		$wp_customize->add_setting( 'ti_frontpage_boxtwo_title' );
		$wp_customize->add_control( 'ti_frontpage_boxtwo_title', array(
		    'label'    => __( 'Box Two - Title:', 'ti' ),
		    'section'  => 'frontpage_customizer',
		    'settings' => 'ti_frontpage_boxtwo_title',
			'priority' => '3',
		) );

		/* Front Page - Box Two - Content */
		$wp_customize->add_setting( 'ti_frontpage_boxtwo_content' );
		$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'ti_frontpage_boxtwo_content', array(
		            'label' 	=> __( 'Box Two - Content:', 'ti' ),
		            'section' 	=> 'frontpage_customizer',
		            'settings' 	=> 'ti_frontpage_boxtwo_content',
		            'priority' 	=> '4'
		        )
		    )
		);

		/* Frontpage - Box Three - Title */
		$wp_customize->add_setting( 'ti_frontpage_boxthree_title' );
		$wp_customize->add_control( 'ti_frontpage_boxthree_title', array(
		    'label'    => __( 'Box Three - Title:', 'ti' ),
		    'section'  => 'frontpage_customizer',
		    'settings' => 'ti_frontpage_boxthree_title',
			'priority' => '5',
		) );

		/* Front Page - Box Three - Content */
		$wp_customize->add_setting( 'ti_frontpage_boxthree_content' );
		$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'ti_frontpage_boxthree_content', array(
		            'label' 	=> __( 'Box Three - Content:', 'ti' ),
		            'section' 	=> 'frontpage_customizer',
		            'settings' 	=> 'ti_frontpage_boxthree_content',
		            'priority' 	=> '6'
		        )
		    )
		);

		/* Front Page - Article - Image */
		$wp_customize->add_setting( 'ti_frontpage_article_image' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ti_frontpage_article_image', array(
		    'label'    => __( 'About Us - Image:', 'ti' ),
		    'section'  => 'frontpage_customizer',
		    'settings' => 'ti_frontpage_article_image',
		    'priority' => '7',
		) ) );

		/* Front Page - Article - Title */
		$wp_customize->add_setting( 'ti_frontpage_article_title' );
		$wp_customize->add_control( 'ti_frontpage_article_title', array(
		    'label'    => __( 'About Us - Title:', 'ti' ),
		    'section'  => 'frontpage_customizer',
		    'settings' => 'ti_frontpage_article_title',
			'priority' => '8',
		) );

		/* Front Page - Article - Content */
		$wp_customize->add_setting( 'ti_frontpage_article_content' );
		$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'ti_frontpage_article_content', array(
		            'label' 	=> __( 'About Us - Content:', 'ti' ),
		            'section' 	=> 'frontpage_customizer',
		            'settings' 	=> 'ti_frontpage_article_content',
		            'priority' 	=> '9'
		        )
		    )
		);

		/* Front Page - Testimonials - Title */
		$wp_customize->add_setting( 'ti_frontpage_testimonials_title' );
		$wp_customize->add_control( 'ti_frontpage_testimonials_title', array(
		    'label'    => __( 'Testimonials - Title:', 'ti' ),
		    'section'  => 'frontpage_customizer',
		    'settings' => 'ti_frontpage_testimonials_title',
			'priority' => '10',
		) );

	/*
    ** Frontpage Customizer
    */
    $wp_customize->add_section( 'footer_customizer' , array(
    	'title'       => __( 'Footer', 'ti' ),
    	'priority'    => 350,
	) );

		/* Footer - About Us - Title */
		$wp_customize->add_setting( 'ti_footer_aboutus_title' );
		$wp_customize->add_control( 'ti_footer_aboutus_title', array(
		    'label'    => __( 'About Us - Title:', 'ti' ),
		    'section'  => 'footer_customizer',
		    'settings' => 'ti_footer_aboutus_title',
			'priority' => '1',
		) );

		/* Footer - About Us - Content */
		$wp_customize->add_setting( 'ti_footer_aboutus_content' );
		$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'ti_footer_aboutus_content', array(
		            'label' 	=> __( 'About Us - Content:', 'ti' ),
		            'section' 	=> 'footer_customizer',
		            'settings' 	=> 'ti_footer_aboutus_content',
		            'priority' 	=> '2'
		        )
		    )
		);

		/* Footer - Contact Us - Title */
		$wp_customize->add_setting( 'ti_footer_contactus_title' );
		$wp_customize->add_control( 'ti_footer_contactus_title', array(
		    'label'    => __( 'Contact Us - Title:', 'ti' ),
		    'section'  => 'footer_customizer',
		    'settings' => 'ti_footer_contactus_title',
			'priority' => '3',
		) );

		/* Footer - Contact Us - Content */
		$wp_customize->add_setting( 'ti_footer_contactus_content' );
		$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'ti_footer_contactus_content', array(
		            'label' 	=> __( 'Contact Us - Content:', 'ti' ),
		            'section' 	=> 'footer_customizer',
		            'settings' 	=> 'ti_footer_contactus_content',
		            'priority' 	=> '4'
		        )
		    )
		);

		/* Footer - Map - Title */
		$wp_customize->add_setting( 'ti_footer_map_title' );
		$wp_customize->add_control( 'ti_footer_map_title', array(
		    'label'    => __( 'Map - Title:', 'ti' ),
		    'section'  => 'footer_customizer',
		    'settings' => 'ti_footer_map_title',
			'priority' => '5',
		) );

		/* Footer - Contact Us - Iframe/ Code */
		$wp_customize->add_setting( 'ti_footer_iframecode_content' );
		$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'ti_footer_iframecode_content', array(
		            'label' 	=> __( 'Contact Us - Iframe/ Code:', 'ti' ),
		            'section' 	=> 'footer_customizer',
		            'settings' 	=> 'ti_footer_iframecode_content',
		            'priority' 	=> '6'
		        )
		    )
		);

	/*
    ** Contact Customizer
    */
    $wp_customize->add_section( 'contact_customizer' , array(
    	'title'       => __( 'Contact', 'ti' ),
    	'priority'    => 400,
	) );

		/* Contact - Sidebar - Content */
		$wp_customize->add_setting( 'ti_contact_sidebar_content' );
		$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'ti_contact_sidebar_content', array(
		            'label' 	=> __( 'Sidebar - Content:', 'ti' ),
		            'section' 	=> 'contact_customizer',
		            'settings' 	=> 'ti_contact_sidebar_content',
		            'priority' 	=> '1'
		        )
		    )
		);

}
add_action( 'customize_register', 'plumbelt_customizer' );

if( class_exists( 'WP_Customize_Control' ) ):
	class Example_Customize_Textarea_Control extends WP_Customize_Control {
	    public $type = 'textarea';

	    public function render_content() { ?>

	        <label>
	        	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        	<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	        </label>

	        <?php
	    }
	}
endif;

?>