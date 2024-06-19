document.getElementById('website').addEventListener('change', function(){
	const site = document.getElementById('website');
	const sitename = document.getElementById('site-name');
	sitename.innerText = (site.value==="")?'site':site.value;
});