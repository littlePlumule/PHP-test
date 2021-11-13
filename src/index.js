import { getComments, addComments } from "./api"
import { appendcomment } from "./utils"
import { cssTemplate, loadMoreButtonHTML, formTemplate } from "./template"
import $ from "jquery"

let siteKey = '';
let apiUrl = '';
let containerElement = null;
let lastId = null
let isEnd = false
let commentsDOM = null;

export function init(options) {
    siteKey = options.siteKey;
    apiUrl = options.apiUrl;
    containerElement = $(options.containerSelector);
    containerElement.append(formTemplate)
    const styleElement = document.createElement('style')
    styleElement.type = 'text/css'
    styleElement.appendChild(document.createTextNode(cssTemplate))
    document.head.appendChild(styleElement)

    const commentsDOM = $(".comments")
    getNewComments()

    $('.comments').on('click', '.load-more', () => {
        getNewComments()
    })

    $(".add-comment-form").submit(e => {
        e.preventDefault();
        const newComment = {
            'site_key': siteKey,
            'nickname': $('input[name=nickname]').val(),
            'content': $('textarea[name=content]').val()
        }
        addComments(apiUrl, siteKey, newComment, data => {
            if (!data.ok) {
                alert(data.message)
                return
            }
            $('input[name=nickname]').val('')
            $('textarea[name=content]').val('')
            appendcomment(commentsDOM, newComment, true)
        })
    })
}

function getNewComments() {
    const commentsDOM = $(".comments")
    $('.load-more').hide()
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
            $('.load-more').hide()
        } else {
            lastId = comments[length - 1].id
            $('.comments').append(loadMoreButtonHTML)
        }

    })
}