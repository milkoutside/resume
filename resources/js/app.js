import './bootstrap';
import {CommentView} from './comment/commentView'
import {Like_dislikeApi} from './like&dislike/like_dislikeApi'
import {Publication} from './publication/publication'


$(function(){

    let like_dislike = new Like_dislikeApi();
    like_dislike.makeLike();
    like_dislike.makeDislike();
    let comm = new CommentView;
    comm.renderComments();
    comm.addComment();

    let p = new Publication();
    p.publicationMaker(); // переместили вызов метода publicationMaker() сюда

});

