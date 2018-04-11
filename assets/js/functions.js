
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

// to the top
function toTheTop() {

	$('html, body').animate({
		scrollTop : 0
	}, 600);

	return false;

}

// Like a song
function likeOrDislike(id_song, vote) {

	if(vote == 'like') { 
		$btn1 = $('#likeBtn');
		$btn2 = $('#dislikeBtn');
		var ttle = 'I don\'t like !';
	} 
	else if(vote == 'dislike') {
		$btn1 = $('#dislikeBtn');
		$btn2 = $('#likeBtn');
		var ttle = 'I like !';
	}
	
	$.ajax({
		type : 'POST',
		url : 'like-dislike.php',
		data : 'id_song=' + id_song + '&vote=' + vote,

		success : function (result) {
			if (result.includes('vote_success')) {
				$btn1.css({
					'transform' : 'scale(1.2)'
				}).attr('disabled', '');

				if ($btn2.prop('disabled') == true) {
					$btn2.removeAttr('disabled').attr({
						'title' : ttle,
						'data-original-title' : ttle
					}).css({
						'transform' : 'scale(1)',
						'z-index' : '6666'
					});
				}

				$btn1.tooltip('hide').attr({
					'title' : 'Already choose !',
					'data-original-title' : 'Already choose !'
				});
				
				var row = result.split('|');
				$('#likeBtn .voteCount').text(row[1]);
				$('#dislikeBtn .voteCount').text(row[2]);
			} 
			else {
				alert('A server error occured at the time of your vote hhh !');
			}
		},

		error : function () {
			alert('A script error occured at the time of your vote !');
		}
	});

}

// Is it an email form ?
function IsEmail(email) {
	var regex1 = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex1.test(email);
}

// Searching for songs by name, authors, release dates
function songSearch(type_search, search, $objet1, $objet2) {
	
	if (type_search === "" || type_search === null || search === "" || search === null) {
			
			if (type_search === "" || type_search === null) {
				$objet1.focus()
			}
			if (search === "" || search === null) {
				$objet2.focus()
			}

		} else {

			$.ajax({
				url : 'phpcs/songSearch.php',
				type : 'GET',
				data : 'type_search=' + type_search + '&search=' + search,

				success : function (result) {
					if (result.includes('s_error')) {
						alert('Server Error !')
					} else {
						$('.result-songs').empty();
						$('.result-songs').prepend(result);
					}
				},

				error : function () {
					alert('Script Error !')
				}
			});

		}

}