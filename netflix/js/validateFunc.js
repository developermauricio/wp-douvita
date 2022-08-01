function validate() {
    var ignoreFields = ['submit'];
    var allValid= true;
    $('.form_block input,.form_block select').each(function() {
        if(ignoreFields.indexOf($(this).attr('id')) == -1) {
            $(this).removeClass('error');
        }
    });

    $('.form_block input,.form_block select').each(function() {
        if(ignoreFields.indexOf($(this).attr('id')) == -1) {
            var rule = $(this).data('rule');
            if(rule) {
                var valid = window[rule]($(this));
                if(!valid) {
                    $(this).addClass('error');
                    allValid = false;
                    $(this).focus();
                    return false;
                }
            }
        }
    });

    return allValid;
}
function length(element) {
    var min = parseInt($(element).data('min'));
    var max = parseInt($(element).data('max'));
    var value = $(element).val().trim().replace(/\s/g, "");
    if(value.length >= min && value.length <= max) {
        return true;
    } else {
        return false;
    }
}

function card(element) {
    var value = $(element).val().trim().replace(/\s/g, "");
    var isNumber =  /^\d+$/.test(value);
    var validCard = validator.isCreditCard(value);
    if (!validCard || isNumber==false || (value.length < 15 || value.length > 16)) {
        return false
    } else {
        return true;
    }
}

function notEmpty(element) {
    var value = $(element).val().trim().replace(/\s/g, "");
    if(value == "" || value.trim().length == 0) {
        return false;
    } else {
        return true;
    }
}


