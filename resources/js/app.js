import './bootstrap';

import Alpine from 'alpinejs';

import { closePopupDisc, openPopupDisc } from './popup.js';

window.closePopupDisc = closePopupDisc;
window.openPopupDisc = openPopupDisc;



window.Alpine = Alpine;

Alpine.start();
