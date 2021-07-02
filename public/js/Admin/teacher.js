$(document).ready(function() {
  studentname= $("#studentname").kendoDropDownList({

        dataTextField: "name",
        dataValueField: "id",
        optionLabel: "Select student",
        dataSource: {
            transport: {
                read: {
                    url: "/getstudentname",
                    type: "GET",

                    serverFiltering: true,
                    dataType: "json"
                }
            },

        },
        autoWidth: true,
    }).data('kendoDropDownList');
});


$(document).ready(function() {
    $(".nav a.nav-link").on("click", function(e) {
        var activesub = $(this).attr('href');
        if (activesub = $(this).attr('href')) {
            e.preventDefault();
        }
        $('.nav .nav-link').removeClass('active');
        $(this).addClass("active");
        var activeNav = $(this).attr('href')

        gridFunctions(activeNav);

    });
});

//inserquestionclick

    $(document).on('click', '.saveBtn', function(){
     // $("#insertquestion").on('click', '#questionSubmit', function () {
     //$("#questionSubmit").on("click", function(e) {
         //$("#insertquestion").submit(function(event) {
             student= studentname.value();
           
               //console.log(student);
               var val = [];
                  $(':checkbox:checked').each(function(i){
                        val[i] = $(this).val();
                  });
                 // console.log(val);
                
        

       // e.preventDefault();

        $.ajax({
            url: "/savequestion",
            type:"POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
             
             student_id:student,
              question_id:val
            },
           
            success: function(response) {
                console.log(response);
               // alert('uploaded');
            }
        });

   // });
 });






$(document).ready(function() {
    $("#formid").submit(function(event) {

        event.preventDefault();
        //var formData = new FormData(this);
        //var formData = new FormData($('this')[0]);
        var formData = new FormData($(this)[0]);
        console.log(formData);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/importquestion",
            data: formData,
            type: 'post',
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,

            success: function(response) {
                //onsole.log(response);
                alert('uploaded');
            }
        });

    });
});

$(document).on('click', '#allcheck', function() {

     $('input:checkbox').not(this).prop('checked', this.checked);
});

function gridFunctions(activetabs) {

    if (activetabs == '#teacherdashboard') {
        $("#Teachergrid").hide();
        $("#files").hide();
        $("#studdropdown").hide();
        $("#questionimport").hide();
        $("#Admingrid").hide();

    }


    if (activetabs == '#student') {
        $("#Teachergrid").hide();
        $("#files").hide();
        $("#studdropdown").hide();
        $("#questionimport").hide();
        $("#Admingrid").show();

    }
    if (activetabs == '#teacher') {
        $("#Admingrid").hide();
        $("#files").hide();
        $("#studdropdown").hide();
        $("#questionimport").hide();
        $("#Teachergrid").show();

    }
    if (activetabs == '#uploadQuestions')

    {
        $("#Admingrid").hide();
        $("#Teachergrid").hide();
        $("#questionimport").hide();
        $("#studdropdown").show();
        $("#files").show();


    }
    if (activetabs == '#importquestions')

    {
        $("#Admingrid").hide();
        $("#Teachergrid").hide();
        $("#studdropdown").hide();
        $("#files").hide();
        $("#questionimport").show();


    }
    if (activetabs == '#updateprofile') {
        $("#Teachergrid").hide();
        $("#files").hide();
        $("#studdropdown").hide();
        $("#questionimport").hide();
        $("#Admingrid").hide();

    }

    switch (activetabs) {


        case '#student':

            $("#Admingrid").kendoGrid({
                dataSource: {

                    transport: {
                        read: {
                            url: "/readStudent",
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },

                            dataType: "json"
                        }
                    },
                    schema: {
                        data: function(response) {

                            return response;
                        },
                        model: {
                            id: "id",
                            fields: {
                                id: {
                                    type: "number",
                                    editable: false,
                                    nullable: false
                                },
                                name: {
                                    validation: {
                                        required: true
                                    }
                                },
                                email: {
                                    validation: {
                                        required: true
                                    }
                                },

                            }
                        }
                    },

                },
                height: 200,
                pageable: {
                    refresh: true,
                },

                columns: [

                    {
                        field: "name",
                        title: "Name",
                        width: "200px"
                    },
                    {
                        field: "email",
                        width: "200px",
                        title: "Email"
                    },

                    {
                        field: "role_name",
                        width: "200px",
                        title: "Role"
                    }


                ]

            }).data("kendoGrid");


            $('#Admingrid .k-pager-info').hide();
            break;

        case '#teacher':

            $("#Teachergrid").kendoGrid({
                dataSource: {
                    transport: {
                        read: {
                            url: "/readTeacher",
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },

                            dataType: "json"
                        }
                    },
                    schema: {
                        data: function(response) {

                            return response;
                        },
                        model: {
                            id: "id",
                            fields: {
                                id: {
                                    type: "number",
                                    editable: false,
                                    nullable: false
                                },
                                name: {
                                    validation: {
                                        required: true
                                    }
                                },
                                email: {
                                    validation: {
                                        required: true
                                    }
                                },

                            }
                        }
                    },

                },
                height: 200,
                pageable: {
                    refresh: true,
                },

                columns: [

                    {
                        field: "name",
                        title: "Name",
                        width: "200px"
                    },
                    {
                        field: "email",
                        width: "200px",
                        title: "Email"
                    },

                    {
                        field: "role_name",
                        width: "200px",
                        title: "Role"
                    }

                ]

            }).data("kendoGrid");
            $('#Teachergrid .k-pager-info').hide();
            break;
        case '#exam':

            /*examWindow = $("#examWindow").kendoWindow({
                          title: "Question Form",
                          modal: true,
                          visible: false,
                          resizable: false,
                          width: 560,
                          draggable: false
                      }).data('kendoWindow');*/

            break;
        case '#uploadQuestions':
            $("#files").kendoGrid({
                dataSource: {
                    transport: {
                        read: {
                            url: "/readquestions",
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },

                            dataType: "json"
                        }
                    },
                    schema: {
                        data: function(response) {

                            return response;
                        },
                        model: {
                            id: "id",
                            fields: {
                                id: {
                                    type: "number",
                                    editable: false,
                                    nullable: false
                                },
                                question_name: {
                                    validation: {
                                        required: false
                                    }
                                },
                                option1: {
                                    validation: {
                                        required: false
                                    }
                                },
                                option2: {
                                    validation: {
                                        required: false
                                    }
                                },
                                option3: {
                                    validation: {
                                        required: false
                                    }
                                },
                                option4: {
                                    validation: {
                                        required: false
                                    }
                                },

                            }
                        }
                    },

                },
                height: 200,
                pageable: {
                    refresh: true,
                },

                columns: [{
                        template: " <input type='checkbox' class='questionIdChk'  name='selectid[]' value='#:id #'",
                        field: "status_code",
                        title: "<input type='checkbox' id='allcheck'",
                        width: 30
                    },

                    {
                        field: "question_name",
                        title: "Question Name",
                        width: "200px"
                    },
                    {
                        field: "option1",
                        width: "200px",
                        title: "Option A"

                    },

                    {
                        field: "option2",
                        width: "200px",
                        title: "Option B"
                    },
                    {
                        field: "option3",
                        width: "200px",
                        title: "Option C"
                    },

                    {
                        field: "option4",
                        width: "200px",
                        title: "Option D"
                    }


                ]

            }).data("kendoGrid");
            $('#files .k-pager-info').hide();
            break;
        default:
            break;

    }
}