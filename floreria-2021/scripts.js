$("#headingOnelink").click(function (e) { 
  
    $("#collapseOne").collapse('show');
    $("#collapseTwo").collapse('hide');
    $("#collapsethree").collapse('hide');
    $("#collapsefour").collapse('hide');
    $("#collapsefive").collapse('hide');
});
$("#headingTwolink").click(function (e) { 
   
    $("#collapseOne").collapse('hide');
    $("#collapseTwo").collapse('show');
    $("#collapsethree").collapse('hide');
    $("#collapsefour").collapse('hide');
    $("#collapsefive").collapse('hide');
});
$("#headingthreelink").click(function (e) { 
  
    $("#collapseOne").collapse('hide');
    $("#collapseTwo").collapse('hide');
    $("#collapsethree").collapse('show');
    $("#collapsefour").collapse('hide');
    $("#collapsefive").collapse('hide');
});
$("#headingfourlink").click(function (e) { 
  
    $("#collapseOne").collapse('hide');
    $("#collapseTwo").collapse('hide');
    $("#collapsethree").collapse('hide');
    $("#collapsefour").collapse('show');
    $("#collapsefive").collapse('hide');
});
$("#headingfivelink").click(function (e) { 
  
    $("#collapseOne").collapse('hide');
    $("#collapseTwo").collapse('hide');
    $("#collapsethree").collapse('hide');
    $("#collapsefour").collapse('hide');
    $("#collapsefive").collapse('show');
});