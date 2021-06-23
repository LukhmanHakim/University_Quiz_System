<!DOCTYPE html>
<?php include "server.php" ?>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <style>
        
        table, th, td {
            border: 1px solid black;
        }
        
        th {
            text-align: left;
        }
        
        .table-wrapper {
            width: 700px;
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
                '<td><input type="text" class="form-control" name="admin_id" id="txtadmin_id"></td>' +
                '<td><input type="text" class="form-control" name="admin_name" id="txtadmin_name"></td>' + 
                '<td>' + actions + '</td>' +
            '</tr>';
            $("table").append(row);
            $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
            $('[data-toggle="tooltip"]').tooltip();
                   
        });
        
        // Add row on add button click
        $(document).on("click", ".add", function() {
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"]');
            input.each(function() {
                if(!$(this).val()) {
                    $(this).addClass("error");
                    empty = true;
                }else {
                    $(this).removeClass("error");
                }
            });
            var txtadmin_id = $("#txtadmin_id").val();
            var txtadmin_name = $("#txtadmin_name").val();
            $.post("add_admin.php", {txtadmin_id: txtadmin_id, txtadmin_name: txtadmin_name}, function(data) {
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
            $.post("delete_admin.php", {string: string}, function(data) {
                $("#displaymessage").html(data);
            });
        });
        
        // update rec row on edit button click
        $(document).on("click", ".update", function() {
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"]');
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
            var txtadmin_id = $("#txtadmin_id").val();
            var txtadmin_name = $("#txtadmin_name").val();
            $.post("update_admin.php", {string:string, txtadmin_id: txtadmin_id, txtadmin_name: txtadmin_name}, function(data) {
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
//                $(this).parents("tr").find(".update").removeClass("update").addClass("add");  
            }
        });            
        
        // Edit row on edit button click
        $(document).on("click", ".edit", function(){  
            $(this).parents("tr").find("td:not(:last-child)").each(function(i){
                if (i=='0'){
                    var idname = 'txtadmin_id';
                }else if (i=='1'){
                    var idname = 'txtadmin_name';
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
    <div class="container"><h1 style="padding-left:325px"><?php echo "Hi! Admin ".$_SESSION['admin_name']; ?></h1>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div><b>Admin Registeration</b></div>
                    <div>
                        <button type="button" class="add-new" style="float:right"><i></i>Add New</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 40%">Admin ID</th>
                        <th style="width: 40%">Admin Name</th>
                        <th style="width: 20%">Actions</th>
                    </tr>
                </thead>
                <tbody>
<?php
include "db.php";
$query = "SELECT * FROM admin";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $admin_id = $row['admin_id'];
    $admin_name = $row['admin_name'];                
?>         
                  
                    <tr>
                        <td><?php echo $admin_id; ?></td>
                        <td><?php echo $admin_name; ?></td>
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