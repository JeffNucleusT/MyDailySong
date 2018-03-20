$(function () {
	
	$('.spiritual-meditation, .worship-moment, .personal-intervention, .who-we-are, .our-mission, .today-media, .contact-online').height($(window).height());
	$('[data-toggle="tooltip"]').tooltip({
		container: 'body'
	});

	// Navigation
	function toggleNav(btn, laClasse) {
		if (laClasse === 'toOpen') {
			$('#showNavBtn i:last').attr('class', 'icon-cancel-outline');
			$('.navbar').addClass('open', 1000);
			$(btn).attr('class', 'toClose');
		} else {
			$('#showNavBtn i:last').attr('class', 'icon-menu-3');
			$('.navbar').removeClass('open', 1000);
			$(btn).attr('class', 'toOpen');
		}
		return false;
	}
	$('#showNavBtn').click(function () {
		toggleNav(this, $(this).attr('class'));
	});

	// Show/Hide the top button
	$('#toTop').hide();
	$(window).scroll(function () {
		if ($('body, html').scrollTop() >= 500) { $('#toTop').fadeIn(); } else { $('#toTop').fadeOut(); }
	});

	// to the top
	function toTheTop() {
		$('html, body').animate({
			scrollTop : 0
		}, 600);
		return false;
	}
	$('#toTop').click(function () {
		toTheTop();
	});

	// Like and dislike buttons
	var id_song = $('#id_song').val();

	$('#likeBtn').click(function () {

		var vote = 'like';

		$.ajax({
			type : 'POST',
			url : 'like-dislike.php',
			data : 'id_song=' + id_song + '&vote=' + vote,

			success : function (result) {
				if (result.includes('vote_success')) {
					$('#likeBtn').css({
						'transform' : 'scale(1.2)'
					}).attr('disabled', '');

					if ($('#dislikeBtn').prop('disabled') == true) {
						$('#dislikeBtn').removeAttr('disabled').attr({
							'title' : 'I don\'t like !',
							'data-original-title' : 'I don\'t like !'
						}).css({
							'transform' : 'scale(1)',
							'z-index' : '6666'
						});
					}

					$('#likeBtn').tooltip('hide').attr({
						'title' : 'Already choose !',
						'data-original-title' : 'Already choose !'
					});

					var voteCount = Math.floor($('#likeBtn .voteCount').text());
					$('#likeBtn .voteCount').text(voteCount+1);
				} 
				else {
					alert('A server error occured at the time of your vote !');
				}
			},

			error : function () {
				alert('A script error occured at the time of your vote !');
			}
		});

	});	

	$('#dislikeBtn').click(function () {

		var vote = 'dislike';

		$.ajax({
			type : 'POST',
			url : 'like-dislike.php',
			data : 'id_song=' + id_song + '&vote=' + vote,

			success : function (result) {
				if (result.includes('vote_success')) {
					$('#dislikeBtn').css({
						'transform' : 'scale(1.2)'
					}).attr('disabled', '');

					if ($('#likeBtn').prop('disabled') == true) {
						$('#likeBtn').removeAttr('disabled').attr({
							'title' : 'I like !',
							'data-original-title' : 'I like !'
						}).css({
							'transform' : 'scale(1)',
							'z-index' : '6666'
						});
					}

					$('#dislikeBtn').tooltip('hide').attr({
						'title' : 'Already choose !',
						'data-original-title' : 'Already choose !'
					});

					var voteCount = Math.floor($('#dislikeBtn .voteCount').text());
					$('#dislikeBtn .voteCount').text(voteCount+1);
				} 
				else {
					alert('A server error occured at the time of your vote !');
				}
			},

			error : function () {
				alert('A script error occured at the time of your vote !');
			}
		});

	});

	// Control and Save a comment

	function IsEmail(email) {
        var regex1 = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex1.test(email);
    }

    $(".contact-form #postResult").hide();

	$("#sendMessage").click(function(e) {

		e.preventDefault();

		var name_msg = $("#name_msg").val();
			email_msg = $("#email_msg").val();
			message_msg = $("#message_msg").val();
			beforeBtn = $(this).html();
			afterBtn = "<i class='icon-spin4 animate-spin'></i> SAVING...";

		if (name_msg != "") {
			$("#name_msg").removeClass("form-danger").addClass("form-success");
			
			if (IsEmail(email_msg)) {
				$("#email_msg").removeClass("form-danger").addClass("form-success");
				
				if (message_msg != "") {

					$("#message_msg").removeClass("form-danger").addClass("form-success");
					$(this).html(afterBtn);

					$.ajax({
						type : 'POST',
						url : 'php_codes/post.php',
						data : 'name_msg=' + name_msg + '&email_msg=' + email_msg + '&message_msg=' + message_msg,
						
						success : function(valReturn) {
							$("#sendMessage").html(beforeBtn);

							if (valReturn == "bad") {
								$(".contact-form #postResult").empty().html('<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Oh snap!</strong><br> An server error occured at the time of your message sending! Try again or later! </div>').fadeIn();
							}

							else if (valReturn == "good") {
								$(".contact-form #postResult").empty().html('<div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Well done!</strong><br> Your message has been successfully send! We will reply once! </div>').fadeIn();
								setTimeout(function () {
									location.href = location.href;
								}, 5000);
							}

							else if (valReturn == "empty_fields") {
								$(".contact-form #postResult").empty().html('<div class="alert alert-warning alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Warning!</strong><br> Fill in all the fields! </div>').fadeIn();
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