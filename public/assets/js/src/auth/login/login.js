/**
 * import process
 */
import { init as processInit } from './process/process.js';

/**
 * static variable
 */
const passwordInput = $('#password');
const passwordAddon = $('#password-addon');

/**
 * toggle visibility
 */
const togglePasswordVisibility = () => {
  const isPasswordVisible = passwordInput.attr('type') === 'password';
  passwordInput.attr('type', isPasswordVisible ? 'text' : 'password');
  const eyeIconClass = isPasswordVisible ? 'mdi-eye-off-outline' : 'mdi-eye-outline';
  const eyeIcon = `<i class="mdi ${eyeIconClass} font-size-18 text-muted"></i>`;
  passwordAddon.html(eyeIcon);
};

/**
 * password addon on click
 */
passwordAddon.on('click', function () {
  togglePasswordVisibility();
});

processInit()