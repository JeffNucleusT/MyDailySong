$(function () {
	
	$('#btn-search1').click(function (e) {

		e.preventDefault();

		var type_search1 = $('.type_search1').val(),
			search1 = $('.search1').val();

		songSearch(type_search1, search1, $('.type_search1'), $('.search1'));
	});

	$('#btn-search2').click(function (e) {

		e.preventDefault();

		var type_search2 = $('.type_search2').val(),
			search2 = $('.search2').val();

		songSearch(type_search2, search2, $('.type_search2'), $('.search2'));
	});

});