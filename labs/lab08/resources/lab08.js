$(document).ready(function() {
	
  	$.ajax({
   	 	type: "GET",
   	 	url: "lab08.json",
   	 	dataType: "json",
   	 	success: function(responseData, status){
   	  		var output = '';  
			var searchData = [];
            var linkMap = {};

    	 	$.each(responseData.projectItem, function(i, item) {
				output += '<div class="card">';
				output += '<h3>' + item.number + '</h3>';
				output += '<p>' + item.title + '</p>';
				
				// expandable section — this div is required for toggleCard to work
				output += '<div class="card-details">';
				output += '<p>' + (item.description || '') + '</p>';
				output += '<div class="button-labs-container">';
				if (item.linkLabel) {
					output += '<a class="button-labs" href="' + item.link + '" target="_blank">' + (item.linkLabel) + '</a>';
				}
				if (item.secondLabel) {
					output += '<a class="button-labs" href="' + item.secondLink + '" target="_blank">' + (item.secondLabel) + '</a>';
				}
				output += '</div>';
				output += '</div>';
				
				output += '<div style="height: 28px;"></div>';
				output += '<button class="card-toggle" onclick="toggleCard(this)">Learn more ▾</button>';
				output += '</div>';

				searchData.push(item.title);
				searchData.push(item.number);
				linkMap[item.title] = item.link;
				linkMap[item.number] = item.link;
			});
			$('#lab-list').html(output);

			$("#lab-search").autocomplete({
                source: searchData,
                select: function(event, ui) {
                    window.location.href = linkMap[ui.item.value];
                }
            });
        },
		error: function(msg) {
			alert("There was a problem: " + msg.status + " " + msg.statusText);
    	}
	});
});

function toggleCard(btn) {
	const details = $(btn).closest('.card').find('.card-details')[0];
	const isOpen = $(details).toggleClass('open').hasClass('open');
	btn.textContent = isOpen ? 'Show less ▴' : 'Learn more ▾';
}