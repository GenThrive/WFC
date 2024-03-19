<?php if ( get_next_posts_link() || get_previous_posts_link() ) { ?>

	<div class="pagination-links">
		<?php
		if ( get_previous_posts_link() ) :
				previous_posts_link( __( 'Previous', 'crate' ), 0 );
			endif;
		?>
			<?php
			if ( get_next_posts_link() ) :
				next_posts_link( __( 'Next', 'crate' ), 0 );
			endif;
			?>
	</div>

<?php } ?>