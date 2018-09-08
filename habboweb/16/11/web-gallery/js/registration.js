var pwErrors = [];
var pwTotal = [];

function showStatusMsg(field, msg, status) {
	$(field + "-content").innerHTML = msg;
	if (!Element.hasClassName($(field), "field-status-" + status)) {
		$(field).className = "field-status-" + status;
	}
}