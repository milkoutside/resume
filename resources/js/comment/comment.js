export class Comment {
    constructor({ id, userName, postId, comment, timeCreate, timeUpdate }) {
        this.setId(id);
        this.setUserName(userName);
        this.setPostId(postId);
        this.setComment(comment);
        this.setTimeCreate(timeCreate);
        this.setTimeUpdate(timeUpdate);
    }

    setId(id) {
        this.id = id;
    }

    setUserName(userName) {
        this.userName = userName;
    }

    setPostId(postId) {
        this.postId = postId;
    }

    setComment(comment) {
        this.comment = comment;
    }

    setTimeCreate(timeCreate) {
        this.timeCreate = timeCreate;
    }

    setTimeUpdate(timeUpdate) {
        this.timeUpdate = timeUpdate;
    }
}

