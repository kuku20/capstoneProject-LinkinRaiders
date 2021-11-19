/* IEEE Reference Ciatation Format according to Wikihow:
*    BraveCoderYT[1]language-translator-php(2021)[Source code].https://github.com/BraveCoderYT/language-translator-php
*/
$(document).ready(function() {
    $("#translate").on("click", function() {
        var lang_one =$("#lang_one").val();
        var lang_two =$("#lang_two").val();
        var text =$("#message").val();
        
        $.ajax({
            url: "../process.php",
            type: "post",
            data: { lang_one: lang_one, lang_two: lang_two, text: text},
            success: function (status){
               text = $("#message").val(status);
            
            }
        })
      
    });
})