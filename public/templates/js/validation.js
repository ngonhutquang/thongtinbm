$(document).ready(function() {
      // add the rule here
 $.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg !== value;
 }, "Value must not equal arg.");
  
        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#add_form").validate({
                    rules: {
                        name: "required",

                        type: { valueNotEquals: '-1' } ,
                        category: { valueNotEquals: '-1' } ,
                        country: { valueNotEquals: '-1' } ,

                        expiry_date: "required",
                       
                        contact_number: {
                            required: true,
                            minlength: 5
                        },
                        contact_phone: {
                            
                            minlength: 10
                        },
                        email: {
                            required: true,
                            email: true
                        },

                        content: {
                            required: true
                        },

                        contact_email: {
                            required: true,
                            email: true
                        },

                         admin_username: {
                            // required: true,
                            email: true
                        },
                        contact_email: {
                            // required: true,
                            email: true
                        },
                        smtp_username: {
                            // required: true,
                            email: true
                        },
                        admin_old_password: {
                            required:true,
                            minlength: 5
                        },
                         admin_password: {
                            required:true,
                            minlength: 5
                        },
                         admin_repassword: {
                            required:true,
                            minlength: 5,
                            equalTo: "#admin_password"
                        }
                       
                        
                        // password: {
                        //     required: true,
                        //     minlength: 5
                        // },
                        // confirm_password: {
                        //     required: true,
                        //     minlength: 5,
                        //     equalTo: "#password"
                        // },
                        
                       
                    },
                    messages: {
                        name: "Please Insert Name",
                        type: { valueNotEquals: "Please select work type!" },
                        category: { valueNotEquals: "Please select category type!" },
                        country: { valueNotEquals: "Please select country!" },
                      
                        contact_number: {
                            required: "Please Input Phone Number",
                            minlength: "The Phone Not Real"
                        },
                         // contact_email: "Please Enter Email",
                         contact_phone: {
                              required: "Please Input Phone Number",
                            minlength: "The Phone Not Real"
                         },
                         content: "Please Enter Content",
                        // password: {
                        //     required: 'Vui lòng nhập mật khẩu',
                        //     minlength: 'Vui lòng nhập ít nhất 5 kí tự'
                        // },
                        // confirm_password: {
                        //     required: 'Vui lòng nhập mật khẩu',
                        //     minlength: 'Vui lòng nhập ít nhất 5 kí tự',
                        //     equalTo: 'Mật khẩu không trùng'
                        // },
                        // email: {
                        //     required: "Please provide a password",
                        //     minlength: "Your password must be at least 5 characters long",
                        //     equalTo: "Please enter the same password as above"
                        // },
                        // email: "Please Enter Email"
                        
                    }
                });
    });