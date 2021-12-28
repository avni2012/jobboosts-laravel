    Dropzone.autoDiscover = false;
    Dropzone.autoQueue = false;
    document.files = [];
    // document.fileuploads = [];
$(document).ready(function(){
   $('#album-gallery-Edit').validate({
                rules: getValidationRules(),
                invalidHandler: function (form, errors) {
                    return false;
                },
                submitHandler: function (form) {
                    let formData = new FormData(form);
                    formData.append('_method', 'PUT');
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
                              window.location.href = base_url + '/control-panel/manage-album-gallery';
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) 
                        {
                            die('error');
                        }
                    });
                    return false;
                }
            });
   
   $('#album-gallery-Edit #images').dropzone({
                url: base_url + '/control-panel/manage-album-gallery/upload-image',
                maxFilesize: 2,
                paramName: 'images',
                uploadMultiple: true,
                addRemoveLinks: true,
                autoProcessQueue: false,
                hiddenInputContainer: "#album-gallery-Edit",
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                previewTemplate: document.image_previewContent,
                addedfiles: function(files){
                  var formData = new FormData();
                  var array = $.map(files, function(value, index) {
                      return [value];
                  });
                  array.forEach(function(images){
                    formData.append('images[]',images);
                  });
                    $.ajax({
                        url: base_url + '/control-panel/manage-album-gallery/upload-image/' + gallery_id,
                        type: 'POST',
                        headers: {
                          'X-CSRF-Token': csrftoken 
                        },
                        data: formData,
                        contentType: false,
                        processData: false,
                        cache: false,
                        dataType:'json',
                        success:function(data, textStatus, jqXHR) 
                        {
                          if(data.status == 1)
                          {
                            return myDropzone._updateMaxFilesReachedClass();
                          }
                        },
                        error: function(jqXHR, textStatus, errorThrown) 
                        {
                          //die('error'); 
                        }
                    });
                },
                removedfile: function (name) {
                let dropzone = this;
                $.ajax({
                        url: base_url + '/control-panel/manage-album-gallery/delete-image/' + name.id,
                        type: 'POST',
                        headers: {
                          'X-CSRF-Token': csrftoken 
                        },
                        _method: 'delete',
                        dataType:'json',
                        success:function(data, textStatus, jqXHR) 
                        {
                          if(data.status == 1)
                          {
                            if (name.previewElement != null && name.previewElement.parentNode != null) {
                                name.previewElement.parentNode.removeChild(name.previewElement);
                            }
                            return myDropzone._updateMaxFilesReachedClass();
                          }
                        },
                        error: function(jqXHR, textStatus, errorThrown) 
                        {
                          die('error'); 
                        }
                    });
                },
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

             let mockFiles = gallery_images;
             let dropzoneInst = Dropzone.forElement('#images');
              mockFiles.forEach(function (mockFile) {
                dropzoneInst.files.push(mockFile);
                dropzoneInst.emit("addedfile", mockFile);
                dropzoneInst.options.thumbnail.call(dropzoneInst, mockFile, gallery_image_path + '/' + mockFile.name);
              });
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
            $("#gallery_id").val(file.id);
            $("#image_alt_text").val(file.image_alt_text);
            $("#image_title").val(file.image_title);

            $(".edit_gallery_details").click(function(){
                var gallery_id = $("#gallery_id").val();
                var image_alt_text = $("#image_alt_text").val();
                var image_title = $("#image_title").val();
                $.ajax({
                        url: base_url + '/control-panel/manage-album-gallery/edit-gallery-image/' + gallery_id,
                        type: 'POST',
                        headers: {
                          'X-CSRF-Token': csrftoken 
                        },
                        data: {
                          gallery_id: gallery_id,
                          image_alt_text: image_alt_text,
                          image_title: image_title
                        },
                        success:function(data, textStatus, jqXHR) 
                        {
                          if(data.status == 1)
                          {
                            swal({
                                title: "Success.",
                                text: "Details updated successfully",
                                type: "success",
                                timer: 1500,
                                showCancelButton: 0,
                                showConfirmButton: 0
                            });
                            $('#edit-img-modal').modal('hide');
                          }
                        },
                        error: function(jqXHR, textStatus, errorThrown) 
                        {
                          
                        }
                    }); 
            });
        }

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
            '<input type="hidden" id="alt_image" name="images_alt[]" value="">' +
            '<input type="hidden" id="title_image" name="image_title[]" value="">' +
            ' <div class="dz-details">\n ' +
            '<div class="dz-size"><span data-dz-size></span></div>\n' +
            '<div class="dz-filename"><span data-dz-name></span></div>\n    </div>\n' +
            "</div>"
