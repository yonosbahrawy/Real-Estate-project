<?php
class viewRent extends View
{
   public function output()
  {
    try{
      if(empty($_SESSION['user_id'])||$_SESSION['Rank']== "User")  {
        throw new Exception('not Admin');
      }    
        }
        catch(Exception $e){
                redirect('index');
        }


    $no_of_records_per_page = 10;
  $offset =0;

 $action = URLROOT . 'Pages/viewRent';   
 $action2 = 'viewRent';  
 $action3 = URLROOT . 'Pages/viewADDRent'; 
 require APPROOT . '/views/inc/header.php';


?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/ViewPage.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/resetFilter.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/styleFilter.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/RentCards.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/Button.css">

<body>
   
  

<style>
  .fcc-btn {
  background-color: #199319;
  color: white;
  padding: 15px 25px;
  text-decoration: none;
  border-radius:7px;
}

.fcc-btn:hover {
  background-color: #309319;
}

</style>
  <main class="cd-main-content">
   <section class="cd-gallery">
    <div style="text-align: right; margin-right:40px ; margin-top:20px;">
  <a href="<?php echo $action3;?>" class="fcc-btn">ADD</a>
</div>
     <ul>
       
   <div class="Car-ALL">

   <?php
         //  pagination start
        //  $this->model->CheckIfRentIsStillValid(0,6);
         if (isset($_GET['pageno'])) {
           $pageno = $_GET['pageno'];
         } else {
           $pageno = 1;
         }


       

       
        ?>
         <div class="container bootstrap snippets bootdeys">
           
        <div id="cards" class="row"></div>
        </div>
       

        <?php
          
         
        


         // pagination end
         ?>
       <!-- </div>
       </div>
       <li class="gap"></li>
       <li class="gap"></li>
       <li class="gap"></li> -->
     </ul>
   </section>
   

   

   <?php $action = URLROOT . 'Pages/viewRent'; ?>
   <?php $action2 = 'viewRent'; ?>
  <?php $action3 = URLROOT . 'Pages/viewADDRent';
  
  
  ?>



   <!-- <div class="form" id="sidebar" > -->
  <div class="cd-filter">
   <form class="form">
     <!-- <form class="form" id="sidebar" <?php echo $action;?> method="post" > -->
       <div class="cd-filter-block">
         <h4>Search</h4>
         
         <div class="cd-filter-content">
           <input type="search" name="search" id="search" placeholder="أبحث" onkeyup="lettersandnumbers(this)" maxlength="50" >
         </div> <!-- cd-filter-content -->
       </div> <!-- cd-filter-block -->

     
       <input id="offset" name="offset" type="text" hidden value="<?php echo $offset;?>">
       <input id="no_of_records_per_page" name="no_of_records_per_page" type="text" hidden value="<?php echo $no_of_records_per_page;?>">

       <div class="cd-filter-block">
         <h4>المساحة</h4>
         
         <div class="cd-filter-content">
           <div class="cd-select cd-filters">
             <select class="filter" name="Rent" id="Rent">
               <option selected value="">الايجارات</option>
               <option value="1">مستمر </option>
               <option value="2">يجب الدفع</option>
               <option value="3">انتهي</option>
               <option value="4">لم يبدأ</option>
               <option value="5">حاجة غلط في التاريخ</option>
             </select>
           </div> 
         </div> 
       </div> 
     

    
    </form>

     <a href="#0" class="cd-close">Close</a>
  </div>

   <a href="#0" class="cd-filter-trigger">Filters</a>
 </main> 
 <ul class="row" onclick=itemsAjax2();>

<li id="LoadMore" style="width:20%; cursor: pointer;">Load More</li>
</ul>

    
      <footer> <?php
                require APPROOT . '/views/inc/footer2.php';
                ?> </footer>
    </body>

    <script>
      offset =<?php echo $offset;?>;
no_of_records_per_page = <?php echo $no_of_records_per_page ;?>;
function button(CardID){
var CardID=CardID;
// console.log(CardID);
// var btnRent = document.querySelector( '.btnRent' );
// var btnFront = btnRent.querySelector( '.btnRent-front' );
// var btnYes = btnRent.querySelector( '.btnRent-back .yes' );
// var btnNo = btnRent.querySelector( '.btnRent-back .no' );

var btnRent = document.getElementById( 'btnRent'+CardID );
var btnFront = document.getElementById( 'btnRent-front'+CardID );
var btnYes = document.getElementById( 'yes'+CardID );
var btnNo = document.getElementById( 'no'+CardID );

// btnFront.addEventListener( 'click', function( event ) {
  var mx = event.clientX - btnRent.offsetLeft,
      my = event.clientY - btnRent.offsetTop;

  var w = btnRent.offsetWidth,
      h = btnRent.offsetHeight;
    
  var directions = [
    { id: 'top', x: w/2, y: 0 },
    { id: 'right', x: w, y: h/2 },
    { id: 'bottom', x: w/2, y: h },
    { id: 'left', x: 0, y: h/2 }
  ];
  
  directions.sort( function( a, b ) {
    return distance( mx, my, a.x, a.y ) - distance( mx, my, b.x, b.y );
  } );
  
  btnRent.setAttribute( 'data-direction', directions.shift().id );
  btnRent.classList.add( 'is-open' );

// } );

// btnYes.addEventListener( 'click', function( event ) { 
 
 
// } );

// btnNo.addEventListener( 'click', function( event ) {
//    console.log("No");
  
  
// } );
$('#yes'+CardID).unbind().click(function() {
  $.ajax({
          url:"viewRent",
          method:"POST",
          data:{CardID:CardID},
          
          success:function(data)
          {
            //  console.log(data);
             var result = data.substr(22, 1);
             var result2String="بداية إلايجار الحالي <br>"
             var result2= data.substr(0, 10);
             var result3String="نهاية إلايجار الحالي <br>"
             var result3= data.substr(11, 10);
             if(result=="1"){
            $('#btnRent'+CardID).html("");
            $('#btnRent'+CardID).remove();
            $('#TOR'+CardID).html(result2String+result2);
            $('#Background'+CardID).css({backgroundColor: "#20AF1C"});
             }else if(result=="2"){
            $('#TOR'+CardID).html(result2String+result2);
            $('#TOREND'+CardID).html(result3String+result3);
            $('#Background'+CardID).css({backgroundColor: "#B709D3"});
             }
           
          }
        })  
  btnRent.classList.remove( 'is-open' );
 
});
$('#no'+CardID).unbind().click(function() {
  btnRent.classList.remove( 'is-open' );
  // console.log("No");
});

function distance( x1, y1, x2, y2 ) {
  var dx = x1-x2;
  var dy = y1-y2;
  return Math.sqrt( dx*dx + dy*dy );
}
}

      function RentAjax(){
        // console.log(offset);
        // console.log(no_of_records_per_page);
        if( document.getElementById('Rent').value ) {
          Rent = document.getElementById('Rent').value;
        }else{
          Rent = "Salah";
        }
       
        if( document.getElementById('search').value ) {
          search = document.getElementById('search').value;
        }else{
          search = "Salah";
        }  
       
        
      
       
        var joex="joex";
        $.ajax({
          url:"<?php echo $action2;?>",
          method:"POST",
          data:{joex:joex,Rent:Rent,search:search,offset:offset ,no_of_records_per_page:no_of_records_per_page},
          
          success:function(data)
          {
            if(!data){
              loadMore = document.getElementById('LoadMore').innerHTML='No more items to Load';
              
              }else{
              container = document.getElementById('cards')
              container.innerHTML+=data;
              }
            
          }
        })
        
      }
      $( ".form" ).change(function() {
        //schow item on change
       
        document.getElementById('cards').innerHTML='';
        offset=0;
        no_of_records_per_page=<?php echo $no_of_records_per_page ;?>;
        RentAjax();
        document.getElementById('LoadMore').innerHTML='<a  onclick=itemsAjax2(); >Load More</a>';

      });
      //Show item first time 
      RentAjax();
      function OnKeyUpSearch() {
        
        //schow item on change
        // console.log("here1");
        document.getElementById('cards').innerHTML='';
        
        offset=0;
        no_of_records_per_page=<?php echo $no_of_records_per_page ;?>;
        RentAjax();
        document.getElementById('LoadMore').innerHTML='<a  onclick=itemsAjax2(); >Load More</a>';

      }
      function itemsAjax2(){
        
        offset+=no_of_records_per_page;
        
        RentAjax();


      }

    </script>

<?php
  }
}
