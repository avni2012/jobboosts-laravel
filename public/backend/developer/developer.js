 var  deletecheck = false;
 var  check_availability = false;
 var delete_edit_action = false;
//single delete or multiple delete for all module
  function deletesingle(id,url,tableName){
    title = tableName.replace('Datatable','');
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this "+ title +" data!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        
          $.ajax(
              {
                  url : base_url+ '/' +url+'/'+id,
                  type: 'POST',
                  data : {"_token":csrftoken,_method: 'delete'},  //pass the CSRF_TOKEN()
                  dataType:'json',
                  success:function(data, textStatus, jqXHR) 
                  {
                      if(data.status == 1)
                      {
                        $('#'+tableName).DataTable().ajax.reload();
                      }
                  },
                  error: function(jqXHR, textStatus, errorThrown) 
                  {
                      //if fails      
                  }
              });
       

      }
    });
  }
  function MultipleDelete(url,tableName)
  {   
    title = tableName.replace('Datatable','');
    if(title == "blogCategory"){
      title = "blog category";
    }
      var ids = [];
      $(':checkbox:checked').each(function(i){
        ids[i] = $(this).val();
      });
      if(ids.length > 0)
      {
        if(tableName == "usersDatatable"){
          var link_url = url; 
        }else{
          var link_url = base_url+'/control-panel' + url;
        }
        swal({
          title: "Are you sure?",
          text: "Selected deleted, you will not be able to recover this "+title+" data list!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
              $.ajax(
                  {
                      url :  link_url,
                      type : 'post',
                      data : {"_token":csrftoken ,"ids":ids},  //pass the CSRF_TOKEN()
                      dataType:'json',
                      success:function(data, textStatus, jqXHR) 
                      { 
                        if(data.status == 1)
                        {
                          $('#'+tableName).DataTable().ajax.reload();
                          $(".select_all INPUT[type='checkbox'] ").prop("checked", false);
;

                        }
                      },
                      error: function(jqXHR, textStatus, errorThrown) 
                      {
                          //if fails      
                      }
                  });
          }
        });
      }
  }

  function deletesingleBlogCategory(id,url,tableName){
    title = tableName.replace('Datatable','');
    if(title == "blogCategory"){
      title = "blog category";
    }
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this "+ title +" data!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        
          $.ajax(
              {
                  url : base_url+ '/' +url+'/'+id,
                  type: 'POST',
                  data : {"_token":csrftoken,_method: 'delete'},  //pass the CSRF_TOKEN()
                  dataType:'json',
                  success:function(data, textStatus, jqXHR) 
                  {
                    console.log(data);
                    if(data.data != null){
                      if(data.data.count > 0){
                        swal({
                          title: "Are you sure?",
                          text: "This category contains blogs Once deleted You won't be able to get this data!",
                          icon: "warning",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((willDelete) => {
                          if (willDelete) {
                              $.ajax(
                              {
                                  url :  base_url + '/' + url + '/delete-blogcategory-having-blogs',
                                  type : 'POST',
                                  headers: {
                                    'X-CSRF-Token': csrftoken 
                                  },
                                  data : { 'id': data.data.category_id },  
                                  // dataType:'json',
                                  success:function(data, textStatus, jqXHR) 
                                  {
                                    console.log(data);
                                    $('#'+tableName).DataTable().ajax.reload();
                                  },
                                  error: function(jqXHR, textStatus, errorThrown) 
                                  {
                                      //if fails      
                                  }
                              });
                            }
                          });
                      }
                    }else{
                      $('#'+tableName).DataTable().ajax.reload();
                    }
                      /*if(data.status == 1)
                      {
                        $('#'+tableName).DataTable().ajax.reload();
                      }*/
                  },
                  error: function(jqXHR, textStatus, errorThrown) 
                  {
                      //if fails      
                  }
              });
       

      }
    });
  }
