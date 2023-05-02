export class Like_dislikeApi {
    constructor() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }

    makeLike(){
        $(document).on('click', '.like', async function() {
            const postElement = $(this).closest('#post');
            const postId = $(this).data('post-id');
            let countDisLikes = parseInt(postElement.find('#countDisLikes').text());
            let countLikes = parseInt(postElement.find('#countLikes').text());
            try {
                const data = await $.post(`/like/${postId}`);
                switch (data)
                {
                    case '0':
                        postElement.find('#countLikes').text(countLikes-1);

                        break;
                    case '1':
                        postElement.find('#countDisLikes').text(countDisLikes-1);
                        postElement.find('#countLikes').text(countLikes+1);

                        break;
                    case '2':
                        postElement.find('#countLikes').text(countLikes+1);

                        break;
                }

            } catch (error) {
                console.error(error);
            }
        });
    }
    makeDislike(){
        $(document).on('click', '.dislike', async function() {
            const postElement = $(this).closest('#post');
            const postId = $(this).data('post-id');
            let countDisLikes = parseInt(postElement.find('#countDisLikes').text());

            let countLikes = parseInt(postElement.find('#countLikes').text());

            try {
                const data = await $.post(`/dislike/${postId}`);
                switch (data)
                {
                    case '0':
                        postElement.find('#countLikes').text(countLikes-1);
                        postElement.find('#countDisLikes').text(countDisLikes+1);
                        break;
                    case '1':
                        postElement.find('#countDisLikes').text(countDisLikes-1);
                        break;
                    case '2':
                        postElement.find('#countDisLikes').text(countDisLikes+1);
                        break;
                }

            } catch (error) {
                console.error(error);
            }
        });
    }


    }


