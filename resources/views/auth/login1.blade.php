<html>
<head>
    <base href="https://demos.telerik.com/kendo-ui/form/index">
    <base href="https://demos.telerik.com/kendo-ui/autocomplete/index">
    <style>html { font-size: 14px; font-family: Arial, Helvetica, sans-serif; }
    </style>
    <title></title>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.2.616/styles/kendo.default-v2.min.css" />
    <script src="https://kendo.cdn.telerik.com/2021.2.616/js/jquery.min.js"></script> 
    <script src="https://kendo.cdn.telerik.com/2021.2.616/js/kendo.all.min.js"></script>
    <link rel="stylesheet" href="styles/kendo.common.min.css" />
    <link rel="stylesheet" href="styles/kendo.default.min.css" />
    <link rel="stylesheet" href="styles/kendo.default.mobile.min.css" />
    <link rel="stylesheet" href="http://localhost/Login/css/pagecss.css">
    <!-- Default theme -->
<link rel="stylesheet" href="http://unpkg.com/@progress/kendo-theme-default/dist/all.css" />

<!-- Bootstrap theme -->
<link rel="stylesheet" href="http://unpkg.com/@progress/kendo-theme-bootstrap/dist/all.css" />

<!-- Material theme -->
<link rel="stylesheet" href="http://unpkg.com/@progress/kendo-theme-material/dist/all.css" />
<link href="{{ asset('css/pagecss.css') }}" rel="stylesheet">

</head>
<body bgcolor="lightgrey">
<div id="example">
    <div class="demo-section k-content">
        <div id="validation-success"></div>
      
        
       
        <fieldset>
           
           
         
            
        <form id="exampleform">
        <form method="POST" action="{{ route('login') }}">
                        @csrf
        
            
        </form>
       
        <div id="sam">
            <div class="demo-section k-content">
           
                <ul class="fieldset">
                    <span class="k-icon k-i-email"></span>
                    
                    <span class="k-icon k-i-lock"></span>
                      <input type="checkbox" id="eq1" class="k-checkbox" >
                      <label class="k-checkbox-label" for="eq1">Remember me</label><br><br>
                      OR <br> <br>
                      <a href="pass" class="ra">Forgot Password</a>
                     
                </ul>   
               
            </div> 
           
        </div>         
    </div>
   
    <script>
        $(document).ready(function () {
            var validationSuccess = $("#validation-success");

            $("#exampleform").kendoForm({
                orientation: "vertical",
                
               
                items: [{
                    type: "group",
                    label: "LOGIN CREDENTIALS :",
                    
                    items: [
                        { field: "Username", label: "Username:", validation: { required: true } },
                       
                        {
                            
                            field: "Password",
                            label: "Password:",
                            validation: { required: true },
                            hint: "Hint: enter alphanumeric characters only.",
                            editor: function(container, options) {
                                container.append($("<input type='password' class='k-textbox k-valid' id='Password' name='Password' title='Password' required='required' autocomplete='off' aria-labelledby='Password-form-label' data-bind='value:Password' aria-describedby='Password-form-hint' >"));
                                
                            }

                        },
                        
                    ]
                }],
                validateField: function(e) {
                    validationSuccess.html("");
                },
                Submit: function(e) {
                    e.preventDefault();
                    validationSuccess.html("<div class='k-messagebox k-messagebox-success'>Form data is valid!</div>");
        
                },
                clear: function(ev) {
                    validationSuccess.html("");
                }
                
            });
        });
        
        
    </script>
</div>


    

</body>
</html>
