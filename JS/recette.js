// pour les étoiles
function Do(element, event, action) {
	element.addEventListener(event, function() {
		for (let i = 1; i <= etoile.length/2; i++) {
			if (element.classList.contains("etoile" + i)){
				for (let y = 1; y <= etoile.length/2; y++) {
					if (y < i) {
						const etoile = document.querySelectorAll(".etoile" + y);
						etoile.forEach(element => {
							if (action == "add") {
								element.classList.add("hover");
							}else if (action == "remove") {
								element.classList.remove("hover");
							}
						});
					}
				}
			}
		}
	});
}

const etoile = document.querySelectorAll(".etoile");

etoile.forEach(element => {
	Do(element, "mouseover", "add");
	Do(element, "mouseout", "remove");

	element.addEventListener("click", function() {
		element.classList.add("note");
		for (let i = 1; i <= etoile.length/2; i++) {
			if (element.classList.contains("etoile" + i)) {
				for (let y = 1; y <= etoile.length/2; y++) {
					if (y < i) {
						const etoile = document.querySelectorAll(".etoile" + y);
						etoile.forEach(element => {
							element.classList.add("note");
						});
					} else if (y > i) {
						const etoile = document.querySelectorAll(".etoile" + y);
						etoile.forEach(element => {
							element.classList.remove("note");
						});
					}
				}
			}
		}
	});
});

// prérempli les etoiles quand on à déja noté
var jsonnote = document.querySelector('#jsonnote');
etoile.forEach(element => {
	for (let z = 1; z <= jsonnote.value; z++) {
		if (element.classList.contains("etoile" + z)) {
			element.classList.add("note");
		}
		
	}
});

// pour ajouter aux favoris
$(document).ready(function(){
	const nickname = document.querySelector("#sessionNickname");
	const favoris = document.querySelector(".fav");
	favoris.addEventListener("click", function(){
		if (favoris.classList.contains("fav-active") == true) {
			$.ajax({
				type: 'POST',
				data: {removefav: JSON.stringify(nickname.value)},
				dataType: 'json'
			})
			favoris.classList.remove("fav-active");
		} else if (favoris.classList.contains("fav-active") == false) {
			$.ajax({
				type: 'POST',
				data: {addfav: JSON.stringify(nickname.value)},
				dataType: 'json',
			});
			favoris.classList.add("fav-active");
		}
	})
});

// pour les notes 
$(document).ready(function(){
	const etoiles = document.querySelectorAll(".etoile");
	etoiles.forEach(element => {
		element.addEventListener("click", function () {
			const classes = element.className.split(/\s+/);
			const note = classes[1].substr(6, 1);
			$.ajax({
				type: 'POST',
				data: {addnote: JSON.stringify(note)},
				dataType: 'json',
			});
		})
	});
});