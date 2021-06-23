<!DOCTYPE html>
<?php include "server.php"?>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <style>
        
        input[type=text] {
            width: 100%;
            box-sizing: border-box;
        }
        
        table, th, td {
            border: 1px solid black;
        }
        
        th {
            text-align: left;
        }
        
        .table-wrapper {
            width: 1000px;
            margin: 30px auto;
            padding: 20px;
        }
        
        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }
               
/*
        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }
*/
        
        .table-title .add-new i {
            margin-right: 4px;
        }
        
        table.table {
            table-layout: fixed;
        }
        
        table.table tr th, table.table tr td {
            border-color: solid black;
        }
        
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        
        table.table th:last-child {
            width: 100px;
        }
        
        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }   
            
         
        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }    
            
/*
        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }
*/
         
        table.table .form-control.error {
            border-color: red;
        }
         
        table.table td .add {
            display: none;
        }
        
        
    </style>
    
    <script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        var actions = $("table td:last-child").html();
        
        // Append table with add row form on add new button click
        $(".add-new").click(function(){
            $(this).attr("disabled", "disabled");
            var index = $("table tbody tr:last-child").index();
            var row = '<tr>' +
                '<td><input type="text" class="form-control" name="stud_id" id="txtstud_id"></td>' +
                '<td><input type="text" class="form-control" name="stud_name" id="txtstud_name"></td>' + 
                '<td><input type="email" class="form-control" name="stud_email" id="txtstud_email"></td>' + 
                '<td></td>' + 
                '<td></td>' + 
                '<td>' + actions + '</td>' +
            '</tr>';
            $("table").append(row);
            $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
            $('[data-toggle="tooltip"]').tooltip();
                   
        });
        
        // Add row on add button click
        $(document).on("click", ".add", function() {
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"], input[type="email"]');
            input.each(function() {
                if(!$(this).val()) {
                    $(this).addClass("error");
                    empty = true;
                }else {
                    $(this).removeClass("error");
                }
            });
            var txtstud_id = $("#txtstud_id").val();
            var txtstud_name = $("#txtstud_name").val();
            var txtstud_email = $("#txtstud_email").val();
            
            $.post("add_stud.php", {txtstud_id: txtstud_id, txtstud_name: txtstud_name, txtstud_email: txtstud_email}, function(data) {
                $("#displaymessage").html(data);
            });
            
            $(this).parents("tr").find(".error").first().focus();
            if(!empty) {
                input.each(function() {
                    $(this).parents("td").html($(this).val());
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").removeAttr("disabled");
            }
        });
        // Delete row on delete button click
        $(document).on("click", ".delete", function() {
            $(this).parents("tr").remove();
            $(".add-new").removeAttr("disabled");
            var id = $(this).attr("id");
            var string = id;
            $.post("delete_stud.php", {string: string}, function(data) {
                $("#displaymessage").html(data);
            });
        });
        
        // update rec row on edit button click
        $(document).on("click", ".update", function() {
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"], input[type="email"]');
            input.each(function() {
                if(!$(this).val()) {
                    $(this).addClass("error");
                    empty = true;
                }else {
                    $(this).removeClass("error");
                }
            });
            var id = $(this).attr("id");
            var string = id;
            var txtstud_id = $("#txtstud_id").val();
            var txtstud_name = $("#txtstud_name").val();
            var txtstud_email = $("#txtstud_email").val();
            
            $.post("update_stud.php", {string:string, txtstud_id: txtstud_id, txtstud_name: txtstud_name, txtstud_email: txtstud_email}, function(data) {
                $("#displaymessage").html(data);
            });
            
            $(this).parents("tr").find(".error").first().focus();
            if(!empty) {
                input.each(function() {
                    $(this).parents("td").html($(this).val());
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").removeAttr("disabled");
                $(this).parents("tr").find(".update").hide();
                
            }
        });            
        
        // Edit row on edit button click
        $(document).on("click", ".edit", function(){  
            $(this).parents("tr").find("td:not(:last-child)").each(function(i){
                if (i=='0'){
                    var idname = 'txtstud_id';
                }else if (i=='1'){
                    var idname = 'txtstud_name';
                }else if (i=='2'){
                    var idname = 'txtstud_email';
                }else{ }
                $(this).html('<input type="text" name="updaterec" id="' + idname + '" class="form-control" value="' + $(this).text() + '">');
            });  
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").attr("disabled", "disabled");
            $(this).parents("tr").find(".add").removeClass("add").addClass("update");
        });
    });
        
    </script>
</head>
<body>
    <div class="container"><h1 style="padding-left:175px"><?php echo "Hi! Admin ".$_SESSION['admin_name']; ?></h1>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div><b>Student Registeration</b></div>
                    <div>
                        <button type="button" class="add-new" style="float:right"><i></i>Add New</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 18%">Student ID</th>
                        <th style="width: 18%">Student Name</th>
                        <th style="width: 23%">Email</th>
                        <th style="width: 15%">Modified By</th>
                        <th style="width: 16%">Modified On</th>
                        <th style="width: 10%">Actions</th>
                    </tr>
                </thead>
                <tbody>
<?php
include "db.php";
$query = "SElECT * FROM student";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $stud_id = $row['stud_id'];
    $stud_name = $row['stud_name'];
    $stud_email = $row['stud_email'];
    $stud_by = $row['stud_by'];
    $stud_on = $row['stud_on'];
?>         
                  
                    <tr>
                        <td><?php echo $stud_id; ?></td>
                        <td><?php echo $stud_name; ?></td>
                        <td><?php echo $stud_email; ?></td>
                        <td><?php echo $stud_by; ?></td>
                        <td><?php echo $stud_on; ?></td>

                        <td>
                            <a class="add" data-toggle="tooltip" id="<?php echo $id; ?>"><i></i>add</a>
                            <a class="edit" data-toggle="tooltip" id="<?php echo $id; ?>"><i></i>edit</a>
                            <a class="delete" data-toggle="tooltip" id="<?php echo $id; ?>"><i></i>delete</a>
                        </td>
                    </tr>
<?php } ?>                    
                </tbody>
            </table>
            <div id="displaymessage" style="color:red"></div>
        </div>
    </div>
    
    
    
    
</body>

</html>