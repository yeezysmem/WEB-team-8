
// The name of the selected language is stored in the Cookie 'language'

// Cookie getter:
function getCookie(cname) {
  let name = cname + "=";
  let ca = document.cookie.split(';'); // array of all cookies

  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }

  return ""; // default return value
}

// Cookie setter:
function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  let expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}



// On document load:
$(document).ready(function () {
  // Get current language:
  let currentLanguage = getCookie('language');
  if (currentLanguage == "") {
    currentLanguage = 'en';
  }

  setLanguage(currentLanguage);
});



// The main function to set a language on a page
function setLanguage(lang) {

  // The 'language' cookie is stored for half a year = 183 days
  setCookie('language', lang, 183);

  switch (lang) {
    case 'en':
      populateText(en);
      break;

    case 'ru':
      populateText(ru);
      break;

    case 'uk':
      populateText(uk);
      break;

    default:
      populateText(en);
      break;
  }
}


// Populating text to each id from the dictionary
function populateText(dict) {
  for (const [id, text] of Object.entries(dict)) {
    if ($('#' + id).length) { // if an element with such an id exists
      $('#' + id).text(text); // replace its contents with text
    }
  }
}







