<?php
/*
 * The template for displaying comments.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="segva-comments-area comments-area segva-form">

		<?php
		// You can start editing here -- including this comment!
		if ( have_comments() ) : ?>
			<div class="comments-section">
				<h3 class="comments-title">
					<?php
						printf( // WPCS: XSS OK.
							esc_html( _nx( 'Comment (%1$s)', 'Comments (%1$s)', get_comments_number(), 'comments title', 'segovia' ) ),
							number_format_i18n( get_comments_number() ),
							'<span>' . get_the_title() . '</span>'
						);
					?>
				</h3>

				<ol class="comments">
					<?php wp_list_comments('type=all&callback=segovia_comment_modification'); ?>
				</ol><!-- .comment-list -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="vt-comment-nav-below" class="navigation vt-comment-navigation" role="navigation">
				<h2 class="vt-screen-reader-text"><?php esc_html_e( 'Comment navigation', 'segovia' ); ?></h2>
				<div class="vt-nav-links">

					<div class="vt-nav-previous"><?php previous_comments_link( '&laquo; ' . esc_html__( 'Older Comments', 'segovia' ) ); ?></div>
					<div class="vt-nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'segovia' ) . ' &raquo;'); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->

			<?php
			endif; // Check for comment navigation. ?>
		</div><!-- .comments-section -->
		<?php endif; // Check for have_comments().

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p class="vt-no-comments"><?php esc_html_e( 'Comments are closed.', 'segovia' ); ?></p>

		<?php endif; ?>
	<?php
	/* ==============================================
	  Comment Forms
	=============================================== */
	if ( comments_open() ) { ?>
	<div id="respondd" class="segva-comment-form segva-form comment-respond">
		<?php
		$post_comment_text = cs_get_option('post_comment_text');
		$post_comment_text = $post_comment_text ? $post_comment_text : esc_html__( 'Submit', 'segovia' );
		$fields = array(
			'author' => '<div class="segva-form-inputs no-padding-left"><div class="row"><div class="col-md-6 col-sm-6"><input type="text" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" tabindex="1" placeholder="' . esc_attr__( 'Name', 'segovia' ) . '"/></div>',

			'email' => '<div class="col-md-6 col-sm-6"><input type="text" id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" tabindex="2" placeholder="' . esc_attr__( 'Email', 'segovia' ) . '"/></div></div></div>',

		);
		$defaults = array(
      'comment_notes_before' => '',
      'comment_notes_after'  => '',
      'fields' => apply_filters( 'comment_form_default_fields', $fields),
      'id_form'              => 'commentform',
      'id_submit'            => 'submit',
      'title_reply'          => esc_html__( 'Leave your Comment', 'segovia' ),
      'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'segovia' ),
      'cancel_reply_link'    => '<i class="fa fa-times-circle"></i>'. '',
      'label_submit'         => $post_comment_text,
      'comment_field' 			 => '<div class="segva-form-textarea no-padding-right"><textarea id="comment" name="comment" tabindex="4" rows="3" cols="30" placeholder="' . esc_attr__( 'Comment...', 'segovia' ) . '" ></textarea></div>'
    );

		comment_form($defaults);
		?>
	</div>
	<?php } ?>
</div><!-- #comments -->
<?php
