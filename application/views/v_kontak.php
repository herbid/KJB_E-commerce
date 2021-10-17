<!-- Title page -->

<!-- /.content-wrapper -->
<?php 
// Loading konfigurasi website
$site = $this->m_konfigurasi->listing();
 ?>


<style>
    .google-maps {
        position: relative;
        padding-bottom: 35%;
		 /* //Kode ini aspek rasio dari tampilan */
        height: 0;
        overflow: hidden;
    }
    .google-maps iframe {
        position: absolute;
		
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
    }
</style>


<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url(<?php echo base_url('assets/banner/'.$konfigurasi->kontak) ?>);">
		<h2 class="ltext-105 cl0 txt-center">
			Contact
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form>
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Send Us A Message
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Your Email Address">
							<img class="how-pos4 pointer-none" src="templates/images/icons/icon-email.png" alt="ICON">
						</div>

						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="How Can We Help?"></textarea>
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Submit
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
							<?php echo $site->alamat ?>

							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Hubungi
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
							<?php echo $site->telepon ?>
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								E-mail
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								<?php echo $site->email ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
	<!-- <div class="map">
		<div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="<?=base_url()?>templatesimages/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
	</div> -->

	<div class="google-maps">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.505962866551!2d110.33539861477776!3d-7.736031494424055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a58a240a90c5d%3A0x984ee638dd6058bf!2sKusuma%20Jaya%20Batik!5e0!3m2!1sen!2sid!4v1622046799025!5m2!1sen!2sid"data-pin="<?=base_url()?>templatesimages/icons/pin.png"width="600" height="450"  data-scrollwhell="0" data-draggable="1" data-zoom="11"frameborder="0" style="border:0;" allowfullscreen=""></iframe>

		<!-- <div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="templates/images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div> -->
	</div>


	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>templates/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>templates/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
<!--===============================================================================================-->
<script src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.505962866551!2d110.33539861477776!3d-7.736031494424055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a58a240a90c5d%3A0x984ee638dd6058bf!2sKusuma%20Jaya%20Batik!5e0!3m2!1sen!2sid!4v1622046799025!5m2!1sen!2sid"></script>
	<script src="<?=base_url()?>templates/js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>templates/js/main.js"></script>
<!--===============================================================================================-->