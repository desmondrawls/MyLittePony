<?php

/*-----------------------------------------------------------------------------------*/
/*	Highlight Shortcode
/*-----------------------------------------------------------------------------------*/

$mpc_shortcodes['mpc_highlight'] = array(
	'preview' => 'true',
	'shortcode' => '[mpc_highlight background="{{background}}" color="{{color}}"]{{content}}[/mpc_highlight]',
	'title' => __('Insert Highlight Shortcode', 'mpcth'),
	'fields' => array(
		'content' => array(
			'std' => __('Highlight Text', 'mpcth'),
			'type' => 'text',
			'title' => __('Text', 'mpcth'),
			'desc' => __('Specify text which will be displayed inside the highlight.', 'mpcth')
		),
		'background' => array(
			'std' => '#f9625b',
			'type' => 'color',
			'title' => __('Background Color', 'mpcth'),
			'desc' => __('Highlight background color.', 'mpcth')
		),
		'color' => array(
			'std' => '#ffffff',
			'type' => 'color',
			'title' => __('Text Color', 'mpcth'),
			'desc' => __('Specify text color.', 'mpcth')
		)
	)
);

/*-----------------------------------------------------------------------------------*/
/*	Dropcaps Shortcode
/*-----------------------------------------------------------------------------------*/

$mpc_shortcodes['mpc_dropcaps'] = array(
	'preview' => 'true',
	'shortcode' => '[mpc_dropcaps background="{{background}}" color="{{color}}" size="{{size}}"]{{content}}[/mpc_dropcaps]',
	'title' => __('Insert Dropcaps Shortcode', 'mpcth'),
	'fields' => array(
		'content' => array(
			'std' => 'A',
			'type' => 'text',
			'title' => __('Text', 'mpcth'),
			'desc' => __('Specify letter which will be displayed inside the dropcaps.', 'mpcth')
		),
		'background' => array(
			'std' => '#dddddd',
			'type' => 'color',
			'title' => __('Background Color', 'mpcth'),
			'desc' => __('Dropcaps background color.', 'mpcth')
		),
		'color' => array(
			'std' => '#ffffff',
			'type' => 'color',
			'title' => __('Text Color', 'mpcth'),
			'desc' => __('Specify letter color.', 'mpcth')
		),
		'size' => array(
			'type' => 'select',
			'title' => __('Size', 'mpcth'),
			'desc' => __('Select the size.', 'mpcth'),
			'options' => array(
				'small' => __('Small', 'mpcth'),
				'normal' => __('Normal', 'mpcth'),
				'big' => __('Big', 'mpcth')
			)
		)
	)
);

/*-----------------------------------------------------------------------------------*/
/*	Tooltip Shortcode
/*-----------------------------------------------------------------------------------*/

$mpc_shortcodes['mpc_tooltip'] = array(
	'preview' => 'true',
	'shortcode' => '[mpc_tooltip message="{{message}}"]{{content}}[/mpc_tooltip]',
	'title' => __('Insert Tooltip Shortcode', 'mpcth'),
	'fields' => array(
		'content' => array(
			'std' => __('Text with tooltip.', 'mpcth'),
			'type' => 'text',
			'title' => __('Text', 'mpcth'),
			'desc' => __('Specify tooltip text.', 'mpcth')
		),
		'message' => array(
			'std' => __('Tooltip text', 'mpcth'),
			'type' => 'text',
			'title' => __('Tooltip Text', 'mpcth'),
			'desc' => __('Tooltip message.', 'mpcth')
		)
	)
);

/*-----------------------------------------------------------------------------------*/
/*	Fancybox Shortcode
/*-----------------------------------------------------------------------------------*/

