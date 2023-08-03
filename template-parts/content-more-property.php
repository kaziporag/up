<?php

$usland_property_related       = Usland::$options['property_related'];

?>
<div class="container mt-5">
	<div class="row">
		<div class="con-title-column col-lg-12 col-md-12 col-sm-12">
			<!--Sec Title-->
			<div class="sec-title">
				<?php echo empty( $usland_property_related ) ? '' : '<h5>'. esc_html( $usland_property_related ).'</h5>';?>
			</div>
		</div>
		<?php
		$the_query = new WP_Query(Usland_Helper::get_ulproperty());
			if ( $the_query->have_posts() ) :
				while ( $the_query->have_posts() ) : $the_query->the_post();
				
					global $post;
					$usland_pro_type    		                = get_post_meta( $post->ID, 'usland_pro_type', true );
					$usland_pro_status    		                = get_post_meta( $post->ID, 'usland_pro_status', true );
					$usland_pro_adress        	                = get_post_meta( $post->ID, 'usland_pro_adress', true );
					$usland_pro_property_size         	        = get_post_meta( $post->ID, 'usland_pro_property_size', true );
					$usland_pro_market_value                    = get_post_meta( $post->ID, 'usland_pro_market_value', true );
					$usland_pro_selling_price                   = get_post_meta( $post->ID, 'usland_pro_selling_price', true );
					$usland_pro_rating        		            = get_post_meta( $post->ID, 'usland_pro_rating', true );
		?>
		<div class="dis-style col-lg-4 col-md-6 col-sm-12">
			<div class="property-section-listings" id="Pierce">
				<div class="fea-listings box-size">
					<div class="fea-image">
						<?php echo empty( $usland_pro_type ) ? '': '<span class="pro-type">'. esc_html( 'For ', 'usland-core' ) . esc_html( $usland_pro_type ) .'</span>'; ?>
						<a href="<?php the_permalink();?>">
							<?php the_post_thumbnail('usland-size1', array( 'class' => 'img-fluid' ));?>
						</a>
					</div>
				</div>
				<div class="fea-content box-size">
					<div class="fea-content-up">
						<div class="flat-title-price">
							<h2>
								<a href="<?php the_permalink();?>"><?php the_title();?></a>
							</h2>
						</div>
						<?php echo empty( $usland_pro_adress ) ? '': '<h6>'. esc_html( $usland_pro_adress ) .'</h6>'; ?>
					</div>
					<div class="fea-content-down">
						<?php echo empty( $usland_pro_rating ) ? '': '<span class="pro-stars-score">'. esc_html( $usland_pro_rating ) .'</span>'; ?>
						<ul>
							<?php if(!empty($usland_pro_rating)) : ?>
							<li>
								<?php if($usland_pro_rating == '0'): ?>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<?php elseif($usland_pro_rating == '0.5'): ?>
								<i class="fa fa-star-half-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<?php elseif($usland_pro_rating == '1'): ?>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<?php elseif($usland_pro_rating == '1.5'): ?>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<?php elseif($usland_pro_rating == '2'): ?>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<?php elseif($usland_pro_rating == '2.5'): ?>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<?php elseif($usland_pro_rating == '3'): ?>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<?php elseif($usland_pro_rating == '3.5'): ?>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
								<i class="fa fa-star-o"></i>
								<?php elseif($usland_pro_rating == '4'): ?>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
								<?php elseif($usland_pro_rating == '4.5'): ?>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
								<?php elseif($usland_pro_rating == '5'): ?>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<?php endif; ?>
							</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
				<div class="property-row-meta">
					<div class="property-row-meta-item" id="price-comma">
						<?php echo empty( $usland_pro_selling_price ) ? '': '<strong class="sale-price">'. esc_html( $usland_pro_selling_price ) .'</strong>'; ?>
					</div>
					<div class="property-row-meta-item">
						<?php echo empty( $usland_pro_property_size ) ? '': '<span><i class="fa fa-arrows"></i></span><strong>'. esc_html( $usland_pro_property_size ) .'</strong>'; ?>
					</div>
					<div class="property-row-meta-item clr-Available">
						<?php echo empty( $usland_pro_status ) ? '': '<strong class="'. esc_html( $usland_pro_status ) .'">'. esc_html( $usland_pro_status ) .'</strong>'; ?>
					</div>
				</div>
    		</div>
		</div>
		<?php
			endwhile;
		endif;
		wp_reset_postdata();
		?>
	</div>
</div>

