<?php
/**
 * Add Jupiter Post Options.
 *
 * @package JupiterX\Framework\Admin\Custom_Fields
 *
 * @since   1.0.0
 */

// Post Options.
acf_add_local_field_group( [
	'key'      => 'group_jupiterx_post',
	'title'    => __( 'Post Options', 'jupiterx' ),
	'location' => [
		[
			[
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => 'post',
			],
		],
		[
			[
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => 'portfolio',
			],
		],
		[
			[
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => 'page',
			],
		],
	],
] );