$mpc_shortcodes['mpc_fancybox'] = array(
	'preview' => 'false',
	'shortcode' => '[mpc_fancybox src="{{src}}" caption="{{caption}}"]{{content}}[/mpc_fancybox]',
	'title' => __('Insert Tooltip Shortcode', 'mpcth'),
	'fields' => array(
		'content' => array(
			'std' => __('Fancybox element', 'mpcth'),
			'type' => 'text',
			'title' => __('Fancybox Element', 'mpcth'),
			'desc' => __('Element that will have Fancybox.', 'mpcth')
		),
		'src' => array(
			'std' => '#',
			'type' => 'text',
			'title' => __('Fancybox source', 'mpcth'),
			'desc' => __('URL to Fancybox target.', 'mpcth')
		),
		'caption' => array(
			'std' => '',
			'type' => 'text',
			'title' => __('Fancybox caption', 'mpcth'),
			'desc' => __('Caption fot Fancybox target.', 'mpcth')
		)
	)
);

/*-----------------------------------------------------------------------------------*/
/*	Lists
/*-----------------------------------------------------------------------------------*/

$mpc_shortcodes['mpc_list'] = array(
	'preview' => 'true',
	'shortcode' => '[mpc_list] {{inside}} [/mpc_list]',
	'title' => __('Insert Columns Shortcode', 'mpcth'),
	'fields' => array(),
	'inside' => array( 
		'shortcode' => '[mpc_l_item type="{{type}}" color="{{color}}" icon_color="{{icon_color}}"] {{item}} [/mpc_l_item]',
		'add_section' => __('Add New List Item', 'mpcth'),
		'remove_section' => __('Remove List Item', 'mpcth'),
		'fields' => array(
			'item' => array(
				'std' => __('List Item', 'mpcth'),
				'type' => 'textarea',
				'title' => __('List Item Content', 'mpcth'),
				'desc' => __('Specify the list item content.', 'mpcth'),
			),
			'color' => array(
				'std' => '#515151',
				'type' => 'color',
				'title' => __('Color', 'mpcth'),
				'desc' => __('Specify the list item content.', 'mpcth'),
			),
			'icon_color' => array(
				'std' => '#aa0000',
				'type' => 'color',
				'title' => __('Icon Color', 'mpcth'),
				'desc' => __('Specify the list item content.', 'mpcth'),
			),
			'type' => array(
			'type' => 'select',
			'title' => __('List Type', 'mpcth', 'mpcth'),
			'desc' => __('Specify the list type', 'mpcth'),
			'options' => array(
					'address' => 'Address', 'adjust' => 'Adjust', 'air' => 'Air', 'alert' => 'Alert', 'archive' => 'Archive', 'arrow-combo' => 'Arrow combo', 'arrows-ccw' => 'Arrows ccw', 'attach' => 'Attach', 'attention' => 'Attention', 'back' => 'Back', 'back-in-time' => 'Back in time', 'bag' => 'Bag', 'basket' => 'Basket', 'battery' => 'Battery', 'behance' => 'Behance', 'bell' => 'Bell', 'block' => 'Block', 'book' => 'Book', 'book-open' => 'Book open', 'bookmark' => 'Bookmark', 'bookmarks' => 'Bookmarks', 'box' => 'Box', 'briefcase' => 'Briefcase', 'brush' => 'Brush', 'bucket' => 'Bucket', 'calendar' => 'Calendar', 'camera' => 'Camera', 'cancel' => 'Cancel', 'cancel-circled' => 'Cancel circled', 'cancel-squared' => 'Cancel squared', 'cc' => 'Cc', 'cc-by' => 'Cc by', 'cc-nc' => 'Cc nc', 'cc-nc-eu' => 'Cc nc eu', 'cc-nc-jp' => 'Cc nc jp', 'cc-nd' => 'Cc nd', 'cc-pd' => 'Cc pd', 'cc-remix' => 'Cc remix', 'cc-sa' => 'Cc sa', 'cc-share' => 'Cc share', 'cc-zero' => 'Cc zero', 'ccw' => 'Ccw', 'cd' => 'Cd', 'chart-area' => 'Chart area', 'chart-bar' => 'Chart bar', 'chart-line' => 'Chart line', 'chart-pie' => 'Chart pie', 'chat' => 'Chat', 'check' => 'Check', 'clipboard' => 'Clipboard', 'clock' => 'Clock', 'cloud' => 'Cloud', 'cloud-thunder' => 'Cloud thunder', 'code' => 'Code', 'cog' => 'Cog', 'comment' => 'Comment', 'compass' => 'Compass', 'credit-card' => 'Credit card', 'cup' => 'Cup', 'cw' => 'Cw', 'database' => 'Database', 'db-shape' => 'Db shape', 'direction' => 'Direction', 'doc' => 'Doc', 'doc-landscape' => 'Doc landscape', 'doc-text' => 'Doc text', 'doc-text-inv' => 'Doc text inv', 'docs' => 'Docs', 'dot' => 'Dot', 'dot-2' => 'Dot 2', 'dot-3' => 'Dot 3', 'down' => 'Down', 'down-bold' => 'Down bold', 'down-circled' => 'Down circled', 'down-dir' => 'Down dir', 'down-open' => 'Down open', 'down-open-big' => 'Down open big', 'down-open-mini' => 'Down open mini', 'down-thin' => 'Down thin', 'download' => 'Download', 'dribbble' => 'Dribbble', 'dribbble-circled' => 'Dribbble circled', 'drive' => 'Drive', 'dropbox' => 'Dropbox', 'droplet' => 'Droplet', 'erase' => 'Erase', 'evernote' => 'Evernote', 'export' => 'Export', 'eye' => 'Eye', 'facebook' => 'Facebook', 'facebook-circled' => 'Facebook circled', 'facebook-squared' => 'Facebook squared', 'fast-backward' => 'Fast backward', 'fast-forward' => 'Fast forward', 'feather' => 'Feather', 'flag' => 'Flag', 'flash' => 'Flash', 'flashlight' => 'Flashlight', 'flattr' => 'Flattr', 'flickr' => 'Flickr', 'flickr-circled' => 'Flickr circled', 'flight' => 'Flight', 'floppy' => 'Floppy', 'flow-branch' => 'Flow branch', 'flow-cascade' => 'Flow cascade', 'flow-line' => 'Flow line', 'flow-parallel' => 'Flow parallel', 'flow-tree' => 'Flow tree', 'folder' => 'Folder', 'forward' => 'Forward', 'gauge' => 'Gauge', 'github' => 'Github', 'github-circled' => 'Github circled', 'globe' => 'Globe', 'google-circles' => 'Google circles', 'gplus' => 'Gplus', 'gplus-circled' => 'Gplus circled', 'graduation-cap' => 'Graduation cap', 'heart' => 'Heart', 'heart-empty' => 'Heart empty', 'help' => 'Help', 'help-circled' => 'Help circled', 'home' => 'Home', 'hourglass' => 'Hourglass', 'inbox' => 'Inbox', 'infinity' => 'Infinity', 'info' => 'Info', 'info-circled' => 'Info circled', 'instagrem' => 'Instagrem', 'install' => 'Install', 'key' => 'Key', 'keyboard' => 'Keyboard', 'lamp' => 'Lamp', 'language' => 'Language', 'lastfm' => 'Lastfm', 'lastfm-circled' => 'Lastfm circled', 'layout' => 'Layout', 'leaf' => 'Leaf', 'left' => 'Left', 'left-bold' => 'Left bold', 'left-circled' => 'Left circled', 'left-dir' => 'Left dir', 'left-open' => 'Left open', 'left-open-big' => 'Left open big', 'left-open-mini' => 'Left open mini', 'left-thin' => 'Left thin', 'level-down' => 'Level down', 'level-up' => 'Level up', 'lifebuoy' => 'Lifebuoy', 'light-down' => 'Light down', 'light-up' => 'Light up', 'link' => 'Link', 'linkedin' => 'Linkedin', 'linkedin-circled' => 'Linkedin circled', 'list' => 'List', 'list-add' => 'List add', 'location' => 'Location', 'lock' => 'Lock', 'lock-open' => 'Lock open', 'login' => 'Login', 'logo-db' => 'Logo db', 'logout' => 'Logout', 'loop' => 'Loop', 'magnet' => 'Magnet', 'mail' => 'Mail', 'map' => 'Map', 'megaphone' => 'Megaphone', 'menu' => 'Menu', 'mic' => 'Mic', 'minus' => 'Minus', 'minus-circled' => 'Minus circled', 'minus-squared' => 'Minus squared', 'mixi' => 'Mixi', 'mobile' => 'Mobile', 'monitor' => 'Monitor', 'moon' => 'Moon', 'mouse' => 'Mouse', 'music' => 'Music', 'mute' => 'Mute', 'network' => 'Network', 'newspaper' => 'Newspaper', 'note' => 'Note', 'note-beamed' => 'Note beamed', 'palette' => 'Palette', 'paper-plane' => 'Paper plane', 'pause' => 'Pause', 'paypal' => 'Paypal', 'pencil' => 'Pencil', 'phone' => 'Phone', 'picasa' => 'Picasa', 'picture' => 'Picture', 'pinterest' => 'Pinterest', 'pinterest-circled' => 'Pinterest circled', 'play' => 'Play', 'plus' => 'Plus', 'plus-circled' => 'Plus circled', 'plus-squared' => 'Plus squared', 'popup' => 'Popup', 'print' => 'Print', 'progress-0' => 'Progress 0', 'progress-1' => 'Progress 1', 'progress-2' => 'Progress 2', 'progress-3' => 'Progress 3', 'publish' => 'Publish', 'qq' => 'Qq', 'quote' => 'Quote', 'rdio' => 'Rdio', 'rdio-circled' => 'Rdio circled', 'record' => 'Record', 'renren' => 'Renren', 'reply' => 'Reply', 'reply-all' => 'Reply all', 'resize-full' => 'Resize full', 'resize-small' => 'Resize small', 'retweet' => 'Retweet', 'right' => 'Right', 'right-bold' => 'Right bold', 'right-circled' => 'Right circled', 'right-dir' => 'Right dir', 'right-open' => 'Right open', 'right-open-big' => 'Right open big', 'right-open-mini' => 'Right open mini', 'right-thin' => 'Right thin', 'rocket' => 'Rocket', 'rss' => 'Rss', 'search' => 'Search', 'share' => 'Share', 'shareable' => 'Shareable', 'shuffle' => 'Shuffle', 'signal' => 'Signal', 'sina-weibo' => 'Sina weibo', 'skype' => 'Skype', 'skype-circled' => 'Skype circled', 'smashing' => 'Smashing', 'sound' => 'Sound', 'soundcloud' => 'Soundcloud', 'spotify' => 'Spotify', 'spotify-circled' => 'Spotify circled', 'star' => 'Star', 'star-empty' => 'Star empty', 'stop' => 'Stop', 'stumbleupon' => 'Stumbleupon', 'stumbleupon-circled' => 'Stumbleupon circled', 'suitcase' => 'Suitcase', 'sweden' => 'Sweden', 'switch' => 'Switch', 'tag' => 'Tag', 'tape' => 'Tape', 'target' => 'Target', 'thermometer' => 'Thermometer', 'thumbs-down' => 'Thumbs down', 'thumbs-up' => 'Thumbs up', 'ticket' => 'Ticket', 'to-end' => 'To end', 'to-start' => 'To start', 'tools' => 'Tools', 'traffic-cone' => 'Traffic cone', 'trash' => 'Trash', 'trophy' => 'Trophy', 'tumblr' => 'Tumblr', 'tumblr-circled' => 'Tumblr circled', 'twitter' => 'Twitter', 'twitter-circled' => 'Twitter circled', 'up' => 'Up', 'up-bold' => 'Up bold', 'up-circled' => 'Up circled', 'up-dir' => 'Up dir', 'up-open' => 'Up open', 'up-open-big' => 'Up open big', 'up-open-mini' => 'Up open mini', 'up-thin' => 'Up thin', 'upload' => 'Upload', 'upload-cloud' => 'Upload cloud', 'user' => 'User', 'user-add' => 'User add', 'users' => 'Users', 'vcard' => 'Vcard', 'video' => 'Video', 'vimeo' => 'Vimeo', 'vimeo-circled' => 'Vimeo circled', 'vkontakte' => 'Vkontakte', 'volume' => 'Volume', 'water' => 'Water', 'window' => 'Window'
				)
			)
		)
	)
);

?>