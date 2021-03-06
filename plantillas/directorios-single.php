<?php
get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post();
echo "<div class='container'>";
echo "<div class='row'>";
echo "<div id='th-twocolumns' class='th-twocolumns'>";
$title = get_the_title();
//Logo
$pdi_dirs_logo = get_the_post_thumbnail_url();
//Imagen de Portada
$pdi_dirs_portada = get_post_meta($post->ID,'_pdi_dir_portada',true);
//Etiquetas Servicios adicionales
$pdi_dirs_petfriendly = get_post_meta($post->ID,'_pdi_dir_pet_friendly',true);
$pdi_dirs_aceptatarjetas = get_post_meta($post->ID,'_pdi_dir_acepta_tarjetas',true);
$pdi_dirs_serviciodomicilio = get_post_meta($post->ID,'_pdi_dir_servicio_domicilio',true);
$pdi_dirs_instalacionesadecuadas = get_post_meta($post->ID,'_pdi_dir_instalaciones_adecuadas',true);
//Días laborales de la semana
$pdi_dirs_diasdelasemana = get_post_meta($post->ID,'_pdi_dir_horarios',true);
//Métodos de pago
$pdi_dirs_pagoamex = get_post_meta($post->ID,'_pdi_pago_amex',true);
$pdi_dirs_pagovisa = get_post_meta($post->ID,'_pdi_pago_visa',true);
$pdi_dirs_pagomastercard = get_post_meta($post->ID,'_pdi_pago_mastercard',true);
$pdi_dirs_pagopaypal = get_post_meta($post->ID,'_pdi_pago_paypal',true);
//Redes Sociales
$pdi_dirs_facebook = get_post_meta($post->ID,'_pdi_dir_facebook',true);
$pdi_dirs_twitter = get_post_meta($post->ID,'_pdi_dir_twitter',true);
$pdi_dirs_gplus = get_post_meta($post->ID,'_pdi_dir_gplus',true);
$pdi_dirs_youtube = get_post_meta($post->ID,'_pdi_dir_youtube',true);
$pdi_dirs_instagram = get_post_meta($post->ID,'_pdi_dir_instagram',true);
$pdi_dirs_pinterest = get_post_meta($post->ID,'_pdi_dir_pinterest',true);
//Información de contacto
$pdi_dirs_direccion = get_post_meta($post->ID,'_pdi_dir_direccion',true);
$pdi_dirs_telefono = get_post_meta($post->ID,'_pdi_dir_telefono',true);
$pdi_dirs_email = get_post_meta($post->ID,'_pdi_dir_email',true);
$pdi_dirs_sitioweb = get_post_meta($post->ID,'_pdi_dir_sitioweb',true);
//Información del mapa
$pdi_dirs_latitud = get_post_meta($post->ID,'_pdi_dir_latitud',true);
$pdi_dirs_longitud = get_post_meta($post->ID,'_pdi_dir_longitud',true);
?>
	<!--Inicio del contenedor general -->
	<div class="col-md-8 col-sm-12 col-sx-12">
		<div id="directorio-individual-contenedor">
		<!--Espacio para la información de inicio-->
		<header id="pdi-directorio-single-cabecera" <?php if($pdi_dirs_portada == ""){echo 'style="background: #1e4e77;"';} else {echo 'style="background-image: url('.$pdi_dirs_portada.');"';}?>>
			<div id="pdi-directorio-logo"><div style="background-image: url(<?php echo $pdi_dirs_logo; ?>)"></div></div>
			<div id="pdi-directorio-nombre"><div id="directorio-individual-nombre-lugar"><h1><?php echo $title;?></h1></div></div>
			<!-- Etiquetas de servicios adicionales -->
			<div id="directorio-individual-tags">
				<?php
				if ($pdi_dirs_aceptatarjetas == 1) {
				?>
				<!-- Etiqueta de Acepta tarjetas -->
				<div class="dir-acepta-tarjetas">
					<i class="fa fa-credit-card-alt" aria-hidden="true"></i>
					<span><?php _e("ACEPTA TARJETAS","pdidirlang");?></span>
				</div>
				<?php
				}
				if ($pdi_dirs_petfriendly == 1) {
				?>
				<!-- Etiqueta de Pet Friendly -->
				<div class="dir-pet-friendly">
					<i class="fa fa-paw" aria-hidden="true"></i>
					<span><?php _e("PET FRIENDLY","pdidirlang");?></span>
				</div>
				<?php
				}
				if ($pdi_dirs_serviciodomicilio == 1) {
				?>
				<!-- Etiqueta de Servicio a domicilio -->
				<div class="dir-envios-domicilio">
					<i class="fas fa-motorcycle" aria-hidden="true"></i>
					<span><?php _e("SERVICIO A DOMICILIO","pdidirlang"); ?></span>
				</div>	
				<?php	
				}
				if ($pdi_dirs_instalacionesadecuadas == 1) {
				?>
				<!-- Etiqueta de Adecuado para capacidades diferentes -->
				<div class="dir-adecuado">
					<i class="fa fa-wheelchair" aria-hidden="true"></i>
					<span><?php _e("ADECUADO","pdidirlang");?></span>
				</div>
				<?php } ?>
			</div>
			<!--Fin de etiquetas de servicios adicionales-->
		</header>
		<!--Fin de espacio para la información de inicio-->
		<!--Inicio de la descripción-->
		<div id="directorio-individual-descripcion">
			<header>
				<h2><?php _e("Acerca de ","pdidirlang"); echo $title; ?></h2>
			</header>
			<div id="pdi-dir-descripcion-contenido"><?php echo get_the_content(); ?></div>
		</div>
		<!--Fin de la descripción-->
		<div id="pdi-dir-contenedor-metainfo">
			<!--Inicio de la tabla de horarios-->
			<div id="directorio-individual-horarios">
				<header>
					<i class="fa fa-clock-o" aria-hidden="true"></i>
					<h2><?php _e("Horarios de atención","pdidirlang"); ?></h2>
				</header>
				<div id="dir-horarios-atencion">
					<table id="dir-tabla-horarios">
						<?php
							$pdi_dias_semana = array("Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
							for ($i=0; $i < 7; $i++) { 
						?>
							<tr <?php if($pdi_dirs_diasdelasemana[$i]['pdi_dir_horap'] == "notrabaja"){echo "class='dir-sin-servicio'";}?>>
							<td><?php _e($pdi_dias_semana[$i],"pdidirlang");?></td>
							<?php if($pdi_dirs_diasdelasemana[$i]['pdi_dir_horap'] == "notrabaja"){
								echo "<td>";
								_e("No hay servicio","pdidirlang");
								echo "</td>";
							} else {
								echo "<td>De ".$pdi_dirs_diasdelasemana[$i]['pdi_dir_horap'].":00 ".$pdi_dirs_diasdelasemana[$i]['pdi_dir_ap_ampm']." a ".$pdi_dirs_diasdelasemana[$i]['pdi_dir_horci'].":00 ".$pdi_dirs_diasdelasemana[$i]['pdi_dir_ci_ampm']."</td>";
							}?>
						</tr>
						<?php	
							}
						?>
					</table>
				</div>
			</div>
			<!--Fin de la tabla de horarios-->	
			<div>
				<!--Inicio de los métodos de pago-->
				<div id="directorio-individual-metodos-de-pago">
					<header>
						<i class="fa fa-usd" aria-hidden="true"></i>
						<h2><?php _e("Métodos de pago","pdidirlang"); ?></h2>
					</header>
					<div id="dir-metodos-pago">
						<ul>
							<li class="dir-efectivo"><?php _e("Efectivo","pdidirlang");?></li>
							<?php if($pdi_dirs_pagoamex !== ""){?><li class="dir-amex"><?php _e("American Express","pdidirlang");}?>
							<?php if($pdi_dirs_pagovisa !== ""){?><li class="dir-visa"><?php _e("Visa","pdidirlang");}?></li>
							<?php if($pdi_dirs_pagomastercard !== ""){?><li class="dir-mastercard"><?php _e("Mastercard","pdidirlang");}?></li>
							<?php if($pdi_dirs_pagopaypal !== ""){?><li class="dir-paypal"><?php _e("Paypal","pdidirlang");}?></li>
						</ul>
					</div>
				</div>
				<!--Fin de los métodos de pago-->
				<!--Inicio de la sección de social media-->
				<div id="directorio-individual-botones-social-media">
					<header>
						<i class="fas fa-users"></i>
						<h2><?php _e("Redes sociales","pdidirlang"); ?></h2>
					</header>
					<div id="pdi-dir-redes-sociales">
						<?php
						//Facebook
						if($pdi_dirs_facebook == ""){
							echo "<a href='#' class='fa fa-facebook disabled'></a>";
						} else { echo "<a href='".$pdi_dirs_facebook."' class='fa fa-facebook' target='_blank'></a>";}
						//Twitter
						if($pdi_dirs_twitter == ""){
							echo "<a href='#' class='fa fa-twitter disabled'></a>";
						} else { echo "<a href='".$pdi_dirs_twitter."' class='fa fa-twitter' target='_blank'></a>";}
						//Google Plus
						if($pdi_dirs_gplus == ""){
							echo "<a href='#' class='fa fa-google disabled'></a>";
						} else { echo "<a href='".$pdi_dirs_gplus."' class='fa fa-google' target='_blank'></a>";}
						//Youtube
						if($pdi_dirs_youtube == ""){
							echo "<a href='#' class='fa fa-youtube disabled'></a>";
						} else { echo "<a href='".$pdi_dirs_youtube."' class='fa fa-youtube' target='_blank'></a>";}
						//Instagram
						if($pdi_dirs_instagram == ""){
							echo "<a href='#' class='fa fa-instagram disabled'></a>";
						} else { echo "<a href='".$pdi_dirs_instagram."' class='fa fa-instagram' target='_blank'></a>";}
						//Pinterest
						if($pdi_dirs_pinterest == ""){
							echo "<a href='#' class='fa fa-pinterest disabled'></a>";
						} else { echo "<a href='".$pdi_dirs_pinterest."' class='fa fa-pinterest' target='_blank'></a>";}
						if($pdi_dirs_facebook == "" && $pdi_dirs_twitter =="" && $pdi_dirs_gplus == "" && $pdi_dirs_youtube == "" && $pdi_dirs_instagram == "" && $pdi_dirs_pinterest == ""){
							echo "<span class='pdi-dir-sin-redes'>";
							_e("Este establecimiento no cuenta con redes sociales aún","pdidirlang");
							echo "</span>";
						}
						?>
					</div>
				</div>
				<!--Fin de la sección de social media-->
			</div>
		</div>
		<!--Inicio de la información de contacto-->
	<div id="directorio-individual-informacion-contacto">
			<header>
				<i class="fa fa-info-circle" aria-hidden="true"></i>
				<h2><?php _e("Información de contacto","pdidirlang"); ?></h2>
			</header>
			<div id="dir-info-contacto">
				<div class="dir-direccion">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<span><?php if ($pdi_dirs_direccion !== "") {
						echo $pdi_dirs_direccion;
					} else {echo "<em>"; _e("Este establecimiento aún no tiene una Dirección registrada.","pdidirlang"); echo "</em>";} ?></span>
				</div>
				<div class="dir-telefono">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<span><?php if ($pdi_dirs_telefono !== "") {
						echo "<a href='tel:".$pdi_dirs_telefono."'>".$pdi_dirs_telefono."</a>";
					} else {echo "<em>"; _e("Este establecimiento aún no tiene un Número Telefónico registrado","pdidirlang"); echo "</em>";} ?></span>
				</div>
				<div class="dir-email">
					<i class="fa fa-envelope" aria-hidden="true"></i>
					<span><?php if ($pdi_dirs_email !== "") {
						echo "<a href='mailto:".$pdi_dirs_email."'>".$pdi_dirs_email."</a>";
					} else {echo "<em>"; _e("Este establecimiento aún no tiene un Correo Electrónico de contacto registrado","pdidirlang"); echo "</em>";} ?></span>
				</div>
				<div class="dir-pagina">
					<i class="fa fa-globe" aria-hidden="true"></i>
					<span><?php if ($pdi_dirs_sitioweb !== "") {
						echo "<a href='".$pdi_dirs_sitioweb."' target='_blank'>".$pdi_dirs_sitioweb."</a>";
					} else {echo "<em>"; _e("Este establecimiento aún no tiene un Sitio Web registrado","pdidirlang"); echo "</em>";}?></span>
				</div>
			</div>
		</div>
		<!--Fin de la información de contacto-->
		<!--Inicio de la ubicación geográfica-->
		<div id="directorio-individual-ubicacion-geografica">
			<header>
				<i class="fa fa-map-o" aria-hidden="true"></i>
				<h2><?php _e("Ubicación geográfica","pdidirlang"); ?></h2>
			</header>
			<?php if ($pdi_dirs_latitud !== "" && $pdi_dirs_longitud !== "") {
			?>
			<div id="dir-ubicacion-mapa">
				<script>
      		function initMap() {
        	var uluru = {lat: <?php echo $pdi_dirs_latitud; ?>, lng: <?php echo $pdi_dirs_longitud; ?>};
        	var map = new google.maps.Map(document.getElementById('dir-ubicacion-mapa'), {
          	zoom: 17,
          	center: uluru
        	});
        	var marker = new google.maps.Marker({
          	position: uluru,
          	map: map
        		});
      		}
    		</script>
    		<script async defer
    			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk4lbh6c6ajnqydYIJwPcEh3aBF6Gxq28&callback=initMap">
    		</script>
			</div>
		<?php } else {
			?>
			<div id="pdi-dir-sin-ubicacion" style="background-image: url('<?php echo plugin_dir_url(__DIR__)."recursos/imagenes/mapa-no-encontrado.jpg"; ?>');">
				<i class="fa fa-map-marker" aria-hidden="true"></i>
				<h4><?php _e('Mapa no encontrado para este negocio'); ?></h4>
				<p><?php _e('Todavía no se ha registrado la ubicación física de este establecimiento en nuestro directorio.'); ?></p>
			</div>
			<?php
		}?>
		</div>
		<!--Fin de la ubicación geográfica-->
	</div>
	</div>
	<!--Fin del contenedor general-->

<?php
echo "<aside id='th-sidebar' class='th-sidebar col-md-4 col-sm-12 col-xs-12 pull-right'>";
get_sidebar();
echo "</aside>";
echo "</div>";
echo "</div>";
echo "</div>";
endwhile; else :
	echo "<p>"._e( 'Lo sentimos, no hay contenido para este criterio de búsqueda.',"pdidirlang" )."</p>";
endif;
get_footer();
?>