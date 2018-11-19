<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
 
 
        <!-- Styles -->
        <style>
          

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
   

            <div class="content">




                                            <h1><legend>List   <a href="{{url('/api')}}" class="btn btn-primary">Goto API</a></legend></h1>
                                        
                                                            <table class="table table-bordered" id="table_id">
                                                                    <thead>
                                                                        <tr>
                                                                          
                                                                            <th>Course id</th>                 
                                                                            <th>Course name</th>
                                                                            <th>Course type</th>  
                                                                          
                                                                        </tr>
                                                                    </thead>
                                                        	
                                                                        @foreach($result as $row)

                                                                        



                                                                        <tr>
                                                                         
                                                                            <td class="cid">{{$row->cid}}</td>
                                                                            <td class="name">{{$row->cname}}</td>
                                                                            <td class="type">{{$row->ctype}}</td>
                                                                          
                                                                        
                                                                        </tr>


                                                                        @endforeach


                                                            </table>
                                                                    
                                                                
                            
                                
             </div>
                         
        






    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#table_id').dataTable();
                                });

                              
                              
                                $(".getvalues").click(function() {
                                        var $row = $(this).closest("tr");    // Find the row
                                        var cid = $row.find(".cid").text();
                                        var name = $row.find(".name").text(); // Find the text
                                        var type = $row.find(".type").text();
                                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


                                                     $.ajax({
                                                                /* the route pointing to the post function */
                                                                url: 'savedata',
                                                                type: 'POST',                                                            
                                                                data: {_token: CSRF_TOKEN, cid:cid,name:name,ctype:type},
                                                                dataType: 'JSON',                                                         
                                                                success: function (data) { 
                                                                   alert(data.msg);
                                                                }
                                                            }); 






                                      
                                        //alert(name);
                                });







       
            

















                            </script>


</html>
