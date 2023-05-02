export class PublicationApi {
    constructor() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }

    create(){
        $('#create-new-post').on('click', function(){
           let post = {
                text:""
            }
            let text = $('#post-new-text').val();
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            post.text = text;
            $.ajax({
                url: '/create-new',
                type: 'POST',
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                data: post,
                success: function(response) {
                    console.log(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus, errorThrown);
                }
            });
        });
    }
}
