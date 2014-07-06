<!DOCTYPE html>
<?php include 'inc/DoTranslate.php'; ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
         <script type="text/javascript" src="style/jquery/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
        <title>Translate WebApp</title>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu&subset=cyrillic,latin' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" type="text/css" href="style/css/style.css">
    </head>
    <body>
        <div class="headerdiv">Translate WebApp</div><div><br/></div>
        <div class="headertextdiv">Translate your text easily</div>
        <div><hr /></div>
        <form action="inc/DoTranslate.php" name="translateajaxform" id="translateajaxform" method="post">
            <div class="elements">
                <select name="fromselect" id="fromselect">
                <?php
                    foreach($Mapping as $key=>$value) {
                ?>
                    <option value=<?php echo $value; echo ($value == $_POST['fromselect']?" selected":" ");?>><?php echo $key ?></option>  
                <?php
                } 
                ?>
                </select>
                <input class="swapbuttoninput" type="submit" id="swap" name="swap" value="Swap">
                <select name="toselect" id="toselect">
                <?php
                    foreach($Mapping as $key=>$value) {
                ?>
                    <option value=<?php echo $value; echo ($value == $_POST['toselect']?" selected":" ");?>><?php echo $key ?></option>
                <?php 
                }
                ?>
                </select>
                <input type="submit" name="translate" value="Translate">
            </div>
            <br />
            <div class="textareadiv">
            <textarea name="fromtext" id="totext" rows="6" cols="50"><?php echo $from_text; ?></textarea>
            
            <textarea name="totext" id="totext" rows="6" cols="50" readonly><?php echo $translate; ?></textarea>
            </div>
        </form>
        <div id="mydiv" name="mydiv"></div>
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
        $("#fromselect option:selected").val(toVal);
        $("#fromselect option:selected").text(toText);
        $("#toselect option:selected").val(fromVal);
        $("#toselect option:selected").text(fromText);
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
