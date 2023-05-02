import {CommentView} from "./../comment/commentView";

export class CommentApi {

    constructor() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }

    async getComments(postId) {
        try {
            const data = await $.get(`/comments/${postId}`);
            return data;
        } catch (error) {
            console.error(error);
        }
    }

    async createComment(postId,name,text) {

        try {
            const data =  await $.post(`/comments/${postId}/${name}/${text}`)
            return data;
        } catch (error) {
            console.error(error);
        }

    }


    deleteComment() {
        $(document).on('click', '#commentDelete', function() {
            alert('ok')
            const commentId = $(this).data('comment-id');


            $.post(`/comments/delete/${commentId}`, function(data) {

            }) // еще не готово
        });
    }
    replyComment()
    {
        $(document).on('click', '#reply', function() {
            const postElement = $(this).closest('#post');

            const userName = $(this).data('user-name');

            postElement.find('#commentInput').val(`@${userName} `);
        })
    }
    editComment() {
        // код редактирования комментария
    }
}
