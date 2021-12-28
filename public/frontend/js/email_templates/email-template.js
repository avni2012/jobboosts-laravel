function copyToclipboard(element) {
    var $temp = $("<textarea>");
    var content = CKEDITOR.instances.uet_content.document.getBody().getText();
    $("body").append($temp);
    $temp.val(content).select();
    document.execCommand("copy");
    $temp.remove();
    toastr.success('Copied to clipboard');
}