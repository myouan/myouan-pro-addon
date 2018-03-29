<?php
/**
 * Plugin name: MYOUAN Pro Add-on
 * Description: MYOUAN をパワーアップするプラグイン。他のテーマでもいくつかの機能は使用できます。Smart Custom Fields が必要です。
 *
 * @todo 翻訳ファイル
 */

namespace MYOUANProAddon;

use MYOUANProAddon\App;

class Bootstrap {

	public function __construct() {
		add_action( 'plugins_loaded', [ $this, '_bootstrap' ] );
	}

	public function _bootstrap() {
		new App\PostTypes();
		new App\OptionPage();
	}
}

require_once( __DIR__ . '/vendor/autoload.php' );
new Bootstrap();
