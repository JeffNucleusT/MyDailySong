$(function () {

	// Contrôle et envoi des data pour la connexion
	
	$('#login-input').blur(function () {

		if ($(this).val() == "") {
			$(this).removeClass('input-success').addClass('input-error').focus();
		}
		else {
			$(this).removeClass('input-error').addClass('input-success');
		}

	});

	$('#password-input').blur(function () {

		if ($(this).val() == "") {
			$(this).removeClass('input-success').addClass('input-error').focus();
		}
		else {
			$(this).removeClass('input-error').addClass('input-success');
		}

	});

	$('#login-button').click(function (e) {

		var login = $('#login-input').val(),
			password = $('#password-input').val(),
			btnHtml = $(this).html();

		if ((login == "") || (password == "")) {
			e.preventDefault();

			if (login == "") {
				$('#login-input').removeClass('input-success').addClass('input-error').focus();
			}
			else {
				$('#login-input').removeClass('input-error').addClass('input-success');
				if (password == "") {
					$('#password-input').removeClass('input-success').addClass('input-error').focus();
				} else {
					$('#password-input').removeClass('input-error').addClass('input-success');
				}
			}

		} else {

			$(this).attr("disabled", "disabled").html("<i class='icon-spin4 animate-spin'></i> Connexion...");

		}

	});

	// Accept ou refus d'ajout de la méditation 

	$('.div-meditation').hide();
	$('#existMeditation').click(function () {
		
		if ($(this).prop('checked') == true) {
			$('.div-meditation').slideDown();
		} else {
			$('.div-meditation').slideUp();	
		}

	});

	// Contrôle des infos pour l'enregistrement des songs

	$('.new-song-form .form-control:not(#meditation)').blur(function () {
		if ($(this).val() === "" || $(this).val() === null) {
			$(this).parent().parent().removeClass('has-success').addClass('has-danger');
			$(this).removeClass('form-control-success').addClass('form-control-danger');
		} else {
			$(this).parent().parent().removeClass('has-danger').addClass('has-success');
			$(this).removeClass('form-control-danger').addClass('form-control-success');
		}
	});

	// Envoi des data pour l'enregistrement des songs

	$('.new-song-form').on('submit', function (elt) {
		
		elt.preventDefault();

		var name_song = $('#name_song').val(),
			title = $('#title').val(),
			author = $('#author').val(),
			lyrics = $('#lyrics').val(),
			release_date = $('#release_date').val();

			befBtn = "<i class='icon-hdd-2'></i> Save these song' informations";
			aftBtn = "<i class='icon-spin4 animate-spin'></i> Saving...";

		if ((name_song === "" || name_song === null) || (title === "" || title === null) || (author === "" || author === null) || (lyrics === "" || lyrics === null) || (release_date === "" || release_date === null)) {
			alert('You must fill in all the fields !')
		}

		else {

			$('#save-song-btn').html(aftBtn);

			$.ajax({

				type: 'POST',
				url: 'php_codes/songCreate.php',
				data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,

				success: function (results) {
					
					if (results.includes('Save_Success')) {
						$('#save-song-btn').html(befBtn);
						alert('The song has been saved successfully !');
						setTimeout (function (){
							location.href=location.href;
						}, 1000);
					}
					else if (results.includes('get_file_error')) {
						$('#save-song-btn').html(befBtn);
						alert('File loading has failed ! Try again !');
					}
					else if (results.includes('get_extension_error')) {
						$('#save-song-btn').html(befBtn);
						alert('This file is not an audio file (mp3 or wav) ! Please change it !');
					}
					else if (results.includes('Title_Exist')) {
						$('#save-song-btn').html(befBtn);
						alert('This title is already used by an another song !');
					}
					else if (results.includes('Date_Exist')) {
						$('#save-song-btn').html(befBtn);
						alert('Another song will be released on this date ! Change this one !');
					}
					else if (results.includes('Date_Passed')) {
						$('#save-song-btn').html(befBtn);
						alert('This release day has passed ! Choose a future date !');
					}
					else {
						$('#save-song-btn').html(befBtn);
						alert('An server error occured at the time of the publication !' + results);
					}

				},

				error : function () {
					$('#save-song-btn').html(befBtn);
					alert('An script error occured at the time of the publication !');
				}

			});

		}

	});

	// Envoi des data pour la mise à jour des songs

	$('.update-song-form').on('submit', function (elt) {
		
		elt.preventDefault();

		var u_id_song = $('#u_id_song').val(),
			n_title = $('#n_title').val(),
			n_author = $('#n_author').val(),
			n_lyrics = $('#n_lyrics').val(),
			n_meditation = $('#n_meditation').val(),
			n_release_date = $('#n_release_date').val();

			befBtn = "<i class='icon-hdd-2'></i> Update this song informations";
			aftBtn = "<i class='icon-spin4 animate-spin'></i> Updating...";

		if ((u_id_song === "" || u_id_song === null) || (n_title === "" || n_title === null) || (n_author === "" || n_author === null) || (n_lyrics === "" || n_lyrics === null) || (n_release_date === "" || n_release_date === null)) {
			alert('You must fill in all the fields !')
		}

		else {

			$('#update-song-btn').html(aftBtn);

			var datas = $(this).serialize();

			$.ajax({

				type: 'POST',
				url: 'php_codes/songUpdate.php',
				data: datas,

				success: function (results) {
					
					if (results.includes('update_success')) {
						$('#save-song-btn').html(befBtn);
						alert('The song has been updated successfully !');
						setTimeout (function (){
							location.href=location.href;
						}, 1000);
					}
					else if (results.includes('Title_Exist')) {
						$('#update-song-btn').html(befBtn);
						alert('This title is already used by an another song !');
					}
					else if (results.includes('Date_Exist')) {
						$('#update-song-btn').html(befBtn);
						alert('Another song will be released on this date ! Change this one !');
					}
					else if (results.includes('Date_Passed')) {
						$('#update-song-btn').html(befBtn);
						alert('This release day has passed ! Choose a future date !');
					}
					else {
						$('#update-song-btn').html(befBtn);
						alert('An server error occured at the time of the update !' + results);
					}

				},

				error : function () {
					$('#update-song-btn').html(befBtn);
					alert('An script error occured at the time of the update !');
				}

			});

		}

	});
	
	// Envoi des data pour la suppression des songs

	$('.del_btnSong').on('click', function () {
		
		var d_id_song = $(this).parent().children('.del_idSong').val();

			befBtn = "YES";
			aftBtn = "<i class='icon-spin4 animate-spin'></i>";

		if (d_id_song === "" || d_id_song === null) {
			alert('No song to delete !')
		}

		else {

			$(this).html(aftBtn);

			$.ajax({

				type: 'POST',
				url: 'php_codes/songDelete.php',
				data: "d_id_song=" + d_id_song,

				success: function (results) { 
					
					if (results.includes('delete_success')) {
						$('#del_btnSong'+d_id_song).html(befBtn);
						alert('The song has been deleted successfully !');
						$('#deleteSongModal'+d_id_song).modal('hide');
						$('#deleteSongModal'+d_id_song).parent().parent().slideUp();

						setTimeout (function (){
							location.href=location.href;
						}, 1000);

					}
					else {
						$('#del_btnSong'+d_id_song).html(befBtn);
						alert('An server error occured at the time of the delete !' + results);
					}

				},

				error : function () {
					$('#del_btnSong'+d_id_song).html(befBtn);
					alert('An script error occured at the time of the delete !');
				}

			});

		}

	});

});