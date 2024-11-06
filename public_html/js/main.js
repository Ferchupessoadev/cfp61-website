import HeaderController from './header/controller.js';

// header
const headerController = new HeaderController('user-dropdown', 'btn-user-dropdown');
headerController.init(headerController.idDropdown, headerController.idbtnDropdown);
headerController.listeners();
