'use strict';

let localStream = null;
let peer = null;
let existingCall = null;

navigator.mediaDevices.getUserMedia({ audio: true, audio: true })
  .then(function (stream) {
    // Success
    $('#my-audio').get(0).srcObject = stream;
    localStream = stream;
  }).catch(function (error) {
    // Error
    console.error('mediaDevice.getUserMedia() error:', error);
    return;
  });

peer = new Peer(
  'katalist-skyway-call-test',
  {
    key: document.getElementsByName('skyway-api-key')[0].content,
    debug: 3
  });

peer.on('open', function () {
  $('#my-id').text(peer.id);
});
peer.on('error', function (err) {
  alert(err.message);
});
peer.on('close', function () {
});
peer.on('disconnected', function () {
});

// 発信
$('#make-call').submit(function (e) {
  e.preventDefault();
  const call = peer.call($('#callto-id').val(), localStream);
  setupCallEventHandlers(call);
});

// 切断
$('#end-call').click(function () {
  existingCall.close();
});

// 着信
peer.on('call', function (call) {
  $('.modal').modaal('open');
  $('#accept-call').on('click', function () {
    call.answer(localStream);
    setupCallEventHandlers(call);
    $('.modal').modaal('close');
  });

  $('#refuse-call').on('click', function () {
    call.close();
    $('.modal').modaal('close');
  });
});

function setupCallEventHandlers(call) {
  if (existingCall) {
    existingCall.close();
  };

  existingCall = call;

  call.on('stream', function (stream) {
    addAudio(call, stream);
    setupEndCallUI();
    $('#their-id').text(call.remoteId);
  });

  call.on('close', function () {
    removeAudio(call.remoteId);
    setupMakeCallUI();
  });
}

// audioの作成
function addAudio(call, stream) {
  $('#their-audio').get(0).srcObject = stream;
}

// audioの削除
function removeAudio(peerId) {
  $('#their-audio').get(0).srcObject = undefined;
}

function setupMakeCallUI() {
  $('#make-call').show();
  $('#end-call').hide();
}

function setupEndCallUI() {
  $('#make-call').hide();
  $('#end-call').show();
}
