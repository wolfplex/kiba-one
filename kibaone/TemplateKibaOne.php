<?php

/**
 * Template file for skin Kiba One
 *
 * @file
 * @ingroup Skins
 */

class TemplateKibaOne extends BaseTemplate {
	public function execute() {
		global $wgUser;
		wfSuppressWarnings();
		$this->html( 'headelement' );
?>
		<nav class="top-bar">
						<ul class="title-area">
							<li class="name"><h1><a href="<?php echo $this->data['nav_urls']['mainpage']['href']; ?>"><?php echo $this->text( 'sitename' ); ?></a></h1></li>
						   <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
						</ul>

						<section class="top-bar-section">

		    		<ul class="left">
		 						<li class="divider"></li>
									<?php foreach ( $this->getSidebar() as $boxName => $box ) { if ( $box['header'] != "Toolbox" ) { ?>
									<li class="has-dropdown active"  id='<?php echo Sanitizer::escapeId( $box['id'] ) ?>'<?php echo Linker::tooltip( $box['id'] ) ?>>
											<a href="#"><?php echo htmlspecialchars( $box['header'] ); ?></a>
											<?php if ( is_array( $box['content'] ) ) { ?>
												<ul class="dropdown">
													<?php foreach ( $box['content'] as $key => $item ) { echo $this->makeListItem( $key, $item ); } ?>
        								</ul>
											<?php } } ?>
									</li>
									<?php } ?>
		    		</ul>

		        <ul class="right">
			      <li class="has-form">
		        	<form action="<?php $this->text( 'wgScript' ); ?>" id="searchform" class="mw-search">
		        		<div class="row collapse">
		            	<div class="small-8 columns">
		        				<?php echo $this->makeSearchInput( array( 'placeholder' => 'Search...', 'id' => 'searchInput' ) ); ?>
		        			</div>
		        			 <div class="small-4 columns">
		        				<button type="submit" class="button search">Search</button>
		        			</div>
		        		</div>
		        	</form>
		        </li>
		         <li class="divider show-for-small"></li>
		         <li class="has-form">

								<li class="has-dropdown active"><a href="#"><i class="icon-cogs"></i></a>
									<ul class="dropdown">
										<?php foreach ( $this->getToolbox() as $key => $item ) { echo $this->makeListItem( $key, $item ); } ?>
										<li id="n-recentchanges" <?php echo Linker::tooltip( 'recentchanges' ) ?>><a href="/wiki/Special:RecentChanges">Recent Changes</a></li>
										<li id="n-help" <?php echo Linker::tooltip( 'help' ) ?>><a href="/wiki/Help:Contents">Help</a></li>
									</ul>
								</li>

							<?php if ( $wgUser->isLoggedIn() ): ?>
								<li class="has-dropdown active"><a href="#"><i class="icon-user"></i></a>
									<ul class="dropdown">
									<?php foreach ( $this->getPersonalTools() as $key => $item ) { echo $this->makeListItem( $key, $item ); } ?>
									</ul>
								</li>

							<?php else : ?>
							<li>
								<?php if ( isset( $this->data['personal_urls']['anonlogin'] ) ): ?>
									<a href="<?php echo $this->data['personal_urls']['anonlogin']['href']; ?>">Sign In</a>
								<?php elseif ( isset( $this->data['personal_urls']['login'] ) ): ?>
									<a href="<?php echo $this->data['personal_urls']['login']['href']; ?>">Sign In</a>
								<?php else : ?>
									<?php echo Linker::link( Title::newFromText( 'Special:UserLogin' ), 'Sign In' ); ?>
								<?php endif; ?>
							</li>

							<?php endif; ?>

		       </ul>
		     </section>
		</nav>

		<div class="row">
				<div class="large-12 columns">
				<!--[if lt IE 9]>
				<div id="siteNotice" class="sitenotice panel radius"><?php echo $this->text( 'sitename' ); ?> may not look as expected in this version of Internet Explorer. We recommend you upgrade to a newer version of Internet Explorer or switch to a browser like Firefox or Chrome.</div>
				<![endif]-->

				<?php if ( $this->data['sitenotice'] ) { ?><div id="siteNotice" class="sitenotice panel radius"><?php $this->html( 'sitenotice' ); ?></div><?php } ?>
				<?php if ( $this->data['newtalk'] ) { ?><div id="usermessage" class="newtalk panel radius"><?php $this->html( 'newtalk' ); ?></div><?php } ?>
				</div>
		</div>

		<div id="mw-js-message" style="display:none;"></div>

		<div class="row">
				<div class="large-12 columns">
					<?php if ( $wgUser->isLoggedIn() ): ?>
						<a href="#" data-dropdown="drop1" class="button dropdown small secondary radius"><i class="icon-cog"><span class="show-for-medium-up">&nbsp;Actions</span></i></a>
						<ul id="drop1" class="views large-12 columns f-dropdown">
							<?php foreach ( $this->data['content_actions'] as $key => $item ) { echo $this->makeListItem( $key, $item ); } ?>
							<?php wfRunHooks( SkinTemplateToolboxEnd, array( &$this, true ) );  ?>
						</ul>
					<?php endif;
					$namespace = str_replace( '_', ' ', $this->getSkin()->getTitle()->getNsText() );
					$displaytitle = $this->data['title'];
					if ( !empty( $namespace ) ) {
						$pagetitle = $this->getSkin()->getTitle();
						$newtitle = str_replace( $namespace . ':', '', $pagetitle );
						$displaytitle = str_replace( $pagetitle, $newtitle, $displaytitle );
					?><h4 class="namespace label"><?php print $namespace; ?></h4><?php } ?>
					<h2 class="title"><?php print $displaytitle; ?></h2>
					<?php if ( $this->data['isarticle'] ) { ?><h3 id="tagline"><?php $this->msg( 'tagline' ) ?></h3><?php } ?>
					<h5 class="subtitle"><?php $this->html( 'subtitle' ) ?></h5>
					<div class="clear_both"></div>
					<?php $this->html( 'bodytext' ) ?>
		    	<div class="group"><?php $this->html( 'catlinks' ); ?></div>
		    	<?php $this->html( 'dataAfterContent' ); ?>
		    </div>
		</div>

		<footer class="row">

		<ul class="large-12 columns">
		<?php foreach ( $this->getFooterLinks( "flat" ) as $key ) { ?>
			<li id="footer-<?php echo $key ?>"><?php $this->html( $key ) ?></li>
		<?php } ?>
		</ul>
		<ul> <?php foreach ( $this->getFooterIcons( "nocopyright" ) as $blockName => $footerIcons ) { ?>
	<li class="<?php echo $blockName ?>"><?php foreach ( $footerIcons as $icon ) { ?>
	    <?php echo $this->getSkin()->makeFooterIcon( $icon, 'withoutImage' ); ?>
 						<?php } ?>
        </li>
				<?php } ?>
		</ul>
		</footer>

		<div id="mw-js-message" style="display:none;"></div>

		<?php $this->printTrail(); ?>

		</body>
		</html>
<?php
		wfRestoreWarnings();
	}
}
