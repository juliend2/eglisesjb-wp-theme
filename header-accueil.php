<!DOCTYPE html>
<html class="wide wow-animation" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">

	<meta name="viewport" content="width=device-width height=device-height initial-scale=1.0 maximum-scale=1.0 user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css2?family=Libre+Baskerville&amp;family=Work+Sans:wght@300;400;600&amp;display=swap">


    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="page">
	<?php get_template_part('partials/menu', 'top') ?>

	<section class="section swiper-container swiper-slider swiper-slider-business context-dark" data-loop="true" data-slide-effect="fade" data-autoplay="20000000" data-simulate-touch="false" data-custom-slide-effect="inter-leave-effect">
		<div class="swiper-wrapper">
			<?php if (date('Y-m-d') < '2026-01-05'): ?>
				<div class="swiper-slide context-light" data-slide-bg="images/sjb-header-noel-2025-desktop.jpg" data-slide-bg-mobile="images/sjb-header-noel-2025-mobile.jpg">
					<div class="slide-inner">
						<div class="swiper-slide-caption">
						<div class="container">
							<div class="slide-noel-2025" style="">

							<div class="" data-caption-animate="slideInLeft">
								<p class="big text-white">
								<b class="heading-5" style="color: white"><span class="" style="color: #ffd206;">
									POUR SE PRÉPARER À NOËL: Sacrement du Pardon:</span> <nobr>ven 19 déc de 18h à 21h:</nobr></b>
								<br>
								<span class="text-white">
									<b>Messe</b> à 18h suivie des <b>confessions</b> et <b>adoration</b> animée jusqu'à 21h<br>
									Sanctuaire du Saint-Sacrement: <nobr>500, avenue du Mont-Royal Est</nobr>
								</span>
								</p>
								<p class="big">
								<hr style="border-top: 6px solid  #c65d23; margin-bottom: 2em;">
								<span class="heading-5 " style="color: #ffd206; font-weight: bold; text-transform: uppercase;">
									Célébrations à la paroisse St-Jean-Baptiste:<br>
								</span><br>
								<span class="text-white">
									<ul>
									<li><b>24 déc à 20h:</b> messe familiale de la veille de Noël</li>
									<li><b>25 déc à 11h:</b> messe de Noël</li>
									<li>28 déc à 11h: messe de la Sainte-Famille</li>
									<li>31 déc: PAS DE MESSE</li>
									<li><b>1er janv à 11h:</b> messe du Jour de l'An</li>
									<li>Dimanche 4 janv à 11h: messe de l'Épiphanie</li>
									</ul>
								</span>
								</p>
							</div>
							</div>

						</div>
						</div>
					</div>
				</div>
			<?php endif ?>

			<?php if (date('Y-m-d') < '2026-01-01'): ?>
				<div class="swiper-slide context-light"  data-slide-bg="images/banniere-guignolee-background-desktop.png"  data-slide-bg-mobile="images/banniere-guignolee-background-mobile.png">
					<div class="slide-inner">
						<div class="swiper-slide-caption">
						<div class="container">
							<div class="">
							<div class="heading-1">Grande collecte</span>
							</div>
							<div class="">
								<p class="big" data-caption-animate="slideInLeft">
								<span class="heading-3">
									7, 14 et 21 décembre<br>
									11&nbsp;h à 15&nbsp;h<br>
								</span>
								<span class="heading-5">
									4240 rue Drolet<br>
									Don en nourriture<br>
									Don en argent<br>
								</span>
								</p>
							</div>
							</div>
							<div class="button-outer">
							<a class="button button-lg button-primary button-winona" target="_blank" href="https://www.jedonneenligne.org/ssvpdemontreal/GUIGNOLEE/" data-caption-animate="slideInUp">Donner</a>
							<small class="blue-text">NB: attribuer votre don à <br>"Conférence Saint-Jean-Baptiste"</small>
							<br>
							<img src="images/ssvpm-logo-web.svg">

							</div>

						</div>
						</div>
					</div>
				</div>
			<?php endif ?>

			<div class="swiper-slide"  data-slide-bg="images/sjb-header-lettre-depute.jpg"  data-slide-bg-mobile="images/sjb-header-lettre-depute_mobile.jpg">
				<div class="slide-inner">
					<div class="swiper-slide-caption">
						<div class="container">
							<div class="">
								<div class="heading-2">Le Rapport Rousseau-Pelchat :
									<br>une menace pour nos églises <br>et notre patrimoine collectif</span>
								</div>
								<div class="">
									<p class="big" data-caption-animate="slideInLeft">
									En mettant fin aux avantages fiscaux et aux subventions accordées aux organismes religieux<br>
									et en abrogeant le critère de la promotion de la religion comme critère de reconnaissance<br>
									des organismes de bienfaisance enregistrés, ce rapport menace directement la survie de<br>
									centaines d’églises, de centres communautaires et d’organismes d’entraide à travers le Québec.
									</p>
								</div>
							</div>
							<div class="button-outer"><a class="button button-lg button-primary button-winona" href="https://eglisesjb.com/lettre-depute-provincial/" data-caption-animate="slideInUp">Écrivez à votre député</a></div>
						</div>
					</div>
				</div>
			</div>

			<?php if (date('Y-m-d') < RECOMMENCEMENT_MESSES_SEMAINE): ?>
				<div class="swiper-slide context-light" data-slide-bg="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAABHNCSVQICAgIfAhkiAAAAAFzUkdCAK7OHOkAAAATSURBVAhbY/z/n+E/AxJgJF0AAOEbC/nUTGMnAAAAAElFTkSuQmCC">
				<div class="slide-inner">
					<div class="swiper-slide-caption">
					<div class="container">
						<h1><span data-caption-animate="slideInDown">Arrêt des messes en semaine pour l'été</span></h1>
						<div class="heading-6 blue-text"><span data-caption-animate="slideInUp"><br>De retour le 3 septembre.</span></div>
						<div class="">
						<p class="big" data-caption-animate="slideInLeft">
							Bonnes vacances!
						</p>
						</div>
					</div>
					</div>
				</div>
				</div>
			<?php endif ?>

			<?php if (date('Y-m-d') < '2025-06-25'): ?>
			<div class="swiper-slide" data-slide-bg="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAABHNCSVQICAgIfAhkiAAAAAFzUkdCAK7OHOkAAAATSURBVAhbY2SzPvCfAQkwki4AADodCAUCY3hwAAAAAElFTkSuQmCC">
			<div class="slide-inner">
				<div class="swiper-slide-caption">
				<div class="container">
					<h1><span data-caption-animate="slideInDown">Évènements à venir</span></h1>
					<div class="">

						<ul class="list-sm  mt-sm-3">

						<li class="object-inline-big">
							<span class="icon icon-md mdi mdi-calendar text-white"></span>
							<a class="object-inline-big text-white" href="https://www.facebook.com/events/1027022809496774/?rdid=V6eFCJY4cF7pmAx6&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F1CF2mzaTs6%2F" target="_blank">
							<b>Messe de la Saint Jean Baptiste</b> mardi le 24 juin, à 10 h.
							</a>
						</li>
						</ul>
					</div>
				</div>
				</div>
			</div>
			</div>
			<?php endif ?>

			<div class="swiper-slide" data-slide-bg="images/sjb-header.jpg">
			<div class="slide-inner">
				<div class="swiper-slide-caption">
				<div class="container">
					<div class="heading-6"><span data-caption-animate="slideInUp">Bienvenue à l'Église</span></div>
					<h1><span data-caption-animate="slideInDown">Saint-Jean-Baptiste</span></h1>
					<div class="swiper-caption-text">
					<div class="swiper-caption-text-decoration" data-caption-animate="scaleInVertical"></div>
					<div class="swiper-caption-text-inner">
						<p class="big" data-caption-animate="slideInLeft">Il n’existe plus beaucoup d’endroits, dans nos sociétés hyper individualistes, où hommes et femmes, jeunes et vieux, familles et personnes seules, riches et pauvres, gens d’ici et d’ailleurs peuvent se retrouver pour fraterniser et collaborer ensemble. C’est le défi que s’est donné la paroisse Saint-Jean-Baptiste.</p>
					</div>
					</div>
					<div class="button-outer"><a class="button button-lg button-primary button-winona" href="a-propos.php" data-caption-animate="slideInUp">En savoir plus</a></div>
				</div>
				</div>
			</div>
			</div>

			<div class="swiper-slide" data-slide-bg="images/sjb-header-sauvegarde.jpg">
			<div class="slide-inner">
				<div class="swiper-slide-caption">
				<div class="container">
					<div class="heading-6"><span data-caption-animate="slideInUp">Sauvegarde de l'église</span></div>
					<h1><span data-caption-animate="slideInDown">Campagne de financement <br>2021-2024</span></h1>
					<div class="button-outer"><a class="button button-lg button-primary button-winona" href="sauvegarde.php" data-caption-animate="slideInUp">Faites un don</a></div>
				</div>
				</div>
			</div>
			</div>

		</div>
		<div class="swiper-slider-nav container">
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>
		</div>
	</section>
