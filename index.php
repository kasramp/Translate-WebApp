<!DOCTYPE html>
<?php include 'inc/DoTranslate.php'; ?>
<?php 
            /* 
             * This file is part of Translate-WebApps.
             * Translate-WebApp is free software; you can redistribute it and/or modify
             * it under the terms of the GNU General Public License version 3
             * as published by the Free Software Foundation.
             *
             * Translate-WebApps is distributed in the hope that it will be useful,
             * but WITHOUT ANY WARRANTY; without even the implied warranty of
             * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
             * GNU General Public License for more details.  <http://www.gnu.org/licenses/>
             *
             * Author(s):
             * © 2015 Kasra Madadipouya <kasra@madadipouya.com>
             */
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="style/js/bootstrap.js"></script>
        <title>Translate WebApp</title>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu&subset=cyrillic,latin' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" type="text/css" href="style/css/bootstrap.css">
        <link rel="shortcut icon" type="image/png" href="style/icons/favicon.png"/>
    </head>
    <body>
        <div class="container">
        <div class="jumbotron">
            <h1><img src="style/icons/90x90.png" alt="Translate Icon" >ranslate WebApp</h1>
            <p>Translate your text easily</p>
        </div>
        <form action="inc/DoTranslate.php" name="translateajaxform" id="translateajaxform" method="post">
            <div class="well">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <select class="form-control" name="fromselect" id="fromselect">
                                <?php
                                    foreach($Mapping as $key=>$value) {
                                ?>
                                    <option value=<?php echo $value; echo ($value == $_POST['fromselect']?" selected":" ");?>><?php echo $key ?></option>  
                                <?php
                                } 
                                ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <span class="pull-right">
                                    <!--<input class="btn btn-default" type="submit" id="swap" name="swap" value="Swap">-->
                                    <button type="button" class="btn btn-default" id="swap" name="swap" value="Swap">
                                    <span class="glyphicon glyphicon-retweet" aria-hidden="true"></span>
                                </span>
                            </div>
                        </div>
                        <br />
                        <textarea class="form-control" name="fromtext" id="fromtext" rows="6" cols="50"><?php echo $from_text; ?></textarea>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <select class="form-control" name="toselect" id="toselect">
                                <?php
                                    foreach($Mapping as $key=>$value) {
                                ?>
                                    <option value=<?php echo $value; echo ($value == $_POST['toselect']?" selected":" ");?>><?php echo $key ?></option>
                                <?php 
                                }
                                ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <span class="pull-right">
                                    <input class="btn btn-default" type="submit" name="translate" value="Translate">            
                                </span>
                            </div>
                        </div>
                        <br />
                        <textarea class="form-control" name="totext" id="totext" rows="6" cols="50" readonly><?php echo $translate; ?></textarea>    
                    </div>  
                </div>
            </div>
        </form>
    </body>
    <script type="text/javascript">
    $("#translateajaxform").submit(function(e)
    {
        e.preventDefault();  
        var postData = $(this).serializeArray();
        console.log(postData);
        var formURL = $(this).attr("action");
        $.ajax(
        {
            url : formURL,
            type: "POST",
            data : postData,
            success:function(data, textStatus, jqXHR) 
            {
                console.log("suceed");
                $("textarea#totext").text(data);
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
                var n = noty({text: 'Connection to Webservice failed, please try later', type : 'error'
                , layout: 'bottom'});
                console.log("failed");            
            }
        });
    }); 
    
    $("#swap").click(function(e) {
        var fromVal = $("#fromselect option:selected").val();
        var fromText = $("#fromselect option:selected").text();
        var toVal = $("#toselect option:selected").val();
        var toText = $("#toselect option:selected").text();
        var fromTxtArea = $("#fromtext").text();
        var toTxtArea = $("#totext").text();
        $("#fromtext").val(toTxtArea);
        //$("#totext").val(fromTxtArea);
        $("#fromselect option:selected").val(toVal);
        $("#fromselect option:selected").text(toText);
        $("#toselect option:selected").val(fromVal);
        $("#toselect option:selected").text(fromText);
        $("#translateajaxform").submit();
    });
    
    $('#fromselect').change(
    function(){
         $('#translateajaxform').submit();
    });
    
    $('#toselect').change(
    function(){
         $('#translateajaxform').submit();
    });
    </script>
</html>
