function addAjaxQues(){
    var form = document.getElementById("fquestionajax");
    var data = new FormData(form);
    $.ajax({
       type: "POST",
       url: "../php/AddQuestionWithImage.php",
       data: data,
       processData: false,
       contentType: false,
       success: function(data)
       {
           $('#mensajeSer').html(data);
       }
     });
}