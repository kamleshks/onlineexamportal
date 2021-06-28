

              $(document).ready(function () {
                    
                        dataSource = new kendo.data.DataSource({
                            //autoSync: true,
                            transport: {
                                read:  {
                                    url: "http://localhost:8000/readAdmin",
                                    dataType: "json"
                                },
                              
                                parameterMap: function(options, operation) {
                                    if (operation !== "read" && options.models) {
                                        return {models: kendo.stringify(options.models)};
                                    }
                                },   
                                parameterMap: function(data, type) {
                                   if (type == "destroy") {
                             
                                     return { models: kendo.stringify(data.models) }
                                    }
                                 }
                            },
                           
                            pageSize:5,
                            schema: {
                                
                                model: {
                                    id: "id",
                                   fields: {
                                               id: { type: "number", editable: false, nullable: false },
                                               name: { validation: { required: true } },
                                               email: { validation: { required: true } },
                                            
                                    }
                                }
                            },
                            
                         
                        });
                          //$('.k-grid-content k-auto-scrollable').hide();

                       $("#Admingrid").kendoGrid({
                        dataSource: dataSource,
                        pageable: {
                      refresh: true,
                      
                      
                        },
                        // scrollable:true,
                        height: 480,
                       columns: [
                         { field: "name", title: "Name", width: "200px" },
                         { field: "email",
                             width: "200px",
                              title: "Email" 
                            },

                            { field: "role_name",
                             width: "200px",
                              title: "Role" 
                            },
                            {
                            title: "Active/Deactive",
                              template: "<button id='active'  class=k-primary onClick='addToActive(id=#=id#,this) '>Active</button>&nbsp;&nbsp;<button id='inactive'  style='background:red;color:white;' onClick='addToInActive(id=#=id#,this)'>InActive</button>",
                               width: "200px",
                           }
                         ]
                         
                    });

                           //active button click
                     
                   

            

            });
               
         function addToActive(userid) {
            var user_id = userid;
              
            
           $("#activeWindow").kendoWindow({
                    modal: true,
                    visible: false,
                    width:500,
                    title: "Active Window",
                    resizable:false
                });
                var kendoWindow = $("#activeWindow").data("kendoWindow");

                kendoWindow.center().open();


        }
         function addToInActive(id) {
            var user_id = id;
              
            
           $("#InactiveWindow").kendoWindow({
                    modal: true,
                    visible: false,
                    width:500,
                    title: "Active Window",
                    resizable:false
                });
                var kendoWindow = $("#InactiveWindow").data("kendoWindow");

                kendoWindow.center().open();
        }