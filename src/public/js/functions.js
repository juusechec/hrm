function createChannel() {
    window.bc_hrm_channel = new BroadcastChannel('hrm_channel');
    bc_hrm_channel.onmessage = function (message) {
        if (message.data === 'reload') {
            window.location.reload();
        }
    }
}
createChannel();
function closeAndReloadMessage() {
    sendReloadMessage();
    window.close();
}
function sendReloadMessage() {
    bc_hrm_channel.postMessage('reload');
}