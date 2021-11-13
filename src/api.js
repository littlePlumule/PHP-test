import $ from "jquery"
export function getComments(apiUrl, siteKey, before, cb) {

    let url = `${apiUrl}api_comments.php?site_key=${siteKey}`
    if (before) {
        url += '&before=' + before
    }

    $.ajax({
        url: url,

    }).done((data) => {
        cb(data)


    });
}
export function addComments(apiUrl, stieKey, data, cb) {
    $.ajax({
        type: 'POST',
        url: `${apiUrl}api_add_comments.php`,
        data: data
    }).done((data) => {
        cb(data)
    })
}