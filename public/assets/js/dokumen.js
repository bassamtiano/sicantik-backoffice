$(document).ready(function() {

	$('.menu_content').hide();
	$('.konten-input-group').hide();
	$('.konten-tambah-item').hide();
	$('.konten-tambah-devider').hide();
	$('#menu_utama').show();

	// $('.menu_content').dblclick(function() {
	// 	$('.menu_content#menu_utama').toggle();
	// 	$('.dokumen_paper_wrapper').toggleClass('full');
	// });

	get_table_referensi();
	get_radio_table_referensi();
	get_check_table_referensi();
	dom_test();

	$('.btn_menu_wrapper').click(function() {
		var active_id = this.id.substring(4);

		$('.menu_content').hide();
		$('#' + active_id).show();
		$('.btn_menu_wrapper').removeClass('active');
		$('#' + this.id).addClass('active');
	});

	$('.btn-menu').click(function() {
		// alert(this.id);
	});	

	$('.dokumen_konten').click(function() {
		alert(this.id);
	});

	$('.konten-tambah-item').click(function() {
		$()
		alert(this.id);
	});
});

function menu($menu_bagian, $menu_wrapper) {
	$('.btn_menu_wrapper' + menu_wrapper).hide();
	$('.' + menu_bagian).show();
}

function dokumen_configuration() {
	
}

function dokumen_print_configuration() {
	alert('test');
}

function ShowSelection() {
	alert('test');
}

function toggle_konten_tambah() {
	$('.konten-tambah-item').toggle();
	$('.konten-tambah-devider').toggle();
}

function get_table_referensi() {
	$.getJSON( "/sicantik/index.php/dokumen_referensi", function( data ) {

	var items = ["<option value='null'>-- Pilih Referensi --</option>"];
	$.each( data, function(key, val ) {
		items.push( "<option value='" + val + "''>" + val + "</option>" );
	});

	$( "<select/>", {
		"class": "input-select",
		"id" : "konten_option",
		html: items.join( "" )
		}).appendTo( "#option_referensi" );
	});

}

function get_radio_table_referensi() {
	$.getJSON( "/sicantik/index.php/dokumen_referensi", function( data ) {

	var items = ["<option value='null'>-- Pilih Referensi --</option>"];
	$.each( data, function(key, val ) {
		items.push( "<option value='" + val + "''>" + val + "</option>" );
	});

	$( "<select/>", {
		"class": "input-select",
		"id" : "konten_option",
		html: items.join( "" )
		}).appendTo( "#radio_referensi" );
	});

}

function get_check_table_referensi() {
	$.getJSON( "/sicantik/index.php/dokumen_referensi", function( data ) {

	var items = ["<option value='null'>-- Pilih Referensi --</option>"];
	$.each( data, function(key, val ) {
		items.push( "<option value='" + val + "''>" + val + "</option>" );
	});

	$( "<select/>", {
		"class": "input-select",
		"id" : "konten_option",
		html: items.join( "" )
		}).appendTo( "#check_referensi" );
	});

}

function dom_test() {
	$( "<input/>", {
		"type": "text",
		}).appendTo( ".dom_test" );
	
}


function tambah_konten() {
	var type = 'option';

	if(type == 'option') {
		konten_option();
	}


}

function konten_option() {
	var ref_selected = $('#konten_option option:selected').text();
	var dom = '<div></div>'

	$('.paper_content').append(ref_selected);
}