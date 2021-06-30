$(document).ready(function () {
$(".nav a.nav-link").on("click", function(e) {
    var activesub=$(this).attr('href');
    if(activesub=$(this).attr('href')){
        // href url is not specified, assuming its an ajax call 
        // If not you can remove this
        e.preventDefault();
    }
    // Remove all active classes
    $('.nav .nav-link').removeClass('active');

    // Add active class for the curractiveent item
   $(this).addClass("active");
           var activeNav= $(this).attr('href')
           
  gridFunctions(activeNav);

});
})

function gridFunctions(activetabs){
    if(activetabs=='#student')
    {
          $("#Teachergrid").hide();

         $("#Admingrid").show();

    }
    if(activetabs=='#teacher')
    {
          $("#Admingrid").hide();

         $("#Teachergrid").show();

    }

switch (activetabs) {


            case '#student':
            
                $("#Admingrid").kendoGrid({
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
                            data: function (response) {
                               
                                    return response;
                            },
                            model: {
                                        id: "id",
                                         fields: {
                                                    id: { type: "number", editable: false, nullable: false },
                                                    name: { validation: { required: true } },
                                                     email: { validation: { required: true } },
                                                                        
                                                    }
                                                 }
                        },
                        
                    },
                    height: 200,
                    pageable: {
                        refresh: true,
                    },
                    
                        columns: [

                                                     { field: "name", title: "Name", width: "200px" },
                                                      { field: "email",
                                                         width: "200px",
                                                          title: "Email" 
                                                        },

                                                        { field: "role_name",
                                                         width: "200px",
                                                          title: "Role" 
                                                        }
                                                       
                                                     
                    ]
                    
                }).data("kendoGrid");
                break;

                 case '#teacher':

                $("#Teachergrid").kendoGrid({
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
                            data: function (response) {
                               
                                    return response;
                            },
                            model: {
                                        id: "id",
                                         fields: {
                                                    id: { type: "number", editable: false, nullable: false },
                                                    name: { validation: { required: true } },
                                                     email: { validation: { required: true } },
                                                                        
                                                    }
                                                 }
                        },
                       
                    },
                    height: 200,
                    pageable: {
                        refresh: true,
                    },
                   
                        columns: [

                                                     { field: "name", title: "Name", width: "200px" },
                                                      { field: "email",
                                                         width: "200px",
                                                          title: "Email" 
                                                        },
                                                       
                                                        { field: "role_name",
                                                         width: "200px",
                                                          title: "Role" 
                                                        }

                                                      
                                                       
                                                     
                    ]
                    
                }).data("kendoGrid");
                break;

              default:
              break;

}





}