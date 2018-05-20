 $(document).ready(function() { 

          // const base_url = "http://how2qa.com/admin";

             const base_url = "http://localhost/dieutra/admin";
             // const base_url = "http://www.nlsearch.asia/admin";



// highlight menu

 var url = window.location.href; 
      
        var arr = url.split('/');


        var menu = arr[4];

        switch(menu) {
            case 'job':
                $(".job").addClass('highlight-menu');
                break;
            case 'recruiter':
                $(".recruiter").addClass('highlight-menu');
                break;
                case 'candidate':
                $(".candidate").addClass('highlight-menu');
                break;
                case 'category':
                $(".category").addClass('highlight-menu');
                break;
                case 'attribute':
                $(".attribute").addClass('highlight-menu');
                break;
                case 'blogs':
                $(".blogs").addClass('highlight-menu');
                break;
                case 'staticpage':
                $(".static-page").addClass('highlight-menu');
                break;
                case 'configuration':
                $(".configuration").addClass('highlight-menu');
                break;
         
            default:
               
        }





             // $("input[type=search]").setAttribute("placeholder", "search somethings");   

             $(".btnAddCountry").click(function(){
              $("#addModal").modal('show');

            });

             var table = $('#example').DataTable({

             });


             $("div.toolbar").html('<b>Custom tool bar! Text/images etc.</b>');

             $('#example tbody').on( 'click', '.edit', function () {

              var data = table.row( $(this).parents('tr') ).data();

              $("#country_id").val(data[ 0 ]);
              $("#name").val(data[ 1 ]);
              $("#code").val(data[ 2 ]);                       

            });



             $('#example tbody').on( 'click', '.btn.btn-success.view', function () {

              var data = table.row( $(this).parents('tr') ).data();

              $("#view_country_name").html(data[0]);
              $("#view_country_code").html(data[2]);             

             });


             $('#example tbody').on( 'click', '.delete', function () {
              var data = table.row( $(this).parents('tr') ).data();
              $("#country_id").val(data[ 0 ]);
              $("#name").val(data[ 1 ]);
              $("#code").val(data[ 2 ]);

              var r = confirm("Do you want to delete this country?");
              if (r == true) {
               var id = parseInt(data[0]);
               $.post(base_url+"/country/delete_country",          
                {country_id:id},             
                function(data, status){

                  alert(data);
                  location.reload();  
                       
                     });
             } else {
              txt = "You pressed Cancel!";
            }
                 
                 });

             $("#save").click(function(){
              $.post(base_url+"/country/update_country",           
               {country_id:$("#country_id").val(),
               name: $("#name").val(),
               code: $("#code").val()} ,
               function(data, status){
                alert(data);
              });
            });

             $("#add").click(function(){
              $.post(base_url+"/country/add_country",           
               { name: $("#add_name").val(),
               code: $("#add_code").val()} ,

               function(data, status){
                alert(data);
                location.reload();  

              });
            });

                   //job
                   $(".btnAddCountry").click(function(){
                    $("#addModal").modal('show');
                  });

                   var table = $('#job_table').DataTable({
                    "columnDefs": [
                    
                    ]                  
                    
                  });

                   $("div.toolbar").html('<b>Custom tool bar! Text/images etc.</b>');

                   $('#job_table tbody').on( 'click', '.edit_job', function () {

                    var data = table.row( $(this).parents('tr') ).data();

                    var id = data[ 0 ]; 

                    var  content = {id:id,action:'edit'}

                    $.post(base_url+"/job/update_job",          
                      content,             
                      function(data, status){
                        var objData =  JSON.parse(data);
                        $("#edit_id").val(objData.id);
                        $("#edit_title").val(objData.title);
                        $("#edit_name").val(objData.name_url);
                         // $("#edit_category").html(objData.category);
                         $("#edit_type").val(objData.type);
                         $("#edit_code").val(objData.code);
                         $("#edit_tag").val(objData.tag);                    

                        } );
                  } );

                   $('#job_table tbody').on( 'click', '.view_job', function () {
                     var data = table.row( $(this).parents('tr') ).data();

                     var id = data[ 0 ];  
                     var  content = {id:id,action:'view'}

                     $.post(base_url+"/job/get_row_by_id",          
                      content,             
                      function(data, status){             

                        var objData = JSON.parse(data); 

                      
                        $("#view_title").html(objData.job.title);
                        $("#view_name").html(objData.name_url);
                        $("#view_category").html(objData.category);
                        $("#view_type").html(objData.type);
                        $("#view_meta_title").html(objData.meta_title);
                        $("#view_location").html(objData.location);
                        $("#view_expiry_date").html(objData.expiry_date);
                        $("#view_code").html(objData.code);
                        $("#view_tag").html(objData.tags);   
                        $("#view_description").html(objData.description);   
                        $("#view_meta_keyword").html(objData.meta_keyword);   
                        $("#view_meta_image").html(objData.meta_image);   
                        $("#view_meta_description").html(objData.meta_description);  
                        $("#view_status").html(objData.status);    

                      } );

                   } );

                  
                   
                   $("#edit_save").click(function(){

                     data = {id:$("#edit_id").val(),
                     name: $("#edit_name").val(),
                     code: $("#edit_code").val()}

                     $.post(base_url+"/job/set_change_update",           
                       data ,function(data, status){
                        alert(data);
                      });
                   });

                   $("#add_job").click (function(){
                    var name_url = $("#add_name").val();
                    var code = $("#add_code").val();
                    var data = { action:'add',
                    name_url: name_url ,
                    code: code }
                    if (name_url =='' || code == '') {
                      $("#error").html('Value Cannot Be Null');

                    } else {


                     $.post(base_url+"/job/add_job",           
                      data ,

                      function(data, status){
                      //location.reload();  
                      var objData = JSON.parse(data);
                      if (objData.status === 1){               
                       alert (objData.data);
                       location.reload(); 
                     } else if (objData.status === 0){
                       $("#error").html(objData.data);
                     }
                   }); 
                   }          
                 
                });

                   $("input").focus(function(){
                    $("#error").html('');
                  })



                 // Slide
            /*     $(".sub-menu-togle").click(function(){
                  $("li.sub-menu-parent > .sub-menu").toggle(500);
                })
*/
          

          /*$(".sub-menu-parent").click (function(){
              $(this).addClass('active');

              $(this).children('.sub-menu').slideDown();
          })


          $('.nav menu').click (function () {
              $(this).addClass('active');
          })*/
        $("ul  li ").click(function(){

          if ($(this).hasClass('active')) {          

              $(this).children('.sub-menu').slideUp();
              $(this).removeClass('active');
          } else 
          {
              $(this).children('.sub-menu').slideDown();
              $(this).addClass('active');
          }


        })

         $(".none_sub").click(function(){        
            
              $(this).addClass('active');        

        })
          


 //Delete Student   
 
  $('#job_table tbody').on( 'click', '.delete_student', function (e) {   



        var row_id = null;
        row_id =    $(this).attr('row_id');


        var row_delete = table.row( $(this).parents('tr') );

       

 
        e.preventDefault();
        var el = $(this).parent();
        var title = el.attr('data-title');
        var msg = el.attr('data-message');
        var dataForm = el.attr('data-form');
          $('.modal-content').show();
        
        $('#formConfirm')
        .find('#frm_body').html(msg)
        .end().find('#frm_title').html(title)
        .end().modal('show');
        
        $('#formConfirm').find('#frm_submit').attr('data-form', dataForm);


          $('#formConfirm').on('click', '#frm_submit', function() {

             if (row_id != null) {
                   // alert (row_id);
                   var id = parseInt(row_id);
                     var data = {id:id, action:'delete'}
                     $.post(base_url+"/student_manager/delete_student",          
                      data,             
                      function(data, status){
                            $(".notification_show").html(data);
                             $('.modal-content').hide();
                                
                                var table = $('#job_table').DataTable();
                                row_delete.remove().draw();

                       
                     });

 
                   row_id = null;

             }
            // location.reload();
              // $('#formConfirm').fadeOut("slow");

          
         });


        
        
  });
 






 //Delete Teacher   

  $('#job_table tbody').on( 'click', '.delete_teacher', function (e) {       

        var row_id = null;
        row_id =    $(this).attr('row_id');

        var row_delete = table.row( $(this).parents('tr') );

        e.preventDefault();
        var el = $(this).parent();
        var title = el.attr('data-title');
        var msg = el.attr('data-message');
        var dataForm = el.attr('data-form');
        
         $('.modal-content').show();
        $('#formConfirm')
        .find('#frm_body').html(msg)
        .end().find('#frm_title').html(title)
        .end().modal('show');
        
        $('#formConfirm').find('#frm_submit').attr('data-form', dataForm);


          $('#formConfirm').on('click', '#frm_submit', function() {

             if (row_id != null) {
                   // alert (row_id);
                   var id = parseInt(row_id);
                     var data = {id:id, action:'delete'}
                     $.post(base_url+"/teacher_manager/delete_teacher",          
                      data,             
                      function(data, status){
                            $(".notification_show").html(data);
                             $('.modal-content').hide();
                              row_delete.remove().draw();
                       
                     });

 
                   row_id = null;

             }
            // location.reload();
              // $('#formConfirm').fadeOut("slow");
          
         });
        
  });
 




    // job status manager view 
            $('#job_table tbody').on( 'change', '.teacher_status', function () {
               var data = table.row( $(this).parents('tr') ).data();
               

               var id = data[ 0 ];  
           
               var status =   $(this).val();
              

                var  content = {id:id,status:status}              

                 $.post(base_url+"/teacher_manager/set_status",          
                      content,             
                      function(data, status){             

                        // location.reload();                  
                    

                      } );         


            } );





         





        $(".add_student_list").click(function(){

          var student_code = $("#student_code").val();
                    
          var student_code_arr = [];
                   
                     var  content = {student_code:student_code}

                        var student = document.getElementsByName('list_student');
                    
                    for (var i = 0; i < student.length; i++){
                        if (student[i].checked === true){
                            student_code_arr.push( student[i].value) ;
                        }
                    }
                 
                     

                     $.post(base_url+"/Dissertation_Manager/get_student_by_code",          
                      content,             
                      function(data, status){  
                      if (data!='false') {

                           var objData = JSON.parse(data); 
                           var check_exist = false;                           

                           student_code_arr.forEach(function(element) {
                              if (element === objData.id)
                              {
                                check_exist =  true;
                              }
                            });
                         // alert (student_code_arr);
                          if (!check_exist) {
                             $(".student_list").append('<label class="cbStudent">'+objData.code +' - ' + objData.name+'<input checked name="list_student" type="checkbox" value="'+objData.id+'"></label>');
                              
                            
                             
                           } else {
                            alert ("Sinh sinh viên đã tồn tại");
                           }                         

                      } else {
                        alert ("Không tìm thấy sinh viên"); 
                      }                  
                      
                     

                      } );
        });


        $(".add_teacher_list").click(function(){

           var teacher_code = $("#teacher_code").val();
            var teacher_code_arr = [];
                    

                   
                     var  content = {teacher_code:teacher_code}


                        var teacher = document.getElementsByName('list_teacher');
                    
                    for (var i = 0; i < teacher.length; i++){
                        if (teacher[i].checked === true){
                            teacher_code_arr.push( teacher[i].value) ;
                        }
                    }
                 
                    

                     $.post(base_url+"/Dissertation_Manager/get_teacher_by_code",          
                      content,             
                      function(data, status){  
                      if (data!='false') {
                          var objData = JSON.parse(data); 
                            var check_exist = false;                           

                           teacher_code_arr.forEach(function(element) {
                              if (element === objData.id)
                              {
                                check_exist =  true;
                              }
                            });
                       
                          if (!check_exist) {
                             $(".teacher_list").append('<label class="cbTeacher">'+objData.code +' - ' + objData.name+'<input checked name="list_teacher" type="checkbox" value="'+objData.id+'"></label>');
                             
                           } else {
                            alert ("Giảng viên đã tồn tại");
                           } 
                        
                         
                          
                        
                      }   else {
                        alert ("Không tìm thấy giảng viên"); 
                      }                  
                               
                      
                     

                      } );
        });






          $("#addDissertation").click(function(){

               
                var title = $("#dissertation_title").val();
                var dissertation_code = $("#dissertation_code").val();               
              
                summary = window.parent.tinymce.get('summary').getContent();

                          

                var type = $('#type :selected').val();
                var school_year = $('#school_year :selected').val();

                var student = document.getElementsByName('list_student');
                var teacher = document.getElementsByName('list_teacher');
                var student_code = [];
                var teacher_code = [];




              
                for (var i = 0; i < student.length; i++){
                    if (student[i].checked === true){
                        student_code.push( student[i].value) ;
                    }
                }


                for (var i = 0; i < teacher.length; i++){
                    if (teacher[i].checked === true){
                        teacher_code.push( teacher[i].value) ;
                    }
                }


            


                   var  content = {dissertation_code:dissertation_code,title:title,type:type,school_year:school_year,summary:summary,student_code:student_code,teacher_code:teacher_code}

                  
                   $.post(base_url+"/Dissertation_Manager/do_add_dissertation",          
                      content,             
                      function(data, status){  
                      if (data!='false') {
                        $("#result").html (data);

                          // alert(data);
                      }                  
                      
                     

                      } );






        });





         $("#btnSave_Dissertation").click(function(){
                var dissertation_id = $("#dissertation_id").val();
                var title = $("#dissertation_title").val();
                summary = window.parent.tinymce.get('summary').getContent();

                var type = $('#type :selected').val();
                 var school_year = $('#school_year :selected').val();

                var dissertation_code = $("#dissertation_code").val();               
                var student = document.getElementsByName('list_student');
                var teacher = document.getElementsByName('list_teacher');
                var student_code = [];
                var teacher_code = [];
                 // loop each checkbox to get student value
                for (var i = 0; i < student.length; i++){
                    if (student[i].checked === true){
                        student_code.push( student[i].value) ;
                    }
                }


                   // loop each checkbox to get student value
                for (var i = 0; i < teacher.length; i++){
                    if (teacher[i].checked === true){
                        teacher_code.push( teacher[i].value) ;
                    }
                }
                 
                // // Show reslt
                // alert("Student : " + student_result + "Teacher: " + teacher_result);


                   var  content = {id:dissertation_id,code:dissertation_code,title:title,summary:summary,type:type,school_year:school_year,student_code:student_code,teacher_code:teacher_code}

                   $.post(base_url+"/Dissertation_Manager/editing_dissertation",          
                      content,             
                      function(data, status){  
                      if (data!='false') {
                        $("#result").html(data);
                          // alert(data);
                      }                  
                      
                     

                      } );






        });



     






               });




