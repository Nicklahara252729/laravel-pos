/**
 * set default value
 */
const base_url = window.location.origin + '/';

/**
 * get last uri segment
 */
const parts = window.location.href.split('/');
const lastSegment = parts.pop() || parts.pop();  // handle potential trailing slash

/**
 * utilities registration
 */
function loadUtilities(urls, callback) {
    var loadedCount = 0;

    function loadUtils(url) {
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src = url;
        script.onload = function () {
            loadedCount++;
            if (loadedCount === urls.length) {
                // Panggil callback setelah semua skrip dimuat
                callback();
            }
        };
        document.body.appendChild(script);
    }

    // Memuat setiap skrip
    for (var i = 0; i < urls.length; i++) {
        loadUtils(urls[i]);
    }
}

// Daftar file JavaScript yang akan dimuat
var scriptUrls = [
    base_url + 'assets/js/utilities/message-util.js',
    base_url + 'assets/js/utilities/alert-util.js',
    base_url + 'assets/js/utilities/signout-util.js',
    base_url + 'assets/js/utilities/request-util.js',
    base_url + 'assets/js/utilities/jwt-util.js',
    base_url + 'assets/js/utilities/date-picker-util.js',
    base_url + 'assets/js/utilities/outlet-util.js',
    base_url + 'assets/js/utilities/notification-util.js',
    base_url + 'assets/js/utilities/icon-util.js',
];

// Memuat skrip-skrip secara dinamis
loadUtilities(scriptUrls, function() {});

/**
 * helper registration
 */
function loadHelpers(urls, callback) {
    var loadedCount = 0;

    function loadHelper(url) {
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src = url;
        script.onload = function () {
            loadedCount++;
            if (loadedCount === urls.length) {
                // Panggil callback setelah semua skrip dimuat
                callback();
            }
        };
        document.body.appendChild(script);
    }

    // Memuat setiap skrip
    for (var i = 0; i < urls.length; i++) {
        loadHelper(urls[i]);
    }
}

// Daftar file JavaScript yang akan dimuat
var scriptUrls = [
    base_url + 'assets/js/helpers/MockApi.js',
];

// Memuat skrip-skrip secara dinamis
loadHelpers(scriptUrls, function() {});
