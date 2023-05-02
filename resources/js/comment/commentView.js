import { CommentApi } from './commentApi';
import { Comment } from './comment';
import { ElementCommentForm } from './commentElements/elementCommentForm';
import {ElementComment} from './commentElements/elementComment'
import {checkStatus} from './../admin/checkStatus';
import {validationComments} from './../validation/validation'

export class CommentView {
   renderComments() {

        let comments;

       $(document).on('click', '#renderComments', async function () {

                const commApi = new CommentApi();

                const commForm = new ElementCommentForm();

                const postId = $(this).data('post-id');
                commApi.deleteComment();

                const postElement = $(this).closest('#post');
                commApi.replyComment();

                // Выбираем все комментарии для текущего поста
                const commentsElements = postElement.find('.comments-container');

                const inputElements = postElement.find('.comment-form');

                // Если комментарии уже открыты, то скрываем их
                if (commentsElements.length > 0 || inputElements.length > 0) {

                    commentsElements.remove();

                    inputElements.remove();
                    $('.none-comments').remove()
                    return;
                }

                postElement.append(commForm.commentForm);

                let status;

                try {

                    const data = await commApi.getComments(postId);

                     comments = data.map(commentData => new Comment(commentData));

                     status = await checkStatus();

                    // Остальной код для отображения комментариев
                } catch (error) {

                    console.error(error);

                }

                let commentsElementsArray = '';
                if(comments.length == 0)
                {
                    postElement.append(`<div class="none-comments"><p class="fs-4 text-center">Комментариев еще нет</p></div>`);
                }
                else {
                    for (const comment of comments) {
                        commentsElementsArray += ElementComment(comment, status);
                    }
                    postElement.append(commentsElementsArray);
                }


                commForm.showButtons(postId,postElement)

                commForm.canselButtons()

            })


    }

    addComment(){

        $(document).on('click', '.comment-post', async function() {
            const postElement = $(this).closest('#post');

            const postId = $(this).data('post-id');

            let comm = postElement.closest('#post').find('.comment-form');

            let name = comm.find('#commentUser').val();

            let text = comm.find('#commentInput').val();
            if(!validationComments(name,text))
            {

                return;
            }
            let commApi = new CommentApi();

            let result = await commApi.createComment(postId, name, text);

            let data = new Comment(result);

            if(postElement.find('.none-comments').length > 0){

                postElement.find('.none-comments').remove()

                postElement.append(ElementComment(data))

                return;
            }

            postElement.find('.comments-container').last().after(ElementComment(data))

            postElement.find('#countComments').text(parseInt(postElement.find('#countComments').text()) + 1);

        })



    }

}
