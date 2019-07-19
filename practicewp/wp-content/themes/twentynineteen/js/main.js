var bpBtn = document.getElementById('bp-btn');
var bbContainer = document.getElementById('bp-container');



if(bpBtn){
	bpBtn.addEventListener("click",function(){
	var ourRequest = new XMLHttpRequest();
ourRequest.open('GET', magicalData.siteURL + "/wp-json/wp/v2/posts");
ourRequest.onload = function() {
  if (ourRequest.status >= 200 && ourRequest.status < 400) {
    var data = JSON.parse(ourRequest.responseText);
    createHTML(data);
    bpBtn.remove();
  } else {
    console.log("We connected to the server, but it returned an error.");
  }
};

ourRequest.onerror = function() {
  console.log("Connection error");
};

ourRequest.send();
	});	
}

function createHTML(postsData){
	var ourHtmlString='';
	for(i=0; i<postsData.length;i++){
		ourHtmlString+='<h2>'+postsData[i].title.rendered+'</h2>';
		ourHtmlString+='<p>'+postsData[i].content.rendered;
	}
bbContainer.innerHTML=ourHtmlString;
}

//quick add posts button

var quickAddButton = document.querySelector("#quick-add-button");

if (quickAddButton) {
	quickAddButton.addEventListener("click",function(){
		var ourPostData = {
			"title": document.querySelector('.admin-quick-add [name="title"]').value,
			"content": document.querySelector('.admin-quick-add [name="content"]').value,
			"status": "publish"
		}
		var createPost= new XMLHttpRequest;
		createPost.open("POST",magicalData.siteURL + "/wp-json/wp/v2/posts");
		createPost.setRequestHeader("X-WP-Nonce",magicalData.nonce);
		createPost.setRequestHeader("Content-Type","application/json;charset=UTF-8");
		createPost.send(JSON.stringify(ourPostData));
		createPost.onreadystatechange = function(){
			if (createPost.readyState== 4 ) {
				if (createPost.status== 201 ) {
					document.querySelector('.admin-quick-add [name="title"]').value='';
					document.querySelector('.admin-quick-add [name="content"]').value='';
				}else{
					alert('error,try again');
				}
			}
		}
	});
}