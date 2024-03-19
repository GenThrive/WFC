<?php
/**
 * Breadcrumb template
 */
?>

<div class="breadcrumbs">
	<ul>
		<li>
			<a href="<?php echo esc_url( get_home_url() ); ?>"><?php esc_html_e( 'Home', 'crate' ); ?></a>
		</li>
		<?php if ( is_archive() || is_home() ) { ?>
			<li class="current-page">
				<span class="breadcrumb-separator">&rsaquo;</span>
				<?php if ( is_home() ) { ?>
					<span><?php esc_html_e( 'Blog', 'crate' ); ?></span>
				<?php } elseif ( is_archive() ) { ?>
					<?php if ( is_author() ) { ?>
						<span><?php echo esc_html( get_author_name() ); ?></span>
					<?php } else { ?>
						<span><?php echo esc_html( get_the_archive_title() ); ?></span>
					<?php } ?>
				<?php } ?>
			</li>
		<?php } else { ?>
			<?php if ( wp_get_post_parent_id( get_the_id() ) ) { ?>
				<li>
					<span class="breadcrumb-separator">&rsaquo;</span>
					<a href="<?php echo esc_url( get_permalink( wp_get_post_parent_id( get_the_id() ) ) ); ?>"><?php echo esc_html( get_the_title( wp_get_post_parent_id( get_the_id() ) ) ); ?></a>
				</li>
				<li class="current-page">
					<span class="breadcrumb-separator">&rsaquo;</span>
					<span><?php the_title(); ?></span>
				</li>
			<?php } else { ?>
				<li class="current-page">
					<span class="breadcrumb-separator">&rsaquo;</span>
					<span><?php the_title(); ?></span>
				</li>
			<?php } ?>
			<?php
		}//end if
		?>
	</ul>
</div>
