<?php
namespace MYOUANProAddon\App;

class PostTypes {

	public function __construct() {
		add_action( 'init', [ $this, '_register_post_types' ] );
	}

	public function _register_post_types() {
		if ( ! class_exists( '\SCF' ) ) {
			return;
		}

		if ( \SCF::get_option_meta( 'myouan-pro-addon', 'custom-post-type-news-active' ) ) {
			register_post_type(
				'news',
				array(
					'label'       => \SCF::get_option_meta( 'myouan-pro-addon', 'custom-post-type-news-label' ),
					'public'      => true,
					'has_archive' => true,
					'supports'    => array(
						'title', 'editor', 'excerpt', 'author', 'thumbnail',
					),
				)
			);
		}

		if ( \SCF::get_option_meta( 'myouan-pro-addon', 'custom-post-type-faq-active' ) ) {
			register_post_type(
				'faq',
				array(
					'label'       => \SCF::get_option_meta( 'myouan-pro-addon', 'custom-post-type-faq-label' ),
					'public'      => true,
					'has_archive' => true,
					'supports'    => array(
						'title', 'editor', 'author',
					),
				)
			);
		}

		if ( \SCF::get_option_meta( 'myouan-pro-addon', 'custom-post-type-item-active' ) ) {
			register_post_type(
				'item',
				array(
					'label'       => \SCF::get_option_meta( 'mmyouan-pro-addon', 'custom-post-type-item-label' ),
					'public'      => true,
					'has_archive' => true,
					'supports'    => array(
						'title', 'editor', 'excerpt', 'author', 'thumbnail',
					),
				)
			);
		}
	}
}
