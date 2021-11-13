    export const cssTemplate = '.card{margin-top:12px;}'

    export function getForm(className, commentsClassName) {
        return `
        <div>
            <form class="${className}">
                <div class="mb-3">
                    <label class="form-label">暱稱</label>
                    <input name="nickname" type="text" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">留言內容</label>
                    <textarea class="form-control" name="content" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div class="${commentsClassName}">
            </div>
        </div>
        `
    }
    export function getLoadMoreButton(className) {
        return '<button class="${className} btn btn-primary">載入更多</button>'
    }