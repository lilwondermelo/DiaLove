let overlay = $('.overlay');
let overlayState = (overlay.is(":visible")) ? 1 : 0;
function toggleOverlay() {
	if (overlayState) {
		overlay.hide();
		overlayState = 0;
	}
	else {
		overlay.css('display', 'flex');
		overlayState = 1;
	}
}