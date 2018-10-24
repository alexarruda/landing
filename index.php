<?php
	session_start();
	require('app/Config.inc.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>.: AgroBrazil :.</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="fonts/glober.css">
	<link rel="stylesheet" href="css/preload.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="preload" id="preload">
		<div class="logo">
			<img src="img/agrobrazil.png" alt="AgroBrazil"/>
			<div class="loader-frame">
				<div class="loader1" id="loader1"></div>
				<div class="loader2" id="loader2"></div>
			</div>
		</div>
	</div>

	<section id="home" class="home">
		<div class="home-side">
			<div class="home-side-bg">
				<img src="img/agrobrazil.png" alt="AgroBrazil"/>
			</div>
			<div class="home-side-text">
				<div class="text text-1"><p>informações reais</p></div>
				<div class="text text-2"><p>geram bons resultados.</p></div>
			</div>
			<div class="home-side-bg">
			</div>
		</div>

		<div class="home-link">
			<ul>
				<li class="link-svg"><a href="https://www.facebook.com/AgrobrazilOficial/" target="_blank">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 49.652 49.652" style="enable-background:new 0 0 49.652 49.652;" xml:space="preserve">
						<path d="M24.826,0C11.137,0,0,11.137,0,24.826c0,13.688,11.137,24.826,24.826,24.826c13.688,0,24.826-11.138,24.826-24.826    C49.652,11.137,38.516,0,24.826,0z M31,25.7h-4.039c0,6.453,0,14.396,0,14.396h-5.985c0,0,0-7.866,0-14.396h-2.845v-5.088h2.845    v-3.291c0-2.357,1.12-6.04,6.04-6.04l4.435,0.017v4.939c0,0-2.695,0-3.219,0c-0.524,0-1.269,0.262-1.269,1.386v2.99h4.56L31,25.7z    " fill="#ffffff"/>	
					</svg>
				</a></li>
				<li class="link-svg"><a href="https://www.instagram.com/agrobrazil/" target="_blank">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 49.652 49.652" style="enable-background:new 0 0 49.652 49.652;" xml:space="preserve">
						<path d="M24.825,29.796c2.739,0,4.972-2.229,4.972-4.97c0-1.082-0.354-2.081-0.94-2.897c-0.903-1.252-2.371-2.073-4.029-2.073     c-1.659,0-3.126,0.82-4.031,2.072c-0.588,0.816-0.939,1.815-0.94,2.897C19.854,27.566,22.085,29.796,24.825,29.796z" fill="#FFFFFF"/>
						<polygon points="35.678,18.746 35.678,14.58 35.678,13.96 35.055,13.962 30.891,13.975 30.907,18.762    " fill="#FFFFFF"/>
						<path d="M24.826,0C11.137,0,0,11.137,0,24.826c0,13.688,11.137,24.826,24.826,24.826c13.688,0,24.826-11.138,24.826-24.826     C49.652,11.137,38.516,0,24.826,0z M38.945,21.929v11.56c0,3.011-2.448,5.458-5.457,5.458H16.164     c-3.01,0-5.457-2.447-5.457-5.458v-11.56v-5.764c0-3.01,2.447-5.457,5.457-5.457h17.323c3.01,0,5.458,2.447,5.458,5.457V21.929z" fill="#FFFFFF"/>
						<path d="M32.549,24.826c0,4.257-3.464,7.723-7.723,7.723c-4.259,0-7.722-3.466-7.722-7.723c0-1.024,0.204-2.003,0.568-2.897     h-4.215v11.56c0,1.494,1.213,2.704,2.706,2.704h17.323c1.491,0,2.706-1.21,2.706-2.704v-11.56h-4.217     C32.342,22.823,32.549,23.802,32.549,24.826z" fill="#FFFFFF"/>
					</svg>
				</a></li>
				<li class="btn-site"><a href="http://agrobrazil.net.br/" target="_blank">Site Oficial</a></li>
			</ul>
		</div>

		<div class="home-bottom">
			<div class="home-more">
				<a class="home-more-icon" onclick="$('html,body').animate({ scrollTop: $('#premium').offset().top }, 1500);">
					<div class="home-more-icon-inner">
						<svg xmlns="http://www.w3.org/2000/svg" height="512px" viewBox="-18 -18 597.33331 597.33331" width="512px"><path d="m280 0c-154.640625 0-280 125.359375-280 280s125.359375 280 280 280 280-125.359375 280-280c-.175781-154.566406-125.433594-279.824219-280-280zm157.070312 227.070312-150 150c-3.90625 3.902344-10.234374 3.902344-14.140624 0l-150-150c-3.789063-3.925781-3.734376-10.160156.121093-14.019531 3.859375-3.855469 10.09375-3.910156 14.019531-.121093l142.929688 142.929687 142.929688-142.929687c3.925781-3.789063 10.160156-3.734376 14.019531.121093 3.855469 3.859375 3.910156 10.09375.121093 14.019531zm0 0" fill="#6bd62b"/></svg>
					</div>
					<span class="home-saiba">SAIBA COMO</span>
				</a>
			</div>
			<div class="home-whatsapp">
				<a class="btn-whats" href="http://api.whatsapp.com/send?1=pt_BR&phone=5518996547533" target="_blank">
					<img src="img/whats.png" alt="WhatsApp AgroBrazil"/>
					<span class="home-fale">FALE CONOSCO</span>
				</a>
			</div>
		</div>
		<div class="home-men"></div>
	</section>

	<section id="premium" class="premium">
		<div class="center">
			<div class="premium-left">
				<h2 class="h2-titlepremium"><span>#</span>Seja<span>Premium</span></h2>
				<div class="premium-content">
					<p>Conecte-se aos principais pecuarista do Brasil.<br>
					Baixe agora nosso APP e fique  por dentro de:</p>
					<ul>
						<li class="li-check"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 60.015 60.015" style="enable-background:new 0 0 60.015 60.015;" xml:space="preserve" width="512px" height="512px">
							<path d="M59.136,7.372c-1.133-1.133-3.109-1.133-4.242,0L27,35.265L15.344,23.609c-1.133-1.133-3.109-1.133-4.242,0   c-0.566,0.566-0.879,1.32-0.879,2.121s0.313,1.555,0.879,2.121l13.777,13.777c0.566,0.566,1.32,0.879,2.121,0.879   s1.555-0.313,2.121-0.879l30.015-30.015c0.566-0.566,0.879-1.32,0.879-2.121S59.702,7.938,59.136,7.372z" fill="#08582c"/>
							<path d="M27,45.007c-1.469,0-2.85-0.572-3.889-1.611L9.334,29.619c-1.039-1.039-1.611-2.42-1.611-3.889s0.572-2.85,1.611-3.889   c1.005-1.006,2.423-1.582,3.889-1.582s2.884,0.576,3.889,1.582L27,31.73l26-26V3.507H0v53h53V21.285L30.889,43.396   C29.85,44.435,28.469,45.007,27,45.007z" fill="#6bd62b"/>
							</svg> Negócios realizados em tempo real;</li>
						<li class="li-check"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 60.015 60.015" style="enable-background:new 0 0 60.015 60.015;" xml:space="preserve" width="512px" height="512px">
							<path d="M59.136,7.372c-1.133-1.133-3.109-1.133-4.242,0L27,35.265L15.344,23.609c-1.133-1.133-3.109-1.133-4.242,0   c-0.566,0.566-0.879,1.32-0.879,2.121s0.313,1.555,0.879,2.121l13.777,13.777c0.566,0.566,1.32,0.879,2.121,0.879   s1.555-0.313,2.121-0.879l30.015-30.015c0.566-0.566,0.879-1.32,0.879-2.121S59.702,7.938,59.136,7.372z" fill="#08582c"/>
							<path d="M27,45.007c-1.469,0-2.85-0.572-3.889-1.611L9.334,29.619c-1.039-1.039-1.611-2.42-1.611-3.889s0.572-2.85,1.611-3.889   c1.005-1.006,2.423-1.582,3.889-1.582s2.884,0.576,3.889,1.582L27,31.73l26-26V3.507H0v53h53V21.285L30.889,43.396   C29.85,44.435,28.469,45.007,27,45.007z" fill="#6bd62b"/>
							</svg> Escalas frigorificas nacionais;</li>
						<li class="li-check"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 60.015 60.015" style="enable-background:new 0 0 60.015 60.015;" xml:space="preserve" width="512px" height="512px">
							<path d="M59.136,7.372c-1.133-1.133-3.109-1.133-4.242,0L27,35.265L15.344,23.609c-1.133-1.133-3.109-1.133-4.242,0   c-0.566,0.566-0.879,1.32-0.879,2.121s0.313,1.555,0.879,2.121l13.777,13.777c0.566,0.566,1.32,0.879,2.121,0.879   s1.555-0.313,2.121-0.879l30.015-30.015c0.566-0.566,0.879-1.32,0.879-2.121S59.702,7.938,59.136,7.372z" fill="#08582c"/>
							<path d="M27,45.007c-1.469,0-2.85-0.572-3.889-1.611L9.334,29.619c-1.039-1.039-1.611-2.42-1.611-3.889s0.572-2.85,1.611-3.889   c1.005-1.006,2.423-1.582,3.889-1.582s2.884,0.576,3.889,1.582L27,31.73l26-26V3.507H0v53h53V21.285L30.889,43.396   C29.85,44.435,28.469,45.007,27,45.007z" fill="#6bd62b"/>
							</svg> Dados do mercado futuro;</li>
					</ul>
					<span class="premium-line"></span>
				</div>
				<div class="premium-content-footer">
					<p>Teste por <span>30 dias grátis*</span></p>
					<div class="premium-icon">
						<img src="img/apple-store.png" alt="Apple Store">
						<img src="img/google-play.png" alt="Google Play">
					</div>
				</div>
			</div>
			<div class="premium-right">
				<iframe src="https://www.youtube.com/embed/ykgvYH7QZbY?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
			</div>
			<div class="premium-footer">
				<span class="premium-line-footer premium-line-footer1"></span>
				<a class="btn-facaparte" onclick="$('html,body').animate({ scrollTop: $('#form').offset().top }, 1500);">Faça parte agora!</a>
				<span class="premium-line-footer premium-line-footer2"></span>
			</div>
		</div>
	</section>

	<section id="form" class="form">
		<div class="center">
			<h2 class="h2-titleform">Falta pouco para você fazer parte da maior<br>
			plataforma de negócios realizados do setor!</h2>
			<p class="p-titleform">Preencha todos os campos abaixo e<br>
			<span>ganhe 30 dias grátis*</span> em nossa plataforma.</p>

            <div class="divform">
                <form action="" method="post" name="landingForm" id="landingForm">
                    <div class="landing-inputs">
                        <div class="item-input">
                            <input type="text" class="require" id="name" name="name" data-require="Insira seu Nome" autocomplete="off" placeholder="Nome">
                        </div>
                        <div class="item-input item-input-right">
                            <input type="tel" class="require telefone numero" id="phone" name="phone" maxlength="15" data-require="Insira seu Contato" autocomplete="off" placeholder="Celular">
                        </div>
                        <div class="item-input item-input-full">
                            <input type="email" class="require email-analytic" id="mail" name="mail" data-campo="E-mail" data-require="Insira seu E-mail" autocomplete="off" placeholder="E-mail">
                        </div>
						<div class="item-input">
							<span class="select-wrapper">
								<select id="state" name="state" class="no-radius">
								</select>
							</span>
						</div>
						<div class="item-input item-input-right">
							<span class="select-wrapper">
								<select id="city" name="city" class="no-radius">
								</select>
							</span>
						</div>
                        <div class="item-input item-input-full item-input-center">
                            <input type="text" class="require" id="plataforma" name="plataforma" data-require="Nos diga onde conheceu a Plataforma" autocomplete="off" placeholder="Onde conheceu nossa plataforma?">
						</div>
						<div class="item-date">
							<input type="text" class="" name="date" id="date" value="<?= date('d/m/Y H:i:s'); ?>" />
						</div>
                        <div class="item-input item-btn">
                            <a name="enviarButton" class="enviarButton" id="enviarForm">Teste por 30 dias grátis!</a>
                        </div>
                    </div>
				</form>
            </div>
		</div>
		<div id="divMessage" class="divMessage">
			<p class="message"></p>
		</div>
	</section>

	<section class="sociais">
		<div class="center">
			<p>Acompanhe nossas redes sociais!</p>
			<div class="sociais-svg">
				<div class="sociais-svg-unit"><a href="https://www.facebook.com/AgrobrazilOficial/" target="_blank">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 49.652 49.652" style="enable-background:new 0 0 49.652 49.652;" xml:space="preserve">
						<path d="M24.826,0C11.137,0,0,11.137,0,24.826c0,13.688,11.137,24.826,24.826,24.826c13.688,0,24.826-11.138,24.826-24.826    C49.652,11.137,38.516,0,24.826,0z M31,25.7h-4.039c0,6.453,0,14.396,0,14.396h-5.985c0,0,0-7.866,0-14.396h-2.845v-5.088h2.845    v-3.291c0-2.357,1.12-6.04,6.04-6.04l4.435,0.017v4.939c0,0-2.695,0-3.219,0c-0.524,0-1.269,0.262-1.269,1.386v2.99h4.56L31,25.7z    " fill="#6bd62b"/>	
					</svg>
				</a></div>
				<div class="sociais-svg-unit"><a href="https://www.instagram.com/agrobrazil/" target="_blank">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 49.652 49.652" style="enable-background:new 0 0 49.652 49.652;" xml:space="preserve">
						<path d="M24.825,29.796c2.739,0,4.972-2.229,4.972-4.97c0-1.082-0.354-2.081-0.94-2.897c-0.903-1.252-2.371-2.073-4.029-2.073     c-1.659,0-3.126,0.82-4.031,2.072c-0.588,0.816-0.939,1.815-0.94,2.897C19.854,27.566,22.085,29.796,24.825,29.796z" fill="#6bd62b"/>
						<polygon points="35.678,18.746 35.678,14.58 35.678,13.96 35.055,13.962 30.891,13.975 30.907,18.762    " fill="#6bd62b"/>
						<path d="M24.826,0C11.137,0,0,11.137,0,24.826c0,13.688,11.137,24.826,24.826,24.826c13.688,0,24.826-11.138,24.826-24.826     C49.652,11.137,38.516,0,24.826,0z M38.945,21.929v11.56c0,3.011-2.448,5.458-5.457,5.458H16.164     c-3.01,0-5.457-2.447-5.457-5.458v-11.56v-5.764c0-3.01,2.447-5.457,5.457-5.457h17.323c3.01,0,5.458,2.447,5.458,5.457V21.929z" fill="#6bd62b"/>
						<path d="M32.549,24.826c0,4.257-3.464,7.723-7.723,7.723c-4.259,0-7.722-3.466-7.722-7.723c0-1.024,0.204-2.003,0.568-2.897     h-4.215v11.56c0,1.494,1.213,2.704,2.706,2.704h17.323c1.491,0,2.706-1.21,2.706-2.704v-11.56h-4.217     C32.342,22.823,32.549,23.802,32.549,24.826z" fill="#6bd62b"/>
					</svg>
				</a></div>
			</div>
		</div>
	</section>

	<footer class="footer">
		<div class="center">
			<i class="footer-left"><a onclick="$('html,body').animate({ scrollTop: $('#home').offset().top }, 1500);"><img src="img/agrobrazil-2.png" alt="AgroBrazil"></a></i>
			<i class="footer-center">Copyright ©2018 AgroBrazil. Todos os direitos reservados</i>
			<i class="footer-right">desenvolvido por <a href="http://agenciasozo.com" target="_blank"><img src="img/sozo.png" alt="Agência SOZO"></a></i>
		</div>
	</footer>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>
	<script src="js/greensock/minified/plugins/ScrollToPlugin.min.js"></script>
	<!-- EFFECT SCROLL MAGIC -->
	<script src="js/scrollmagic/ScrollMagic.min.js"></script>
	<script src="js/scrollmagic/plugins/animation.gsap.min.js"></script>
	<script src="js/scrollmagic/plugins/animation.velocity.min.js"></script>
	<script src="js/scrollmagic/plugins/debug.addIndicators.min.js"></script>
	<script src="js/scrollmagic/plugins/jquery.ScrollMagic.min.js"></script>
	<!-- EXEC EFFECT -->
	<script src="js/greensockcontrol.js"></script>
	<script src="js/validacao.min.js"></script>
	<script src="js/script.js"></script>

	<script>
		window.onload = function() {
			document.getElementById("preload").style.animation = "fadeout 1s ease";
			setTimeout(function() {
				document.getElementById("preload").style.display = "none";
			}, 100);

			const text1 = document.querySelector('.text-1');
			const text2 = document.querySelector('.text-2');
			const men = document.querySelector('.home-men');
			const tl = new TimelineMax();
			// to => para (propriedades para o final)
			// from => vem de (propriedades de quando começa)

			tl
			.from(text1, .5, { x: -500, opacity: 0 })
			.from(text2, .5, { x: -500, opacity: 0 })
			.from(men, .5, { y: 500, opacity: 0 });
		}; 
	</script>
</body>
</html>