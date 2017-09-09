<footer class="footer">
		<div class="container section mb-0 pb-2 pt-5 content-info d-flex ">
		  	<div class="row d-flex flex-wrap flex-md-nowrap ">
		    	<?php dynamic_sidebar('sidebar-footer'); ?>
		    </div>
		</div>

	</div>
	<div class="site-info center py-1">
		<span class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</span>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>credits-et-mentions-legales" title="Crédits et mentions légales">Crédits et mentions légales</a> - <?php wp_loginout('', true ); ?> - <a href="<?php echo esc_url( home_url('/') ); ?>wp-admin/" title="Site Admin">Admin</a>
	</div>
</footer>