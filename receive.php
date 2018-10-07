<!DOCTYPE html>
<html>
<head lang="ja">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>SkyWay JS SDK Tutorial</title>
    <meta name="skyway-api-key" content="<?php require_once __DIR__ . '/utils.php';
    echo get_skyway_api_key(); ?>">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/modaal.min.css">

    <style>
        .modal_button {
            display: block;
            padding: 0.5em 0;
            border: none;
            border-radius: 20px;
            font-size: 4em;
            color: white;
            text-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
            margin: 2em auto;
            width: 40%;
        }

        #accept-call {
            background: rgb(28, 184, 65); /* this is a green */
        }

        #refuse-call {
            background: rgb(202, 60, 60); /* this is a maroon */
        }

        .buttons {
            margin: 3em auto;
        }
    </style>
</head>
<div class="pure-g">

    <!-- Audio area -->
    <div class="pure-u-2-3" id="audio-container">
        <audio id="their-audio" autoplay></audio>
        <audio id="my-audio" muted="true" autoplay></audio>
    </div>

    <!-- Steps -->
    <div class="pure-u-1-3">
        <h2>SkyWay Audio Chat</h2>

        <p>Your id: <span id="my-id">...</span></p>
        <p>Share this id with others so they can call you.</p>
        <h3>Make a call</h3>
        <form id="make-call" class="pure-form">
            <input type="text" placeholder="Call user id..." id="callto-id">
            <button href="#" class="pure-button pure-button-success" type="submit">Call</button>
        </form>
        <form id="end-call" class="pure-form">
            <p>Currently in call with <span id="their-id">...</span></p>
            <button href="#" class="pure-button pure-button-success" type="submit">End Call</button>
        </form>
    </div>
</div>

<a href="#modal" class="modal">Show</a>
<div id="modal" style="display:none; margin:0 auto">
    <p style="font-size: 2em; text-align: center">通話要求が来ています。通話を開始しますか。</p>
    <div class="buttons">
        <button id="accept-call" class="modal_button" type="button">OK</button>
        <button id="refuse-call" class="modal_button" type="button">NO</button>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/modaal.min.js"></script>
<script>
    $('.modal').modaal();
</script>
<script type="text/javascript" src="https://cdn.webrtc.ecl.ntt.com/skyway-latest.js"></script>
<script type="text/javascript" src="receive.js"></script>
</html>