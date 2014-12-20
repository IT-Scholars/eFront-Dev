function deleteModuleVLabData(el, id) {
	parameters = {'delete_data':id, method: 'get'};
	url = location.toString();
	ajaxRequest(el, url, parameters, onDeleteModuleVLabData);	
}
function onDeleteModuleVLabData(el, response) {
	if (response.evalJSON(true).status) {
		new Effect.Fade(el.up().up());
	} 
}
