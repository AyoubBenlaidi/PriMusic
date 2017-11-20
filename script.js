$("document").ready(function(){
	$("#instr_id").change(function(){
		var params = {
		action: "getInstrument",
		instr_id: $(this).val()
		};
		if ($(this).val() == "") {
			$("#showInstr").html("");
			$("#instrButton").hide();
		}
		else {
			$.ajax({
				type: "GET",
				dataType: "json",
				url: "AfficherListe.php",
				data: params,
				success: function(data) {
					var htmlArray = "";
					for(var i = 0; i < data.length; i++) {
						htmlArray += "<tr>"
						for(var j = 0; j < 4; j++) {
							htmlArray +=  "<td>".concat(data[i][j], "</td>");
						}
						htmlArray += "</tr>"
					}
					$("#showInstr").html(
					"<h3>Adhérents jouant du <b>" + $("#instr_id :selected").text() + "</b></h3><br><table><tr><th>Nom</th><th>Prénom</th><th>Date de naissance</th><th>Rentre seul ?</th></tr>"+  htmlArray + "</table><br>"
					);
					$("#instrButton").show();
				}
			});
		}
	}).trigger( "change" );

	$("#prof_id").change(function(){
		var params = {
		action: "getProf",
		prof_id: $(this).val()
		};
		if ($(this).val() == "") {
			$("#showProf").html("");
			$("#profButton").hide();
		}
		else {
			$.ajax({
				type: "GET",
				dataType: "json",
				url: "AfficherListe.php",
				data: params,
				success: function(data) {
					var htmlArray = "";
					for(var i = 0; i < data.length; i++) {
						htmlArray += "<tr>"
						for(var j = 0; j < 4; j++) {
							htmlArray +=  "<td>".concat(data[i][j], "</td>");
						}
						htmlArray += "</tr>"
					}
					$("#showProf").html(
					"<h3>Adhérents pour le professeur <b>" + $("#prof_id :selected").text() + "</b></h3><table><tr><th>Nom</th><th>Prénom</th><th>Date de naissance</th><th>Rentre seul ?</th></tr>"+  htmlArray + "</table><br>"
					);
					$("#profButton").show();
				}
			});
		}
	}).trigger( "change" );

	$("#fmt_id").change(function(){
		var params = {
		action: "getFormation",
		fmt_id: $(this).val()
		};
		if ($(this).val() == "") {
			$("#showFormation").html("");
			$("#formationButton").hide();
		}
		else {
			$.ajax({
				type: "GET",
				dataType: "json",
				url: "AfficherListe.php",
				data: params,
				success: function(data) {
					var htmlArray = "";
					for(var i = 0; i < data.length; i++) {
						htmlArray += "<tr>"
						for(var j = 0; j < 4; j++) {
							htmlArray +=  "<td>".concat(data[i][j], "</td>");
						}
						htmlArray += "</tr>"
					}
					$("#showFormation").html(
					"<h3>Adhérents avec la formation <b>" + $("#fmt_id :selected").text() + "</b></h3><table><tr><th>Nom</th><th>Prénom</th><th>Date de naissance</th><th>Rentre seul ?</th></tr>"+  htmlArray + "</table><br>"
					);
					$("#formationButton").show();
				}
			});
		}
	}).trigger( "change" );

	$("#atl_id").change(function(){
		var params = {
		action: "getAtelier",
		atl_id: $(this).val()
		};
		if ($(this).val() == "") {
			$("#showAtelier").html("");
			$("#atelierButton").hide();
		}
		else {
			$.ajax({
				method: "GET",
				dataType: "json",
				url: "AfficherListe.php",
				data: params,
				success: function(data) {
					var htmlArray = "";
					for(var i = 0; i < data.length; i++) {
						htmlArray += "<tr>"
						for(var j = 0; j < 4; j++) {
							htmlArray +=  "<td>".concat(data[i][j], "</td>");
						}
						htmlArray += "</tr>"
					}
					$("#showAtelier").html(
					"<h3>Adhérents avec l'atelier <b>" + $("#atl_id :selected").text() + "</b></h3><table><tr><th>Nom</th><th>Prénom</th><th>Date de naissance</th><th>Rentre seul ?</th></tr>"+  htmlArray + "</table><br/>"
					);
					$("#atelierButton").show();
				}
			});
		}
	}).trigger( "change" );

	$("#cmn_id").change(function(){
		var params = {
		action: "getCommune",
		cmn_id: $(this).val()
		};
		if ($(this).val() == "") {
			$("#showCommune").html("");
			$("#communeButton").hide();
		}
		else {
			$.ajax({
				method: "GET",
				dataType: "json",
				url: "AfficherListe.php",
				data: params,
				success: function(data) {
					var htmlArray = "";
					for(var i = 0; i < data.length; i++) {
						htmlArray += "<tr>"
						for(var j = 0; j < 4; j++) {
							htmlArray +=  "<td>".concat(data[i][j], "</td>");
						}
						htmlArray += "</tr>"
					}
					$("#showCommune").html(
					"<h3>Adhérents habitant à <b>" + $("#cmn_id :selected").text() + "</b></h3><table><tr><th>Nom</th><th>Prénom</th><th>Date de naissance</th><th>Rentre seul ?</th></tr>"+  htmlArray + "</table><br/>"
					);
					$("#communeButton").show();
				}
			});
		}
	}).trigger( "change" );

	$("#divers").change(function(){
		var params = {
		action: "getDivers",
		divers_id: $(this).val()
		};
		if ($(this).val() == "") {
			$("#showDivers").html("");
			$("#diversButton").hide();
		}
		else {
			$.ajax({
				method: "GET",
				dataType: "json",
				url: "AfficherListe.php",
				data: params,
				success: function(data) {
					var htmlArray = "";
					for(var i = 0; i < data.length; i++) {
						htmlArray += "<tr>"
						for(var j = 0; j < 4; j++) {
							htmlArray +=  "<td>".concat(data[i][j], "</td>");
						}
						htmlArray += "</tr>"
					}
					$("#showDivers").html(
					"<h3>Liste : <b>" + $("#divers :selected").text() + "</b></h3><table><tr><th>Nom</th><th>Prénom</th><th>Date de naissance</th><th>Rentre seul ?</th></tr>"+  htmlArray + "</table><br/>"
					);
					$("#diversButton").show();
				}
			});
		}
	}).trigger( "change" );

	$('#instrButton').click(function(){
		var id = $("#instr_id").val();
		var clickButton = $(this).attr('id');
		window.open("./csv.php/?id=" + id + "&button=" + clickButton);
	});

	$('#profButton').click(function(){
		var id = $("#prof_id").val();
		var clickButton = $(this).attr('id');
		window.open("./csv.php/?id=" + id + "&button=" + clickButton);
	});

	$('#formationButton').click(function(){
		var id = $("#fmt_id").val();
		var clickButton = $(this).attr('id');
		window.open("./csv.php/?id=" + id + "&button=" + clickButton);
	});

	$('#atelierButton').click(function(){
		var id = $("#atl_id").val();
		var clickButton = $(this).attr('id');
		window.open("./csv.php/?id=" + id + "&button=" + clickButton);
	});

	$('#communeButton').click(function(){
		var id = $("#cmn_id").val();
		var clickButton = $(this).attr('id');
		window.open("./csv.php/?id=" + id + "&button=" + clickButton);
	});

	$('#diversButton').click(function(){
		var id = $("#divers").val();
		var clickButton = $(this).attr('id');
		window.open("./csv.php/?id=" + id + "&button=" + clickButton);
	});
	
});
