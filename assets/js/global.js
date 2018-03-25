$(function () {
	
	$('.spiritual-meditation, .worship-moment, .personal-intervention, .who-we-are, .our-mission, .today-media, .contact-online').height($(window).height());
	$('[data-toggle="tooltip"]').tooltip({
		container: 'body'
	});

	// Navigation
	$('#showNavBtn').click(function () {
		toggleNav(this, $(this).attr('class'));
	});

	// Show/Hide the top button
	$('#toTop').hide();
	$(window).scroll(function () {
		if ($('body, html').scrollTop() >= 500) { $('#toTop').fadeIn(); } else { $('#toTop').fadeOut(); }
	});

	// to the top
	$('#toTop').click(function () {
		toTheTop();
	});

	// Like and dislike buttons
	var id_song = $('#id_song').val();

	$('#likeBtn').click(function () {

		var vote = 'like';

		likeOrDislike(id_song, vote);

	});	

	$('#dislikeBtn').click(function () {

		var vote = 'dislike';

		likeOrDislike(id_song, vote);

	});

	// Control and Send a message
    $(".contact-form #postResult").hide();

	$("#sendMessage").click(function(e) {

		e.preventDefault();

		var name_msg = $("#name_msg").val(),
			email_msg = $("#email_msg").val(),
			message_msg = $("#message_msg").val(),
			beforeBtn = $(this).html(),
			afterBtn = "<i class='icon-spin4 animate-spin'></i> SENDING...";

		if (name_msg != "") {
			$("#name_msg").removeClass("form-danger").addClass("form-success");
			
			if (IsEmail(email_msg)) {
				$("#email_msg").removeClass("form-danger").addClass("form-success");
				
				if (message_msg != "") {

					$("#message_msg").removeClass("form-danger").addClass("form-success");
					$(this).html(afterBtn);
					$(".contact-form #postResult").show();

					$.ajax({
						type : 'POST',
						url : 'php_codes/messagePost.php',
						data : 'name_msg=' + name_msg + '&email_msg=' + email_msg + '&message_msg=' + message_msg,
						
						success : function(valReturn) {
							$("#sendMessage").html(beforeBtn);

							if (valReturn.includes("new_msg_success")) {
								$(".contact-form #postResult").empty().html('<div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Well done!</strong><br> Your message has been successfully send! We will reply once! </div>').fadeIn();
								setTimeout(function () {
									location.href = location.href;
								}, 5000);
							}

							else if (valReturn.includes("Missing Informations")) {
								$(".contact-form #postResult").empty().html('<div class="alert alert-warning alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Warning!</strong><br> Fill in all the fields! </div>').fadeIn();
							}

							else {
								$(".contact-form #postResult").empty().html('<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Oh snap!</strong><br> An server error occured at the time of your message sending! Try again or later! </div>').fadeIn();
							}

						},

						error : function() {
							$("#sendMessage").html(beforeBtn);
							$(".contact-form #postResult").empty().html('<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Oh snap!</strong><br> An script error occured at the time of your message sending! Try again! </div>');
						}

					});

				} else { $("#message_msg").removeClass("form-success").addClass("form-danger").focus(); }
			} else { $("#email_msg").removeClass("form-success").addClass("form-danger").focus(); }
		} else { $("#name_msg").removeClass("form-success").addClass("form-danger").focus(); }

	});


	// Barres de navigation avec Nicescroll
	$('html').niceScroll({
		cursorcolor: "#551a8b",
		cursorwidth: "10px",
		cursorborderradius: "0px",
		cursorborder: "1px solid #551a8b",
		background: "#fff",
		railpadding: { top: 0, right: 1, left: 1, bottom: 0 }
	});
	$('.today-lyric-medit .tab-pane').niceScroll({
		cursorcolor: "#551a8b",
		cursorwidth: "10px",
		cursorborderradius: "2px",
		cursorborder: "1px solid #551a8b",
		background: "#fff"
	});

	// Sections parallax
	$('.worship-moment').parallax({
		imageSrc: 'assets/img/wm.jpg', bleed: 50, androidFix: false
	});
	$('.our-mission').parallax({
		imageSrc: 'assets/img/om.jpg', bleed: 50, androidFix: false
	});
	$('.contact-message').parallax({
		imageSrc: 'assets/img/cm.jpg', bleed: 50, androidFix: false
	});

});