$(document).ready(function() {


    dataSource = new kendo.data.DataSource({
        autoSync: true,
        transport: {
            read: {
                url: "http://localhost:8000/readAdmin",
                dataType: "json"
            },

            parameterMap: function(options, operation) {
                if (operation !== "read" && options.models) {
                    return {
                        models: kendo.stringify(options.models)
                    };
                }
            },
            parameterMap: function(data, type) {
                if (type == "destroy") {

                    return {
                        models: kendo.stringify(data.models)
                    }
                }
            }
        },

        pageSize: 5,
        schema: {

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
            },
            {
                title: "Active/Deactive",

                //template: "<button class='k-primary' onClick='addToActive(uid=#=id#)'>Active</button>&nbsp;&nbsp;<button id='inactive'  style='background:red;color:white;' onClick='addToInActive(id=#=id#,this)'>InActive</button>",
                template: "# if (user_status == '2' ){ #<button  onClick='addToActive(#=id#)'  class='k-primary'>Active</button>#}else{# <button id='inactive'  style='background:red;color:white;' onClick='addToInActive(#=id#)'>InActive</button>#} #",
                filterable: false,
                width: "200px"

            }
        ]

    });


    dataSource = new kendo.data.DataSource({
        autoSync: true,
        transport: {
            read: {
                url: "http://localhost:8000/readAdmin",
                dataType: "json"
            },

            parameterMap: function(options, operation) {
                if (operation !== "read" && options.models) {
                    return {
                        models: kendo.stringify(options.models)
                    };
                }
            },
            parameterMap: function(data, type) {
                if (type == "destroy") {

                    return {
                        models: kendo.stringify(data.models)
                    }
                }
            }
        },

        pageSize: 5,
        schema: {

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


    });


    $("#Teachergrid").kendoGrid({
        dataSource: dataSource,
        pageable: {
            refresh: true,


        },
        // scrollable:true,
        height: 480,
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
            },

        ]

    });



});

//active button click

function addToActive(uid) {
    var id = uid;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'post',

        url: '/activate',
        data: {
            'id': id

        },

        success: function(response) {

            $("#dialog").kendoWindow({
                modal: true,
                visible: false,
                title: "Active Window",
                width: 500
            });

            setTimeout(function() {
                var kendoWindow = $("#dialog").data("kendoWindow");

                kendoWindow.content(response.message);

                kendoWindow.center().open();
            }, 2000);


            $("#Admingrid").data("kendoGrid").dataSource.read();

        },
        error: function(XMLHttpRequest) {

        }

    });

}

function addToInActive(uid) {
    var id = uid;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'post',

        url: '/deactivate',
        data: {
            'id': id

        },

        success: function(response) {

            $("#dialog").kendoWindow({
                modal: true,
                visible: false,
                title: "Active Window",
                width: 500
            });

            setTimeout(function() {
                var kendoWindow = $("#dialog").data("kendoWindow");

                kendoWindow.content(response.message);

                kendoWindow.center().open();
            }, 2000);


            $("#Admingrid").data("kendoGrid").dataSource.read();

        },
        error: function(XMLHttpRequest) {

        }

    });
}


$(document).ready(function() {
    $(".nav a.nav-link").on("click", function(e) {
        var activesub = $(this).attr('href');
        if (activesub = $(this).attr('href')) {
            // href url is not specified, assuming its an ajax call 
            // If not you can remove this
            e.preventDefault();
        }
        // Remove all active classes
        $('.nav .nav-link').removeClass('active');

        // Add active class for the curractiveent item
        $(this).addClass("active");
        var activeNav = $(this).attr('href')

        //gridFunctions(activeNav);

    });
});