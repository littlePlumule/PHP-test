import { getComments, addComments } from "./api"
import { appendcomment, appendStyle } from "./utils"
import { cssTemplate, getLoadMoreButton, getForm } from "./template"
import $ from "jquery"



export function init(options) {
    let siteKey = '';
    let apiUrl = '';
    let containerElement = null;
    let lastId = null
    let isEnd = false
    let commentsDOM = null;
    let loadMoreClassName
    let commentsClassName
    let commentsSelector
    let formClassName
    let formSelector

    siteKey = options.siteKey;
    apiUrl = options.apiUrl;
    loadMoreClassName = `${siteKey}-load-more`
    commentsClassName = `${siteKey}-comments`
    commentsSelector = '.' + commentsClassName
    formClassName = `${siteKey}-add-comment-form`
    formSelector = '.' + formClassName

    containerElement = $(options.containerSelector);
    containerElement.append(getForm(formClassName, commentsClassName))
    appendStyle(cssTemplate)


    commentsDOM = $(commentsSelector)
    getNewComments()

    $(commentsSelector).on('click', '.' + loadMoreClassName, () => {
        getNewComments()
    })

    $(formSelector).submit(e => {
        e.preventDefault();
        const nicknameDOM = $(`${formSelector} input[name=nickname]`)
        const contentDOM = $(`${formSelector} textarea[name=content]`)
        const newComment = {
            'site_key': siteKey,
            'nickname': nicknameDOM.val(),
            'content': contentDOM.val()
        }
        addComments(apiUrl, siteKey, newComment, data => {
            if (!data.ok) {
                alert(data.message)
                return
            }
            nicknameDOM.val('')
            contentDOM.val('')
            appendcomment(commentsDOM, newComment, true)
        })
    })

    function getNewComments() {
        const commentsDOM = $(commentsSelector)
        $('.' + loadMoreClassName).hide()
        if (isEnd) {
            return
        }
        getComments(apiUrl, siteKey, lastId, data => {
            if (!data.ok) {
                alert(data.message)
                return
            }

            const comments = data.discussions;
            for (let comment of comments) {
                appendcomment(commentsDOM, comment)
            }
            let length = comments.length
            if (length === 0) {
                isEnd = true
                $('.' + loadMoreClassName).hide()
            } else {
                lastId = comments[length - 1].id
                const loadMoreButtonHTML = getLoadMoreButton(loadMoreClassName)
                $(commentsSelector).append(loadMoreButtonHTML)
            }

        })
    }
}