$(document).ready(function(){
        loadTemplate(r_id);
        getAllSectionData();
    });
    function loadTemplate(template_id){
        $.ajax({
          url: "get-sample-template/" + r_id,
          dataType: 'html',
          success: function (data, textStatus, jqXHR) { 
            $("#select_frame").html(data);
            $("#MainHeading").hide();
            $(".skill-section").hide();
          },
          error: function(jqXHR, textStatus, errorThrown){
            toastr.error(jqXHR.responseJSON.responseMessage);
          }
        });
    }

function getAllSectionData(){
  if(employment_details !== '[]' && employment_details !== 0){
                $.ajax({
                  url: 'get-employer-data/' + r_id,
                  data: { 
                    template : template_id
                  },
                  dataType: 'html',
                  success: function (data, textStatus, jqXHR) {
                    $("#ShowEmployerForm").append(data);
                    EmploymentJs(employment_count,template_id);
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR);
                  }
                });
  }
  if(education_details !== '[]' && education_details !== 0){
            $.ajax({
                  url: 'get-education-data/' + r_id,
                  data: { 
                    template : template_id
                  },
                  dataType: 'html',
                  success: function (data, textStatus, jqXHR) {
                    $("#ShowEducationForm").append(data);
                    EducationJS(education_count,template_id);
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR);
                  }
                });
        }
  if(website_links !== '[]' && website_links !== 0){
            $.ajax({
                  url: 'get-website-and-social-link-data/' + r_id,
                  data: { 
                    template : template_id
                  },
                  dataType: 'html',
                  success: function (data, textStatus, jqXHR) {
                    $("#ShowWebsiteAndSocialLinkForm").append(data);
                    WebsiteSocialLinkJS(website_social_link_count,template_id);
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR);
                  }
                });
        }
  if(skill_details !== '[]' && skill_details !== 0){
            $.ajax({
                  url: 'get-skill-data/' + r_id,
                  data: { 
                    template : template_id
                  },
                  dataType: 'html',
                  success: function (data, textStatus, jqXHR) {
                    $("#ShowSkillsForm").append(data);
                    SkillsJS(skills_count,template_id);
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR);
                  }
                });
        }
  if(custom_details !== '[]' && custom_details !== 0){
            $.ajax({
                  url: 'get-custom-section-data/' + r_id,
                  data: { 
                    template : template_id
                  },
                  dataType: 'html',
                  success: function (data, textStatus, jqXHR) {
                    $("#ShowCustomSectionForm").append(data);
                    $("#AddCustomSection").prop('disabled', true);
                    $("#CustomSection").css('display','block');
                    CustomSectionJS(custom_section_count,template_id);
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR);
                  }
                });
        }
  if(internship_details !== '[]' && internship_details !== 0){
           $.ajax({
                  url: 'get-internship-data/' + r_id,
                  data: { 
                    template : template_id
                  },
                  dataType: 'html',
                  success: function (data, textStatus, jqXHR) {
                    $("#ShowInternshipForm").append(data);
                    $("#AddInternshipForm").prop('disabled', true);
                    $("#InternshipSection").css('display','block');
                    InternshipJS(internship_count,template_id);
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR);
                  }
                });
        }
  if(course_details !== '[]' && course_details !== 0){
            $.ajax({
                  url: 'get-course-data/' + r_id,
                  data: { 
                    template : template_id
                  },
                  dataType: 'html',
                  success: function (data, textStatus, jqXHR) {
                    $("#ShowCoursesForm").append(data);
                    $("#AddCoursesForm").prop('disabled', true);
                    $("#CourseSection").css('display','block');
                    CourseJS(course_link_count,template_id);
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR);
                  }
                });
        }
  if(extra_activity_details !== '[]' && extra_activity_details !== 0){
    $.ajax({
                  url: 'get-extra-curricular-data/' + r_id,
                  data: { 
                    template : template_id
                  },
                  dataType: 'html',
                  success: function (data, textStatus, jqXHR) {
                    $("#ShowExtraCurricularActivityForm").append(data);
                    $("#AddExtraCurricularActivityForm").prop('disabled', true);
                    $("#ExtraCurricularActivitySection").css('display','block');
                    ExtraCurricularActivityJS(extra_curricular_activity_count,template_id);
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR);
                  }
                });          
  }
  if(language_details !== 0){
          $.ajax({
                  url: 'get-language-data/' + r_id,
                  data: { 
                    template : template_id
                  },
                  dataType: 'html',
                  success: function (data, textStatus, jqXHR) {
                    $("#ShowLanguageForm").append(data);
                    $("#AddLanguageForm").prop('disabled', true);
                    $("#LanguageSection").css('display','block');
                    LanguageJS(language_count,template_id);
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR);
                  }
                });          
  }
  if(reference_details !== 0){
      $.ajax({
                  url: 'get-reference-data/' + r_id,
                  data: { 
                    template : template_id
                  },
                  dataType: 'html',
                  success: function (data, textStatus, jqXHR) {
                    $("#ShowReferenceForm").append(data);
                    $("#AddReferenceForm").prop('disabled', true);
                    $("#ReferenceSection").css('display','block');
                    ReferenceJS(reference_count,template_id);
                  },
                  error: function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR);
                  }
                });          
  }
  if(hobbies != 'null' && hobbies != null && hobbies != ''){
    $("#AddHobbiesForm").prop('disabled', true);
  }
}
