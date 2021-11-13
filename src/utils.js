export function appendStyle(cssTemplate) {
    const styleElement = document.createElement('style')
    styleElement.type = 'text/css'
    styleElement.appendChild(document.createTextNode(cssTemplate))
    document.head.appendChild(styleElement)

}
export function escape(toOutput) {
    return toOutput.replace(/\&/g, '&amp;')
        .replace(/\</g, '&lt;')
        .replace(/\>/g, '&gt;')
        .replace(/\"/g, '&quot;')
        .replace(/\'/g, '&#x27')
        .replace(/\//g, '&#x2F');
}
export function appendcomment(container, comment, is_prepend) {
    const html = `
        <div class="card comment">
            <div class="card-header">
                ${escape(comment.nickname)}
            </div>
            <div class="card-body">
                <p class="card-text">${escape(comment.content)}</p>
            </div>
        </div>
    `
    if (is_prepend) {
        container.prepend(html)
    } else {
        container.append(html)
    }
}