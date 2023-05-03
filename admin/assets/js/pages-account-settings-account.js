// /**
//  * Account Settings - Account
//  */

// 'use strict';

// /* This code is adding an event listener to the document object that waits for the DOM to be fully
// loaded before executing the function. The function then selects the form element for deactivating
// the account and updates/reset the user image of the account page. It does this by selecting the
// image element and the file input element, and adding event listeners to them. When a new file is
// selected, the image source is updated to display the selected file. When the reset button is
// clicked, the file input value is cleared and the image source is reset to its original value. */
// document.addEventListener('DOMContentLoaded', function (e) {
//   (function () {
//     const deactivateAcc = document.querySelector('#formAccountDeactivation');

//     // Update/reset user image of account page
//     let accountUserImage = document.getElementById('uploadedAvatar');
//     const fileInput = document.querySelector('.account-file-input'),
//       resetFileInput = document.querySelector('.account-image-reset');

//     if (accountUserImage) {
//       const resetImage = accountUserImage.src;
//       fileInput.onchange = () => {
//         if (fileInput.files[0]) {
//           accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
          
//         }
//       };
//       resetFileInput.onclick = () => {
//         fileInput.value = '';
//         accountUserImage.src = resetImage;
//       };
//     }
//   })();
// });
