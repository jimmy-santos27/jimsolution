$(document).on("click", ".orders", function () {
   var ordernum = $(this).data('id');
   // alert(ordernum);
    // $(".modal-body #tabledata").val( p_id );

  
      $.ajax({    //create an ajax request to load_page.php
        type:"POST",
        url: "orderedproduct.php",             
        dataType: "text",   //expect html to be returned  
        data:{ordernumber:ordernum},               
        success: function(data){                    
            $("#myModal").html(data); 
            // alert(data);

        }

    });
 
   
});


$(document).on("click", "#btnclose" , function () {
 
  
      $.ajax({    //create an ajax request to load_page.php
        type:"POST",
        url: "orderedproduct.php",             
        dataType: "text",   //expect html to be returned  
        data:{close:"close"},               
        success: function(data){                    
            
            // alert("closing");
            
              
        }

    });
 
   
});

$(document).on("keyup", ".disper" , function () {
 



  var perDis = document.getElementById("PRODISCOUNT");
  var proPrice = document.getElementById("PROPRICE");
  var totprice  ;
  var dis;
  var subTot;

  if(perDis.value=='')
{
 document.getElementById("PRODISPRICE").value = 0.0;
}else{
    dis = perDis.value / 100 ;
  subTot = proPrice.value * dis;
  
 tot = proPrice.value - subTot;

 document.getElementById("PRODISPRICE").value = tot.toFixed(2);
}


 //  dis = perDis.value / 100 ;
 //  subTot = proPrice.value * dis;
  
 // tot = proPrice.value - subTot;

 // document.getElementById("PRODISPRICE").value = tot.toFixed(2);

});

// $(document).on("click", ".setBanner" , function () {
   
 
//       var chkelement=document.getElementsByName(selector);

//          alert(chkelement);

//       for(var i=0;i<chkelement.length;i++)
//       {
//         if (chkelement.item(i).checked==true){
//             alert('asas');

//         }
//       }
    
 
      // $.ajax({    //create an ajax request to load_page.php
      //   type:"POST",
      //   url: "orderedproduct.php",             
      //   dataType: "text",   //expect html to be returned  
      //   data:{close:"close"},               
      //   success: function(data){                    
            
      //       // alert("closing");
            
              
      //   }

    // });
 
   
// });

function checkall2(selector, chkAll, tblname )
{

    var table = document.getElementById(tblname);
    var tr = table.getElementsByTagName("tr");
    var strs =" ";
    if(document.getElementById(chkAll).checked==true)
    {
        var chkelement=document.getElementsByName(selector);

        for(var i=0;i<chkelement.length;i++)
        {
           // strs = strs +" : "+ i.toString()+ tr[i].style.display +" - "+  chkelement[i].value;
            chkelement.item(i).checked = true;
            if (tr[i+1].style.display != "") {
                chkelement.item(i).checked = false;


            }
            chkSelect(i);
        }
    }
    else
    {
        var chkelement=document.getElementsByName(selector);
        for(var i=0;i<chkelement.length;i++)
        {
            chkelement.item(i).checked = false;
            chkSelect(i);
        }
    }

    //alert(strs);
}

function checkall(selector)
  {
    if(document.getElementById('chkall').checked==true)
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=true;
      }
    }
    else
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=false;
      }
    }
  }

function chkSelectOn(ctr) {
    var selector = document.getElementsByName("selector[]");
    if (selector.item(ctr).checked == true) {
        selector.item(ctr).checked = false;
    }else{
        selector.item(ctr).checked = true;
    }
    chkSelect(ctr);
}
function chkSelect(ctr) {
    var selector = document.getElementsByName("selector[]");
    var QTYselector=document.getElementsByName("QTYselector[]");
    var PURPRICEselector=document.getElementsByName("PURPRICEselector[]");
    var DISCPERselector=document.getElementsByName("DISCPERselector[]");
    var DISCAMTselector=document.getElementsByName("DISCAMTselector[]");
    if (selector.item(ctr).checked == true)
    {
        QTYselector.item(ctr).readOnly = false;
        PURPRICEselector.item(ctr).readOnly = false;
        DISCPERselector.item(ctr).readOnly = false;
        DISCAMTselector.item(ctr).readOnly = false;
    }else {
        QTYselector.item(ctr).readOnly = true;
        PURPRICEselector.item(ctr).readOnly = true;
        DISCPERselector.item(ctr).readOnly = true;
        DISCAMTselector.item(ctr).readOnly = true;

    }
}

function myTblFilter(inputName, tblname) {

    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById(inputName);
    filter = input.value.toUpperCase();
    table = document.getElementById(tblname);
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
        if (tr[i].style.display != ""){
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
        if (tr[i].style.display != ""){
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
        if (tr[i].style.display != ""){
            td = tr[i].getElementsByTagName("td")[4];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

    }
}


