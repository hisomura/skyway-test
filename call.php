<!DOCTYPE html>
<html>
<head lang="ja">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>SkyWay JS SDK Tutorial</title>
    <meta name="skyway-api-key" content="<?php require_once __DIR__ . '/utils.php'; echo get_skyway_api_key(); ?>">
    <link rel="stylesheet" href="style.css">
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
            <input type="text" placeholder="Call user id..." id="callto-id" value="katalist-skyway-call-test">
            <button href="#" class="pure-button pure-button-success" type="submit">Call</button>
        </form>
        <form id="end-call" class="pure-form">
            <p>Currently in call with <span id="their-id">...</span></p>
            <button href="#" class="pure-button pure-button-success" type="submit">End Call</button>
        </form>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.webrtc.ecl.ntt.com/skyway-latest.js"></script>
<script type="text/javascript" src="call.js"></script>
</html>