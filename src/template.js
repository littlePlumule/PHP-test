export const cssTemplate = '.card{margin-top:12px;}'
export const loadMoreButtonHTML = '<button class="load-more btn btn-primary">載入更多</button>'
export const formTemplate = `
    <div>
        <form class="add-comment-form">
            <div class="mb-3">
                <label for="nickname" class="form-label">暱稱</label>
                <input name="nickname" type="text" class="form-control" id="nickname" />
            </div>
            <div class="mb-3">
                <label for="textarea" class="form-label">留言內容</label>
                <textarea class="form-control" name="content" id="textarea" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="comments">
        </div>
    </div>
    `