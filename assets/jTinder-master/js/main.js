/**
 * jTinder initialization
 */

var count = 0

$("#tinderslide").jTinder({
	// dislike callback
    onDislike: function (item) {
    	count++;
    },
	// like callback
    onLike: function (item) {
    	current_project = document.getElementById(count)
    	image = (current_project.getAttribute("image"))
    	link = (current_project.getAttribute("link"))
    	data = [image, link]

    	$.ajax({
		  type: "Get",
		  url: "insert_into_db",
		  data: {image: image, link: link},
		});

    	count++;
    	/*var my_data = {image: image, description: description, link: link};
    	var xhr = new XMLHttpRequest();
    	xhr.open("POST", "http://localhost:8880/Crafter/index.php/user/insert_into_db", true);
    	xhr.onreadystatechange = function () {
        if (xhr.readyState != 4 || xhr.status != 200)
            return;
        };
        xhr.send(JSON.stringify(my_data));*/
    },
	animationRevertSpeed: 200,
	animationSpeed: 400,
	threshold: 1,
	likeSelector: '.like',
	dislikeSelector: '.dislike'
});

/**
 * Set button action to trigger jTinder like & dislike.
 */
$('.actions .like, .actions .dislike').click(function(e){
	e.preventDefault();
	$("#tinderslide").jTinder($(this).attr('class'));
});