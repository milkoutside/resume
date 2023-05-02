
export function ElementComment(comment,status) {


        if (status === true) {
            return `
                <div class="comments-container">
                    <div class="comments mx-4 mt-2">
                        <p data-user-name="${comment.userName}" class="fs-5 mx-2">${comment.userName}</p>
                        <p class="mx-2">${comment.comment}</p>
                        <div class="text-end me-2">
                            <span id="commentDelete" data-comment-id="${comment.id}">Удалить</span>
                            <span data-user-name="${comment.userName}">Ответить</span>
                        </div>
                    </div>
                </div>
            `;
        } else {
            return `
                <div class="comments-container">
                    <div class="comments mx-4 mt-2">
                        <p data-user-name="${comment.userName}" class="fs-5 mx-2">${comment.userName}</p>
                        <p class="mx-2">${comment.comment}</p>
                        <div class="text-end me-2">
                            <span id="reply" data-user-name="${comment.userName}">Ответить</span>
                        </div>
                    </div>
                </div>
            `;
        }

}
