$(function () {

    // Control and Send a comment
    $(".comment-form #postResult").hide();

	$("#sendComment").click(function(e) {

		e.preventDefault();

		var id_song = $("#id_song").val(),
		    name_c = $("#name_c").val(),
			email_c = $("#email_c").val(),
			comment_c = $("#comment_c").val(),
			responce_c = $("#responce_c").val(),
			beforeBtn = $(this).html(),
			afterBtn = "<i class='icon-spin4 animate-spin'></i> SENDING...";

		if (name_c != "") {
			$("#name_c").removeClass("form-danger").addClass("form-success");
			
			if (IsEmail(email_c)) {
				$("#email_c").removeClass("form-danger").addClass("form-success");
				
				if (comment_c != "") {

					$("#comment_c").removeClass("form-danger").addClass("form-success");
                    $(this).html(afterBtn);
                    $(".comment-form #postResult").show();

					$.ajax({
						type : 'POST',
						url : 'php_codes/commentCreate.php',
						data : 'name_c=' + name_c + '&email_c=' + email_c + '&comment_c=' + comment_c + '&responce_c=' + responce_c + '&id_song=' + id_song,
						
						success : function(results) {
                            $("#sendComment").html(beforeBtn);

							if (results.includes("new_comment_success")) {
								$(".comment-form #postResult").empty().html('<div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Good!</strong><br> Thanks for your comment about today meditation ! </div>').fadeIn();
								setTimeout(function () {
									location.href = location.href;
								}, 5000);
							}

							else if (results.includes("Missing Informations")) {
								$(".comment-form #postResult").empty().html('<div class="alert alert-warning alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Warning!</strong><br> Fill in all the fields! </div>').fadeIn();
                            }
                            
                            else {
								$(".comment-form #postResult").empty().html('<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Oh snap!</strong><br> An server error occured at the time of your message sending! Try again or later! <br> ' +results+ ' </div>').fadeIn();
							}

						},

						error : function() {
							$("#sendComment").html(beforeBtn);
							$(".comment-form #postResult").empty().html('<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Oh snap!</strong><br> An script error occured at the time of your message sending! Try again! </div>');
						}

					});

				} else { $("#comment_c").removeClass("form-success").addClass("form-danger").focus(); }
			} else { $("#email_c").removeClass("form-success").addClass("form-danger").focus(); }
		} else { $("#name_c").removeClass("form-success").addClass("form-danger").focus(); }

	});

});