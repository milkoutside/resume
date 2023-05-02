import {AlertDanger,AlertSuccess} from './alertElement/alertElement'
export function validationComments(name,text){

    const container = $('<div class="position-fixed top-0 end-0 p-3"></div>');
    $('body').append(container);

    if (name.length <= 3 || text.length <= 3) {

        let message = $(AlertDanger('Оба поля должны содержать не менее 3 символов!'));

        container.append(message);

        message.fadeIn(500).delay(2000).fadeOut(600, function() {

            container.remove();

        });

        return false;
    }
    else {
        let message = $(AlertSuccess('Комментарий успешно отправлен!'));
        container.append(message);
        message.fadeIn(500).delay(2000).fadeOut(600, function() {

            container.remove();

        });
        return true;
    }

}
