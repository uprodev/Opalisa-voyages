<?php 

get_header(); 

$description = get_field('description');
$video_embed_link = get_field('video_embed_link');

?>

	<section class="news-detail">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-xl-10">
					<div class="text-center fade-in">
						<h1 class="h2"><?php the_title();?></h1>
					</div>

					<div class="detail-item">
						<div class="row">
							<div class="col-md-6">
								<?php if(has_post_thumbnail()):?>
									<div class="item-image fade-in">
										<img src="<?php the_post_thumbnail_url();?>" alt="<?= esc_html(get_the_title());?>" />
									</div>
								<?php endif;?>
							</div>
							<div class="col-md-6">
								<div class="item-text fade-in">
									<em><?= time_ago(get_the_ID());?></em>
									<?php the_content();?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php if($description):?>
				<div class="detail-description">
					<div class="row">
						<div class="col-lg-7 offset-lg-1 fade-in-wrapper">
							<?= $description;?>
						</div>
					</div>
				</div>
			<?php endif;?>

			<?php if($video_embed_link):?>
				<div class="detail-media fade-in">
					<div class="row">
						<div class="col-lg-6 offset-lg-1 col-xl-5">
							<figure>
								<iframe src="<?= $video_embed_link;?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
							</figure>
						</div>
					</div>
				</div>
			<?php endif;?>

		</div>
	</section>


<?php get_footer();