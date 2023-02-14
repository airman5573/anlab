<?php
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'dbd_pagination' ) ) {
	function dbd_pagination( $args = array(), $class = 'pagination' ) {
		if ( ! isset( $args['total'] ) && $GLOBALS['wp_query']->max_num_pages <= 1 ) {
			return;
		}

		$args = wp_parse_args(
			$args,
			array(
				'mid_size'           => 2,
				'prev_next'          => true,
				'prev_text'          => __( '&laquo;', 'dbd' ),
				'next_text'          => __( '&raquo;', 'dbd' ),
				'type'               => 'array',
				'current'            => max( 1, get_query_var( 'paged' ) ),
				'screen_reader_text' => __( 'Posts navigation', 'dbd' ),
			)
		);

		$links = paginate_links( $args );
		if ( ! $links ) {
			return;
		}

		?>

		<nav class="pagination">
			<ul class="page-numbers">

				<?php
				foreach ( $links as $key => $link ) {
					?>
					<li class="<?php echo strpos( $link, 'current' ) ? 'current' : ''; ?>">
						<?php echo str_replace( 'page-numbers', 'page-numbers', $link ); ?>
					</li>
					<?php
				}
				?>

			</ul>
		</nav>
		<?php
	}
}
