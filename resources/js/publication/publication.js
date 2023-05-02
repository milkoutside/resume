import {PublicationApi} from './publicationApi'
export class Publication {

    publicationMaker() {
        let pApi = new PublicationApi();
        $('#add-post').on('click', function () {
            $("body").after(`
            <div class="add-post-body">
                <div class="container">
                    <p class="text-white fs-2">Текст</p>

                    <textarea id="post-new-text"></textarea>
                    <button id="create-new-post">create</button>
                </div>
            </div>
        `);
            pApi.create();
        })
    }
}
