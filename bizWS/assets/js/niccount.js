function nicCount(editor, ctrId, maxChars) {
    // Count characters remaining in the given nicEditor (editor), and update the given counter (ctrId)
    counterObj = document.getElementById(ctrId);
    if (counterObj) {
        var content = editor.getContent();
        // alert(ctrId);
        if (maxChars - content.length <= 0) {
            //    var str = $("#head_desc").html();
            //     var cnt = content.slice(0, -1);
//            editor.setContent(cnt);
            // if there are no characters remaining, display the negative count in red
            counterObj.innerHTML = "<font color='red'>" + (maxChars - content.length) + "</font>";
            return false;
//            $(this).text($(this).text().substr(1));
        } else { // characters remaining
            counterObj.innerHTML = maxChars - content.length;
        }
    }
}