// user js start

  $(function () {

    var staffDatatable = $('#staffDatatable').DataTable({
        processing: true,
        serverSide: true,
        order: [[ 1, "desc" ]],
        ajax	: window.location.href,
        columns: [
            {data: 'check', name:'check', orderable: false, searchable: false, visible: deletecheck},
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'mobile_no', name: 'mobile_no'},
            // {data: 'role_user.role.display_name', name:'role_user.role.display_name'},
            {data: 'status', name: 'status'},
            {data: 'email_verified_at',name:'email_verified_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false, visible: delete_edit_action}
        ],
    });
    var roleDatatable = $('#roleDatatable').DataTable({
        processing: true,
        serverSide: true,
        ajax:  window.location.href,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'display_name', name: 'display_name'},
            {data:'description', name: 'description'},
            {data: 'manage_permistion_action', name: 'manage_permistion_action', orderable: false, searchable: false, visible : delete_edit_action},
            {data: 'action', name: 'action', orderable: false, searchable: false, visible: delete_edit_action}
        ]
    });
    var cmsDatatable = $('#cmsDatatable').DataTable({
        processing: true,
        serverSide: true,
        order: [[ 1, "desc" ]],
        ajax  : window.location.href,
        columns: [
            {data: 'check', name:'check', orderable: false, searchable: false, visible: deletecheck},
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'page_slug', name: 'page_slug'},
            {data: 'page_name', name: 'page_name'},
            {data: 'page_title', name: 'page_title'},
            {data: 'seo_keyword', name:'seo_keyword', render :function (data){
                if(data){return data ;}else{return '<span class="text-secondary">NULL</span>' ;}
            }
          },
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false, visible: delete_edit_action}
        ]
    });
    var faqDatatable = $('#faqDatatable').DataTable({
        processing: true,
        serverSide: true,
        order: [[ 1, "desc" ]],
        ajax  : window.location.href,
        columns: [
            {data: 'check', name:'check', orderable: false, searchable: false, visible: deletecheck},
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'title', name: 'title'},
            {data: 'category', name: 'category'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false, visible: delete_edit_action}
        ]
    });
    var categoryDatatable = $('#categoryDatatable').DataTable({
        processing: true,
        serverSide: true,
        ajax  : window.location.href,
        columns: [
            {data: 'check', name:'check', orderable: false, searchable: false, visible: deletecheck},
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'image', name: 'image'},
            {data: 'name', name: 'name'},
            {data: 'parentcategory', name:'parentcategory'},
            {data: 'slug', name: 'slug'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false, visible: delete_edit_action}
        ]
    });
    /*var tagDatatable = $('#tagDatatable').DataTable({
        processing: true,
        serverSide: true,
        ajax  : window.location.href,
        columns: [
            {data: 'check', name:'check', orderable: false, searchable: false, visible: deletecheck},
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'slug', name: 'slug'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false, visible: delete_edit_action}
        ]
    });*/
    var notificationDatatable = $('#notificationDatatable').DataTable({
          processing: true,
          serverSide: true,
          ajax  : window.location.href,
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'title', name: 'title'},
              {data: 'description', name: 'description'},
              {data: 'send_to', name: 'send_to'},
              {data: 'image', name: 'image'},
              {data: 'created_at', name: 'created_at'},
              {data: 'action', name: 'action', orderable: false, searchable: false}
          ]
      });
    var AlbumGalleryDatatable = $('#AlbumGalleryDatatable').DataTable({
        processing: true,
        serverSide: true,
        ajax:  window.location.href,
        columns: [
            {data: 'check', name:'check', orderable: false, searchable: false, visible: deletecheck},
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'album_name', name: 'album_name'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
      var contactUsDatatable = $('#contactUsDatatable').DataTable({
          processing: true,
          serverSide: true,
          order: [[ 1, "desc" ]],
          ajax  : window.location.href,
          columns: [
              {data: 'check', name:'check', orderable: false, searchable: false, visible: deletecheck},
              {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'mobile_no', name: 'mobile_no'},
              {data: 'subject', name: 'subject'},
              {data: 'message', name: 'message'},
              {data: 'created_at', name: 'created_at'},
              {data: 'action', name: 'action', orderable: false, searchable: false, visible: deletecheck}
          ]
      });
      var emailTemplateDatatable = $('#emailTemplateDatatable').DataTable({
          processing: true,
          serverSide: true,
          order: [[ 0, "desc" ]],
          ajax  : window.location.href,
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'keyword', name: 'keyword'},
              {data: 'subject', name: 'subject'},
              {data: 'action', name: 'action', orderable: false, searchable: false, visible: delete_edit_action}
          ]
      });
      var coachDatatable = $('#coachDatatable').DataTable({
          processing: true,
          serverSide: true,
          order: [[ 1, "desc" ]],
          ajax  : window.location.href,
          columns: [
              {data: 'check', name:'check', orderable: false, searchable: false, visible: deletecheck},
              {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
              {data: 'name', name: 'name'},
              {data: 'profile', name: 'profile'},
              {data: 'about_me', name: 'about_me'},
              {data: 'experience', name: 'experience'},
              // {data: 'display_image', name: 'display_image', orderable: false, searchable: false},
              {data: 'manage_coach_availability', name: 'manage_coach_availability', orderable: false, searchable: false, visible: check_availability},
              {data: 'action', name: 'action', orderable: false, searchable: false, visible: delete_edit_action}
          ]
      });
      var pricingDatatable = $('#pricingDatatable').DataTable({
          processing: true,
          serverSide: true,
          order: [[ 1, "desc" ]],
          ajax  : window.location.href,
          columns: [
              {data: 'check', name:'check', orderable: false, searchable: false, visible: deletecheck},
              {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
              {data: 'plan_name', name: 'plan_name'},
              {data: 'status', name: 'status'},
              {data: 'action', name: 'action', orderable: false, searchable: false, visible: delete_edit_action}
          ]
      });
      var industryDatatable = $('#industryDatatable').DataTable({
          processing: true,
          serverSide: true,
          order: [[ 1, "desc" ]],
          ajax  : window.location.href,
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
              {data: 'name', name: 'name'},
              {data: 'status', name: 'status'},
              {data: 'action', name: 'action', orderable: false, searchable: false, visible: delete_edit_action}
          ]
      });
      var blogCategoryDatatable = $('#blogCategoryDatatable').DataTable({
          processing: true,
          serverSide: true,
          order: [[ 1, "desc" ]],
          ajax  : window.location.href,
          columns: [
              {data: 'check', name:'check', orderable: false, searchable: false, visible: deletecheck},
              {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
              {data: 'name', name: 'name'},
              {data: 'status', name: 'status'},
              {data: 'action', name: 'action', orderable: false, searchable: false, visible: delete_edit_action}
          ]
      });
      var tagDatatable = $('#tagDatatable').DataTable({
          processing: true,
          serverSide: true,
          order: [[ 1, "desc" ]],
          ajax  : window.location.href,
          columns: [
              {data: 'check', name:'check', orderable: false, searchable: false, visible: deletecheck},
              {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
              {data: 'name', name: 'name'},
              {data: 'status', name: 'status'},
              {data: 'action', name: 'action', orderable: false, searchable: false, visible: delete_edit_action}
          ]
      });
      var blogDatatable = $('#blogDatatable').DataTable({
          processing: true,
          serverSide: true,
          order: [[ 1, "desc" ]],
          ajax  : window.location.href,
          columns: [
              {data: 'check', name:'check', orderable: false, searchable: false, visible: deletecheck},
              {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
              {data: 'title', name: 'title'},
              {data: 'category', name: 'category'},
              {data: 'status', name: 'status'},
              {data: 'action', name: 'action', orderable: false, searchable: false, visible: delete_edit_action}
          ]
      });
      var courseDatatable = $('#courseDatatable').DataTable({
          processing: true,
          serverSide: true,
          order: [[ 1, "desc" ]],
          ajax  : window.location.href,
          columns: [
              {data: 'check', name:'check', orderable: false, searchable: false, visible: deletecheck},
              {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
              {data: 'title', name: 'title'},
              {data: 'category_id', name: 'category_id'},
              {data: 'action', name: 'action', orderable: false, searchable: false, visible: delete_edit_action}
          ]
      });
      var couponDatatable = $('#couponDatatable').DataTable({
          processing: true,
          serverSide: true,
          order: [[ 1, "desc" ]],
          ajax  : window.location.href,
          columns: [
            {data: 'check', name:'check', orderable: false, searchable: false, visible: deletecheck},
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'coupon_code', name: 'coupon_code'},
            {data: 'type', name: 'type'},
            {data: 'start_date', name: 'start_date'},
            {data: 'end_date', name: 'end_date'},
            {data: 'action', name: 'action', orderable: false, searchable: false, visible: delete_edit_action}
          ]
      });
      var onlinecoachingDatatable = $('#onlinecoachingDatatable').DataTable({
          processing: true,
          serverSide: true,
          order: [[ 1, "desc" ]],
          ajax  : {
            url: window.location.href,
            data: function(d){
              d.status = $("#status").val()
            },
          },
          columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'user_id', name: 'user_id'},
            {data: 'session_name', name: 'session_name'},
            {data: 'coach_id', name: 'coach_id'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false, visible: delete_edit_action}
          ]
      });
      $("#status").change(function(){
        onlinecoachingDatatable.draw();
      });
      /*searchStatus = function (status = '')
      {
        $("#status").val(status)
        onlinecoachingDatatable.draw();
      }*/
  });

 $(".select_all INPUT[type='checkbox'] ").click( function(e) {
       if($(this).prop("checked") == true){
          $(" INPUT[type='checkbox']").attr('checked', true);
         }
        else if($(this).prop("checked") == false){
          $(" INPUT[type='checkbox']").attr('checked', false);
        }
    });
// user js end

// manage role js
  // add & update role
  $("#addrole").click(function(){  $('.alert').hide(); $('#addroledetail input').val(" ");
 });

  $(".role form").submit(function(e)
  {   //STOP default action
      var postData = $(this).serializeArray();
      var formURL = $(this).attr("action");
      var formid =$(this).attr("id");
      var type = "POST";
      
      $.ajax(
      {
          url : formURL,
          type: type,
           headers: {
                    'X-CSRF-Token': csrftoken 
               },
          data : postData,
          success:function(data, textStatus, jqXHR) 
          {
              jQuery(".alert-danger").empty().hide();
              if($.isEmptyObject(data.error)){

                  jQuery('#'+formid+' .alert-success').show().append('<span>'+ data.responseMessage +'</span>');
                  setTimeout(function() { jQuery('#'+formid+" .alert-success" ).empty().hide(); }, 3000);
                  $('#addroledetail input').val(" ");
                  $('#roleDatatable').DataTable().ajax.reload();
                }else{
                  printErrorMsg(data,formid);
                }
          },
          error: function(jqXHR, textStatus, errorThrown) 
          {
              //if fails      
          }
      });
    e.preventDefault(); 
  });

 // edit role
  function RoleEditFunction(id){ 
    	
    	var url = "manage-role";
    	var editUrl = url + '/' + id + '/edit';
    	$('#id').val(id);
   		$.ajax(
      	{
          url : editUrl,
          type: "get",
          success:function(data, textStatus, jqXHR) 
          {
             if(data.status == 1)
             {
                $('#edit_name_role').val(data.data.name);
                $('#edit_display_name_role').val(data.data.display_name);
                $('#edit_discription_role').val(data.data.description);
             }
          },
          error: function(jqXHR, textStatus, errorThrown) 
          {
              //if fails      
          }
      });
  }
  function roledelete(id){
      var formURL = $('#addrollform').attr("action");
        $.ajax(
                {
                    url : base_url+'/control-panel/check-role-has-user' +'/'+id, 
                    type: 'get',
                    data : {"_token":csrftoken},  //pass the CSRF_TOKEN()
                    dataType:'json',
                    success:function(data, textStatus, jqXHR) 
                    {
                        if(data.status == 1)
                        {
                            swal("Sorry!", "There are users with this role. Please delete them first.", "error");
                            $('#roleDatatable').DataTable().ajax.reload();

                        }else if(data.status == 0){
                           swal({
                            title: "Are you sure?",
                            text: "Once deleted, you will not be able to recover this roles data!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                          })
                          .then((willDelete) => {
                            if (willDelete) {

                                $.ajax(
                                    {
                                        url : formURL +'/'+id,
                                        type: 'DELETE',
                                        data : {"_token":csrftoken},  //pass the CSRF_TOKEN()
                                        dataType:'json',
                                        success:function(data, textStatus, jqXHR) 
                                        {
                                            if(data.status == 1)
                                            {
                                              $('#roleDatatable').DataTable().ajax.reload();
                                            }
                                        },
                                        error: function(jqXHR, textStatus, errorThrown) 
                                        {
                                            //if fails      
                                        }
                                    });
                            }
                          });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) 
                    {
                        //if fails      
                    }
                });
  }
  // validation message display
  function printErrorMsg (data,formid) {
    jQuery.each(data.error, function(key, value){
          $('#'+formid+' .alert-danger').show();
          $('#'+formid+' .alert-danger').append('<span>'+value+'</span></br>');
        });
  }

// end role manage js

// image upload and previeew
 function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
      }
  }

$("#addblogcategory").click(function(){  $('.alert').hide(); $('#addBlogCategory input').val(" ");
 });

$("#addtag").click(function(){  $('.alert').hide(); $('#addTag input').val(" ");
 });

$(".addblog-category form").submit(function(e)
{   //STOP default action
    e.preventDefault();
      var postData = $(this).serializeArray();
      var formURL = $(this).attr("action");
      var formid =$(this).attr("id");
      var category_name = $("#name").val();
      var type = "POST";
      // var id = $("#id").val();

      $.ajax(
      {
          url : formURL,
          type: type,
          headers: {
                    'X-CSRF-Token': csrftoken
               },
          data : postData,
          success:function(data, textStatus, jqXHR)
          {
              $(".alert-danger").empty().hide();
              if($.isEmptyObject(data.error)){
                  jQuery('#'+formid+' .alert-success').show().append('<span>'+ data.responseMessage +'</span>');
                  setTimeout(function() { jQuery('#'+formid+" .alert-success" ).empty().hide(); }, 3000);
                  $('#addBlogCategory input').val(" ");
                  $("#addBlogCategory").modal('hide');
                  if(data.data.status == 1){
                    $("#category").append('<option value="' + data.data.id + '">' + data.data.name + '</option>')
                  }
                }else{
                  printErrorMsg(data,formid);
                }
          },
          error: function(jqXHR, textStatus, errorThrown)
          {
              //if fails
              alert('error');
          }
      });
});

function BlogCategoryFunction(id){

      var url = "manage-blog-category";
      var editUrl = url + '/' + id + '/edit';
      $('#id').val(id);
      $.ajax(
        {
          url : editUrl,
          type: "get",
          success:function(data, textStatus, jqXHR)
          {
            $('#blog_category_name').val(data.data.name);
          },
          error: function(jqXHR, textStatus, errorThrown)
          {
              //if fails
          }
      });
  }

function TagFunction(id){

      var url = "manage-tag";
      var editUrl = url + '/' + id + '/edit';
      $('#id').val(id);
      $.ajax(
        {
          url : editUrl,
          type: "get",
          success:function(data, textStatus, jqXHR)
          {
            $('#tag_name').val(data.data.name);
          },
          error: function(jqXHR, textStatus, errorThrown)
          {
              //if fails
          }
      });
  }

$(".add-tags form").submit(function(e)
  {   //STOP default action
    e.preventDefault();
      var postData = $(this).serializeArray();
      var formURL = $(this).attr("action");
      var formid =$(this).attr("id");
      var category_name = $("#name").val();
      var type = "POST";
      // var id = $("#id").val();

      $.ajax(
      {
          url : formURL,
          type: type,
          headers: {
                    'X-CSRF-Token': csrftoken
               },
          data : postData,
          success:function(data, textStatus, jqXHR)
          {
              $(".alert-danger").empty().hide();
              if($.isEmptyObject(data.error)){
                  jQuery('#'+formid+' .alert-success').show().append('<span>'+ data.responseMessage +'</span>');
                  setTimeout(function() { jQuery('#'+formid+" .alert-success" ).empty().hide(); }, 3000);
                  $('#addTagCategory input').val(" ");
                  $("#addTagCategory").modal('hide');
                  if(data.data.status == 1){
                    $("#tag").append('<option value="' + data.data.id + '">' + data.data.name + '</option>');
                  }
                }else{
                  printErrorMsg(data,formid);
                }
          },
          error: function(jqXHR, textStatus, errorThrown)
          {
              //if fails
              alert('error');
          }
      });
  });

function rejectSession(session_id) {
  $('.alert').hide(); $('#rejectModal input').val(" ");
  $("#rejectModal").modal('show');
  $("#s_id").val(session_id);
}

$(".reject-session form").submit(function(e)
  {   //STOP default action
      var postData = $(this).serializeArray();
      var formURL = $(this).attr("action");
      var formid =$(this).attr("id");
      var type = "POST";
      
      $.ajax(
      {
          url : formURL,
          type: type,
           headers: {
                    'X-CSRF-Token': csrftoken 
               },
          data : postData,
          beforeSend: function() {
            if($('#reason_for_reject_session').val().length != ''){
              $(".reject-loader").fadeIn(300);
              $(".save-reject-reason").attr('disabled',true);
            }
          },
          success:function(data, textStatus, jqXHR) 
          {
              $(".alert-danger").empty().hide();
              $(".reject-loader").fadeOut(300);
              if(data.data != ''){
                $.each(data.data, function(key,value){
                  $('#'+formid+' .alert-danger').show().append('<span>'+ value +'</span>');
                  setTimeout(function() { jQuery('#'+formid+" .alert-success" ).empty().hide(); }, 3000);
                });
              }else{
                $('#'+formid+' .alert-success').show().append('<span>'+ data.responseMessage +'</span>');
                setTimeout(function() { jQuery('#'+formid+" .alert-success" ).empty().hide(); }, 3000);
                $("#rejectModal").modal('hide');
                location.href = window.location.href;
              }
          },
          error: function(jqXHR, textStatus, errorThrown) 
          {
              //if fails      
          }
      });
    e.preventDefault(); 
  });

function acceptSession(session_id) {
  var type = "GET";
   $.ajax(
      {
          url : base_url + '/control-panel/manage-online-coaching/approve-session/' + session_id,
          type: type,
          headers: {
                    'X-CSRF-Token': csrftoken 
               },
          success:function(data, textStatus, jqXHR) 
          {
              location.href = window.location.href;
          },
          error: function(jqXHR, textStatus, errorThrown) 
          {
              //if fails      
          }
      });
}

function completeSession(session_id) {
  var type = "GET";
   $.ajax(
      {
          url : base_url + '/control-panel/manage-online-coaching/complete-session/' + session_id,
          type: type,
          headers: {
                    'X-CSRF-Token': csrftoken 
               },
          success:function(data, textStatus, jqXHR) 
          {
              location.href = window.location.href;
          },
          error: function(jqXHR, textStatus, errorThrown) 
          {
              //if fails      
          }
      });
}

function showCoachAvailability(session_id) {
  $("#coachAvailabilityModal").modal('show');
  $("#s_id").val(session_id);
  var type = "GET";
  $.ajax(
      {
          url : base_url + '/control-panel/manage-online-coaching/get-coach-booked-session/' + session_id,
          type: type,
          success:function(data, textStatus, jqXHR) 
          {
              if(data.data != ''){
                $.ajax({
                  url: base_url + '/control-panel/manage-online-coaching/get-coach-availability',
                  dataType: 'html',
                  method: "POST",
                  headers: {
                    'X-CSRF-Token': csrftoken 
                  },
                  data: {
                    coach_details: data.data
                  },
                  success: function (data, textStatus, jqXHR) { 
                    $("#coach_total_booked_sessions").empty();
                    var html = JSON.parse(data);
                    $("#coach_total_booked_sessions").append(html.html);
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    
                  }
                });
              }else{

              }
          },
          error: function(jqXHR, textStatus, errorThrown) 
          {
              //if fails      
          }
      });
}
