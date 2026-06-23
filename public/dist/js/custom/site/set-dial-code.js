"use strict";

/**
 * Build intl-tel-input options from config (PHONE_INPUT_CONFIG or legacy globals).
 * Shared option-building so onlyCountries/defaultCountry/utilJs are consistent.
 * @param {Object} config - { utilJs, defaultCountryCode?, defaultCountry?, onlyCountries?, allowedPhoneCountryCodes? }
 * @returns {Object} options for intlTelInput(elm, options)
 */
function getIntlTelInputOptions(config) {
    config = config || {};
    var utilJs = config.utilJs || (typeof window.utilJs !== 'undefined' ? window.utilJs : '');
    var defaultCountry = config.defaultCountryCode || config.defaultCountry || (typeof window.defaultCountryCode !== 'undefined' ? window.defaultCountryCode : '');
    var onlyCountries = config.onlyCountries || (typeof window.allowedPhoneCountryCodes !== 'undefined' && Array.isArray(window.allowedPhoneCountryCodes) ? window.allowedPhoneCountryCodes : null);
    if (!onlyCountries && config.allowedPhoneCountryCodes && Array.isArray(config.allowedPhoneCountryCodes)) {
        onlyCountries = config.allowedPhoneCountryCodes;
    }
    var options = {
        utilsScript: utilJs,
        showSelectedDialCode: true,
        initialCountry: defaultCountry || '',
    };
    if (Array.isArray(onlyCountries) && onlyCountries.length > 0) {
        options.onlyCountries = onlyCountries;
    }
    return options;
}
window.getIntlTelInputOptions = getIntlTelInputOptions;

var itiInstance = null;

function getPhoneInputConfig() {
    if (typeof window.PHONE_INPUT_CONFIG !== 'undefined' && window.PHONE_INPUT_CONFIG) {
        return window.PHONE_INPUT_CONFIG;
    }
    return {
        utilJs: typeof utilJs !== 'undefined' ? utilJs : '',
        defaultCountryCode: typeof defaultCountryCode !== 'undefined' ? defaultCountryCode : '',
        onlyCountries: typeof allowedPhoneCountryCodes !== 'undefined' ? allowedPhoneCountryCodes : [],
    };
}

function initIntlTelInput(identifier) {
    var config = getPhoneInputConfig();
    var options = getIntlTelInputOptions(config);
    itiInstance = window.intlTelInput($(identifier).get(0), options);
    $('.iti--allow-dropdown').addClass('w-full w-100');
    if (typeof window.applyPhoneInputOverrides === 'function') {
        window.applyPhoneInputOverrides();
    } else {
        applyDialCodeOverrides();
    }
}

function destroyIntlTelInput() {
    if (itiInstance) {
        itiInstance.destroy();
        itiInstance = null;
    }
}

/**
 * Country-specific corrections (e.g. Bangladesh +880 -> +88). Add more overrides here or via window.applyPhoneInputOverrides.
 */
function applyDialCodeOverrides() {
    if (typeof window.intlTelInputGlobals === 'undefined') return;
    var countryData = window.intlTelInputGlobals.getCountryData();
    for (var i = 0; i < countryData.length; i++) {
        if (countryData[i].iso2 === 'bd') {
            countryData[i].dialCode = '88';
        }
    }
    $('#iti-0__item-bd').attr('data-dial-code', '88');
    var $bdItem = $('#iti-0__item-bd .iti__dial-code');
    if ($bdItem.length) $bdItem.text('+88');
    if ($('.iti__selected-dial-code').text() === '+880') {
        $('.iti__selected-dial-code').text('+88');
    }
    setTimeout(function() {
        $('input[name="phone"]').each(function() {
            var currentValue = $(this).val();
            var sanitized = currentValue.replace(/\D/g, '');
            if (currentValue !== '' && currentValue[0] !== '0' && $('.iti__selected-dial-code').text() === '+88') {
                sanitized = '0' + sanitized;
            }
            $(this).val(sanitized);
        });
    }, 1000);
}

function ensureFormId(form) {
    if (form.id) return form.id;
    var id = 'phone-form-' + Math.random().toString(36).slice(2, 11);
    form.id = id;
    return id;
}

function setDialCode(parent, identifier) {
    if ($(identifier).length === 0) return;

    if ($(parent).find('.iti__flag-container').length === 0) {
        initIntlTelInput(identifier);
    }

    var dialCode = $(parent).find('.iti__selected-dial-code').text();
    if (!dialCode) {
        destroyIntlTelInput();
        initIntlTelInput(identifier);
        $(identifier).focus();
    }

    var $container = $(parent);
    var existing = $container.find('input[name="dial_code"]');
    if (existing.length) {
        existing.val(dialCode);
        return;
    }

    var hidden = document.createElement('input');
    hidden.type = 'hidden';
    hidden.name = 'dial_code';
    hidden.value = dialCode;
    var target = $container.get(0);
    if (target && target.tagName === 'FORM') {
        target.appendChild(hidden);
    } else {
        var form = $container.find('form').first().get(0);
        if (form) form.appendChild(hidden);
        else target.appendChild(hidden);
    }
}

function setupDialCode(containerId, inputName) {
    var $container = $(containerId);
    if ($container.length === 0) return;
    var selector = containerId + ' input[name="' + inputName + '"]';
    if ($container.find('input[name="' + inputName + '"]').attr('data-dial-code-initialized')) return;
    $container.find('input[name="' + inputName + '"]').attr('data-dial-code-initialized', '1');

    setDialCode(containerId, selector);
    $(selector).on('countrychange', function() {
        setDialCode(containerId, selector);
    });
}

$(function() {
    var config = getPhoneInputConfig();
    var options = getIntlTelInputOptions(config);

    document.querySelectorAll('form input[name="phone"]').forEach(function(phoneInput) {
        var form = phoneInput.closest('form');
        if (!form || phoneInput.getAttribute('data-dial-code-initialized')) return;
        var formId = ensureFormId(form);
        setupDialCode('#' + formId, 'phone');
    });
});

$(document).on('keyup', 'input[name="phone"]', function() {
    $(this).val($(this).val().replace(/\D/g, ''));
});

$(document).on('countrychange', '.cc-phone', function() {
    $('#my-modal').css('display', 'flex');
});

$('button[type="submit"]').on('click', function() {
    setTimeout(function() {
        $('input[type="phone"]').each(function() {
            var $input = $(this);
            var $error = $input.parent().find('.error');
            if ($error.length > 0) {
                $input.parent().css({ 'margin-bottom': '16px' });
                $input.off('keyup.dialCodeError').on('keyup.dialCodeError', function() {
                    $(this).parent().css({ 'margin-bottom': '0px' });
                });
            }
        });
    }, 10);
});
