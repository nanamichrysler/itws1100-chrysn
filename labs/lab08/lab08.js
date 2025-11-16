$(document).ready(function() {
	
  	$.ajax({
   	 	type: "GET",
   	 	url: "lab08.json",
   	 	dataType: "json",
   	 	success: function(responseData, status){
   	  		var output = '';  
			var searchData = []; //list of lab titles
            var linkMap = {}; //title => link

    	 	$.each(responseData.projectItem, function(i, item) {
				output += '<div class="card"><a href= "' + item.link + '"><h3>' + item.number + '</h3>';
				output += '</a>';
				output += '<p>' + item.title + '</p>';
				output += '</div>';

				searchData.push(item.title); // lab title
				searchData.push(item.number); //lab number

				linkMap[item.title] = item.link;
				linkMap[item.number] = item.link;
      		});
			$('#lab-list').html(output);

			$("#lab-search").autocomplete({ //created a search bar to search for labs
                source: searchData,
                select: function(event, ui) {
                    window.location.href = linkMap[ui.item.value];
                }
            });
        },
		error: function(msg) {
			// there was a problem
			alert("There was a problem: " + msg.status + " " + msg.statusText);
    	}
	});
});