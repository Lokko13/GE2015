<?php

function _controller_url(){
	return base_url() . 'index.php/';
}

function _asset_url(){
   return base_url() . 'assets/';
}

function _css_url(){
   return _asset_url() . 'css/';
}

function _js_url(){
   return _asset_url() . 'js/';
}

function _img_url(){
   return _asset_url() . 'img/';
}