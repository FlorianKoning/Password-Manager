import './bootstrap';

import Alpine from 'alpinejs';
import * as Helper from './Utils/helper.js';

// Helper functions
window.closeNotification = Helper.closeNotification;

window.Alpine = Alpine;

Alpine.start();
