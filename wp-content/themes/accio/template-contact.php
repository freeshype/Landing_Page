<?php
/**
 * Template Name: Contact
 *
 * The Template for displaying contact page.
 *
 * @package WordPress
 * @subpackage Accio
 * @since Accio 1.0
 */

get_header(); ?>

<?php

/* Edit the error messages here --------------------------------------------------*/
$nameError = __( 'Please enter your name.', 'framework' );
$emailError = __( 'Please enter your email address.', 'framework' );
$emailInvalidError = __( 'Please enter a valid email address.', 'framework' );
$commentError = __( 'Please enter a message.', 'framework' );


$errorMessages = array();
if(isset($_POST['submitted'])) {
	if(trim($_POST['contactName']) === '') {
		$errorMessages['nameError'] = $nameError;
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}

	if(trim($_POST['email']) === '')  {
		$errorMessages['emailError'] = $emailError;
		$hasError = true;
	} else if (!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$/i", trim($_POST['email']))) {
		$errorMessages['emailInvalidError'] = $emailInvalidError;
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(trim($_POST['comments']) === '') {
		$errorMessages['commentError'] = $commentError;
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}

	if(!isset($hasError)) {
		$emailid = get_option('accio_recipient');
		$emailTo = $emailid;
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = '[Contact Form] From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nMessage: $comments";
		$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}

}

?>

<section id="page">

	<!-- Start Content -->
	<div id="content">

		<div class="container">

			<div class="row">

				<div id="main" class="span8">

					<!-- Start .hentry -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="hentry-box">

							<div class="entry-wrap">

								<div class="entry-header">

									<div class="entry-info">

										<h2 class="entry-title page-title"><?php echo get_the_title(); ?></h2>

									</div>

								</div>

								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<div class="entry-content">
									<?php the_content(); ?>
								</div>

								<?php endwhile; endif; ?>

								<?php if(isset($emailSent) && $emailSent == true) { ?>

								<div class="thanks">

									<p><?php _e('Thanks, your email was sent successfully. We\'ll get back to you as soon as possible.' , 'framework'); ?></p>

								</div>

								<?php } else { ?>

									<?php if(isset($hasError) || isset($captchaError)) { ?>
										<p class="error"><?php _e('Sorry, an error occured.', 'framework'); ?><p>
									<?php } ?>

								<!-- .Start Contact Form -->
								<div class="contact-form">

									<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
										<ul class="contactform">
											<li>
												<label for="contactName"><?php _e('Name:', 'framework') ?></label>
												<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" />
												<?php if(isset($errorMessages['nameError'])) { ?>
													<span class="error"><?php echo $errorMessages['nameError']; ?></span>
												<?php } ?>
											</li>

											<li>
												<label for="email"><?php _e('Email:', 'framework') ?></label>
												<input type="email" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
												<?php if(isset($errorMessages['emailError'])) { ?>
													<span class="error"><?php echo $errorMessages['emailError']; ?></span>
												<?php } ?>
												<?php if(isset($errorMessages['emailInvalidError'])) { ?>
													<span class="error"><?php echo $errorMessages['emailInvalidError']; ?></span>
												<?php } ?>
											</li>

											<li class="textarea">
												<label for="commentsText"><?php _e('Message:', 'framework') ?></label>
												<textarea name="comments" id="commentsText" rows="10" cols="30" class="required requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
												<?php if(isset($errorMessages['commentError'])) { ?>
													<span class="error"><?php echo $errorMessages['commentError']; ?></span>
												<?php } ?>
											</li>

											<li class="buttons">
												<input type="hidden" name="submitted" id="submitted" value="true" />
												<button type="submit" id="submit"><?php _e('Send Message', 'framework') ?></button>
											</li>
										</ul>
									</form>

								<!-- End Contact Form -->
								</div>

								<?php } ?>

							</div>

						</div>

					</article>
					<!-- End .hentry -->

				</div>

				<?php get_sidebar(); ?>

			</div>

		</div>

	<!-- End Content -->
	</div>

</section>

<?php get_footer(); ?>
