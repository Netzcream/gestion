/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import './styles/global.scss';
import "@fortawesome/fontawesome-free/js/all";



const $ = require('jquery');
global.$ = global.jQuery = $;

import '@popperjs/core';
window.bootstrap = require('bootstrap/dist/js/bootstrap.bundle.js');
import 'bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-icons/font/bootstrap-icons.css';
import 'datatables.net-bs';
import 'datatables.net-bs/css/dataTables.bootstrap.min.css';




$(document).ready(function() {

	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl)
	})

	var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
	var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		return new bootstrap.Popover(popoverTriggerEl)
	})


	$('table.datatable').DataTable(
	{
		responsive: true,
		language: {
			url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json',
		},


	}
	);
	
});