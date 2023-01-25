import './bootstrap';
import * as bootstrap from 'bootstrap/dist/js/bootstrap.bundle';

import jQuery from 'jquery';
window.$ = jQuery;
window.bootstrap = bootstrap;

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);
