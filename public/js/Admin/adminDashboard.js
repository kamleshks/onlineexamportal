

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
                      template: "<button id='active' class='btn btn-success' >Active</button>&nbsp;&nbsp;<button id='inactive' class='btn btn-danger' >InActive</button>",
                       width: "200px",
                   }
                 ]
                 
            });


        //$("#Admingrid").data("kendoGrid").wrapper.find(".k-grid-header-wrap").off("scroll.kendoGrid");
    
              //$('.k-grid-content k-auto-scrollable').hide();

        });