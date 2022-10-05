function renderHtmlImage(srcImage) {
    return `<div class="card col-md-3 mr-2">
            <img class="card-img-top image_detail_product" src="${srcImage}" alt="">
            </div>`;
}

function loadPreviewMutipleImage() {
    let files = $(this).get(0).files;
    let fileLength = files.length;
    $('.image_detail_wrapper').html('');
    for (let i = 0; i < fileLength; i++) {
        let fileItem = files[i];
        const reader = new FileReader();
        reader.onload = function(element){
            let data = renderHtmlImage(element.target.result);
            $('.image_detail_wrapper').append(data);
        };
        reader.readAsDataURL(fileItem);
    }
}

function loadPreviewImage() {
    let files = $(this).get(0).files;
    let fileLength = files.length;
    $('.image_wrapper').html('');
    for (let i = 0; i < fileLength; i++) {
        let fileItem = files[i];
        const reader = new FileReader();
        reader.onload = function(element){
            let data = renderHtmlImage(element.target.result);
            $('.image_wrapper').append(data);
        };
        reader.readAsDataURL(fileItem);
    }
}

$(function () {
    $(".tags_select_choose").select2({
        tags: true,
        tokenSeparators: [',']
    });
    $(".select2_init").select2({
        placeholder: "Chọn danh mục",
        allowClear: true
    });
    var editor_config = {
        path_absolute : "/",
        selector: "textarea.tinymce_editor_init",
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker image searchreplace wordcount textcolor colorpicker',
        toolbar: 'a11ycheck casechange code formatpainter pageembed permanentpen table image file searchreplace',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Authorname',
        image_caption: true,
        relative_urls: false,
        file_picker_types: 'file image media',
        file_picker_callback: function (callback, value, meta) {
            let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
            let type = 'image' === meta.filetype ? 'Images' : 'Files',
                url  =  '/filemanager?editor=tinymce5&type=' + type;
            tinymce.activeEditor.windowManager.openUrl({
                url : url,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };
    tinymce.init(editor_config);
    $(document).on('change', '.preview_image_detail', loadPreviewMutipleImage);
    $(document).on('change', '.preview_image', loadPreviewImage);
});

