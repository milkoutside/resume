export class ElementCommentForm     {
    isActive = false;
   commentForm = `<div class="comment-form">
    <div class="input-name mx-4">
          <input placeholder="Имя" id="commentUser" type="text">
    </div>

    <div class="comment-textarea mx-4">
        <textarea id="commentInput" class="comment-input" placeholder="Комментарий"></textarea>
    </div>
</div>`

    showButtons(postId, postElement) {
        const commInput = postElement.find('#commentInput');

        commInput.on('click', function() {
            if (postElement.find('.comment-actions').length <= 0) {
                const commForm = postElement.find('.comment-textarea')
                commForm.append(`<div class="comment-actions">
                <button class="comment-cancel">Отменить</button>
                <button data-post-id="${postId}"  class="comment-post">Опубликовать</button>
            </div>`)
            }
        });
    }
    canselButtons(postElement){
        $(document).off('click', '.comment-cancel').on('click', '.comment-cancel', function() {
            let commentsElements = postElement.find('.comment-actions');
            commentsElements.remove();
        })
    }

}
