<?php
namespace MYOUANProAddon\App;

class OptionPage {

	public function __construct() {
		if ( ! class_exists( '\SCF' ) ) {
			return;
		}

		\SCF::add_options_page(
			__( 'MYOUAN Pro Addon', 'myouan-pro-addon' ),
			__( 'MYOUAN Pro Addon', 'myouan-pro-addon' ),
			'manage_options',
			'myouan-pro-addon'
		);

		add_filter( 'smart-cf-register-fields', [ $this, '_option_page' ], 10, 4 );
	}

	public function _option_page( $settings, $type, $id, $meta_type ) {
		if ( $id !== 'myouan-pro-addon' ) {
			return $settings;
		}

		$Setting = \SCF::add_setting( 'custom-post-type-news', __( 'カスタム投稿タイプ「お知らせ」', 'myouan-pro-addon' ) );
		$Setting->add_group( 'group-custom-post-type-news', false, array(
			array(
				'name'    => 'custom-post-type-news-active',
				'label'   => __( '有効化する', 'myouan-pro-addon' ),
				'type'    => 'boolean',
				'default' => true,
			),
			array(
				'name'    => 'custom-post-type-news-label',
				'label'   => __( 'ラベル', 'myouan-pro-addon' ),
				'type'    => 'text',
				'default' => __( 'お知らせ', 'myouan-pro-addon' ),
			),
		) );
		$settings[] = $Setting;

		$Setting = \SCF::add_setting( 'custom-post-type-faq', __( 'カスタム投稿タイプ「よくあるご質問」', 'myouan-pro-addon' ) );
		$Setting->add_group( 'group-custom-post-type-faq', false, array(
			array(
				'name'    => 'custom-post-type-faq-active',
				'label'   => __( '有効化する', 'myouan-pro-addon' ),
				'type'    => 'boolean',
				'default' => true,
			),
			array(
				'name'    => 'custom-post-type-faq-label',
				'label'   => __( 'ラベル', 'myouan-pro-addon' ),
				'type'    => 'text',
				'default' => __( 'よくあるご質問', 'myouan-pro-addon' ),
			),
		) );
		$settings[] = $Setting;

		$Setting = \SCF::add_setting( 'custom-post-type-item', __( 'カスタム投稿タイプ「商品」', 'myouan-pro-addon' ) );
		$Setting->add_group( 'group-custom-post-type-item', false, array(
			array(
				'name'    => 'custom-post-type-item-active',
				'label'   => __( '有効化する', 'myouan-pro-addon' ),
				'type'    => 'boolean',
				'default' => true,
			),
			array(
				'name'    => 'custom-post-type-item-label',
				'label'   => __( 'ラベル', 'myouan-pro-addon' ),
				'type'    => 'text',
				'default' => __( '商品', 'myouan-pro-addon' ),
			),
		) );
		$settings[] = $Setting;

		return $settings;
	}
}
