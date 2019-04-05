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

function showSelect(id) {
    $('label[for="' + id + '"]').show();
    $('#' + id).selectpicker('show');
    $('label[for="' + id + '"]').parent().show();
}

function hideSelect(id) {
    $('label[for="' + id + '"]').hide();
    $('#' + id).selectpicker('hide');
    $('label[for="' + id + '"]').parent().hide();
}

function showInput(id) {
    $('label[for="' + id + '"]').show();
    $('#' + id).show();
    $('#' + id).parent().show();
}

function hideInput(id) {
    $('label[for="' + id + '"]').hide();
    $('#' + id).hide();
    $('#' + id).parent().hide();
}

function getTagName(id) {
    return $('#' + id).prop('tagName');
}

function showField(id) {
    const tagName = getTagName(id);
    if (tagName === 'INPUT') {
        showInput(id);
    } else if (tagName === 'SELECT') {
        showSelect(id);
    }
}

function hideField(id) {
    const tagName = getTagName(id);
    if (tagName === 'INPUT') {
        hideInput(id);
    } else if (tagName === 'SELECT') {
        hideSelect(id);
    }
}
