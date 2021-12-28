    Dropzone.autoDiscover = false;
    Dropzone.autoQueue = false;
    document.files = [];
   $('#album-gallery-create').validate({
                rules: getValidationRules(),
                invalidHandler: function (form, errors) {
                    return false;
                },
                submitHandler: function (form) {
                    let files = getDropzoneImages();
                    let formData = new FormData(form);
                    files.forEach(function (file) {
                        formData.append('images[]', file);
                    }); 
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: formData,
                        contentType: false,
                        processData: false,
                        cache: false,
                        dataType: 'json',
                        success:function(data, textStatus, jqXHR) 
                        {
                            if(data.status == 1)
                            {
                              window.location.href = base_url + '/control-panel/manage-album-gallery'
                            }
                        },
                    });
                    return false;
                }
            });

   document.image_previewContent = '<div class="dz-preview dz-file-preview">\n' +
            '<div class="dropdown dropzone-image-options">\n' +
            '<button class="btn btn-drop-img dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">\n            ' +
            '<i class="fa fa-ellipsis-v" aria-hidden="true"></i>\n' +
            '</button>\n' +
            '<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">\n' +
            '<li><a href="javascript:void(0);" onclick="editSelectedImage(this);">Edit</a></li>\n' +
            '<li><a href="javascript:undefined" class="" data-dz-remove>Remove</a></li>\n' +
            '</ul>\n' +
            '</div>\n' +
            ' <div class="dz-image"><img data-dz-thumbnail/></div>\n ' +
            '<input type="hidden" name="images_alt[]" value="">' +
            '<input type="hidden" name="image_title[]" value="">' +
            ' <div class="dz-details">\n ' +
            '<div class="dz-size"><span data-dz-size></span></div>\n' +
            '<div class="dz-filename"><span data-dz-name></span></div>\n    </div>\n' +
            "</div>"

   $('#album-gallery-create #images').dropzone({
                url: '{{ route("manage-album-gallery.store") }}',
                maxFilesize: 2,
                paramName: 'images',
                uploadMultiple: true,
                addRemoveLinks: true,
                autoProcessQueue: false,
                hiddenInputContainer: "#album-gallery-create",
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                // previewsContainer : document.image_previewContent,
                previewTemplate: document.image_previewContent,
            }).sortable({
                stop: function () {
                    let queue = Dropzone.forElement('#images').getAcceptedFiles();
                    let newQueue = [];
                    $('#images .dz-preview .dz-filename [data-dz-name]').each(function (count, el) {
                        queue.forEach(function (file) {
                            if (file.name === el.innerHTML) {
                                newQueue.push(file);
                            }
                        });
                    });
                    Dropzone.forElement('#images').files = newQueue;
                }
            });
            
   function getValidationRules() {
            return {
                album_name: {
                    required: true,
                    minlength: 2,
                    maxlength: 255
                },
                description: {
                    required: true,
                    minlength: 10,
                },
                cover_image: {
                    required: true
                }
            };
        }

    function getDropzoneImages() {
            return Dropzone.forElement('#images').files;
        }

        //Set Images alt text
        function setImageAltText(form) {
            let input = $('#edit-img-modal #image_alt_text');
            let alt = input.val();
            let ImageIndex = input.data('index');
            input.val('');

            let input_title = $('#edit-img-modal #image_title');
            let alt_title = input_title.val();
            let ImageIndex_title = input_title.data('index_title');
            input_title.val('');

            $('#images input[name="images_alt[]"]').each(function (index, input) {
                if (index === ImageIndex) {
                    $(input).val(alt);
                }
            });

            $('#images input[name="image_title[]"]').each(function (index_title, input_title) {
                if (index_title === ImageIndex_title) {
                    $(input_title).val(alt_title);
                }
            });
            $('#edit-img-modal').modal('hide');
            swal({
                title: "Success.",
                text: "Image alter text has been set.",
                type: "success",
                timer: 1500,
                showCancelButton: 0,
                showConfirmButton: 0
            });
        }

        //Show Image alt form
        function editSelectedImage(elem) {
            let ImageName = $(elem).closest('.dz-image-preview').find('.dz-filename').children().text();

            let index = getDropzoneImages().findIndex(file => file.name === ImageName);
            let index_title = getDropzoneImages().findIndex(file => file.name === ImageName);
            let file = getDropzoneImages().find(file => file.name === ImageName);

            $('#edit-img-modal img').attr('src', file.dataURL);
            $('#edit-img-modal #image_alt_text').data('index', index).focusin();
            $('#edit-img-modal #image_title').data('index_title', index_title).focusin();
            $('#edit-img-modal').modal('show');
        }
