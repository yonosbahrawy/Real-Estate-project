<?php
class Index extends View
{
  public function output()
  {
    $title = $this->model->title;
    $subtitle = $this->model->subtitle;
 

    require APPROOT . '/views/inc/header.php';
    ?>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>css/style.css">
    <?php
    
      //  echo $_SESSION['user_id'];
      //  echo $_SESSION['user_name'];
      //  echo $_SESSION['email'];
      //  echo $_SESSION['Rank'];

?>

  <!-- <body background = "<?php //echo IMAGEROOT . 'img2.png' ; ?>" style = " background-attachment: fixed;"> -->
  <!-- background = "<?php echo IMAGEROOT . 'mike-enerio-w7Z0fiZw4Mw-unsplash.jpg' ; ?>" -->
  <body >
<div class = "homepage" style = "background-image: url(<?php echo IMAGEROOT3 . 'main.jpg' ; ?>);">
  
  <div class = "header"> 
        <span class = "word"> Find your future home</span>
  </div>

  <div class="homepage-search" >
    <form>
        <input class="form-control" type = "text" placeholder="Search" id = "myInput">
        <select name="property" id="property">
          <option value="houses">Houses</option>
          <option value="buildings">Buildings</option>
          <option value="villas">Villas</option>
          <option value="stores">Stores</option>
          <option value="clinics">Clinics</option>
          <option value="schools">Schools</option>
          <option value="factories">Factories</option>
          <option value="farms">Farms</option>
          <option value="lands">Lands</option>
        </select>
        <input type="submit">

    </form>
  </div>
</div>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////// -->
   <main class = "page-content">

   
   
   <div class="card-index">
            <div class="content">
              <h2 class="title">Houses</h2>
              <p class="copy">Seriously, straight up, just blast off into outer space today</p>
              <a href="<?php echo URLROOT . 'pages/viewItem'; ?>"><button class="btn">View Houses</button></a>
            </div>
    </div>

    <div class="card-index">
            <div class="content">
              <h2 class="title">Buildings</h2>
              <p class="copy">Seriously, straight up, just blast off into outer space today</p>
              <a href="#"><button class="btn">View Buildings</button></a>
            </div>
    </div>

    <div class="card-index">
            <div class="content">
              <h2 class="title">Villas</h2>
              <p class="copy">Seriously, straight up, just blast off into outer space today</p>
              <a href="#"><button class="btn">View Villas</button></a>
            </div>
    </div>

    <div class="card-index">
            <div class="content">
              <h2 class="title">Stores</h2>
              <p class="copy">Seriously, straight up, just blast off into outer space today</p>
              <a href="#"><button class="btn">View Stores</button></a>
            </div>
    </div>


    <div class="card-index">
            <div class="content">
              <h2 class="title">Clinics</h2>
              <p class="copy">Plan your next beach trip with these fabulous destinations</p>
              <a href="#"><button class="btn">View Clinics</button></a>
            </div>
      </div>

      <div class="card-index">
            <div class="content">
              
                <h2 class="title">Schools</h2>
                <p class="copy">Check out all of these gorgeous schools with beautiful views</p>
                <a href="#"><button class="btn">View Schools</button></a>
              
            </div>
      </div>

        
          <div class="card-index">
            <div class="content">
              <h2 class="title">Factories</h2>
              <p class="copy">It's the desert you've always dreamed of</p>
              <a href="#"><button class="btn">View Factories</button></a>
            </div>
      </div>


        


        <div class="card-index">
            <div class="content">
              <h2 class="title">Farms</h2>
              <p class="copy">Seriously, straight up, just blast off into outer space today</p>
              <a href="#"><button class="btn">View Farms</button></a>
            </div>
        </div>


        

        <div class="card-index">
            <div class="content">
              <h2 class="title">Lands</h2>
              <p class="copy">Seriously, straight up, just blast off into outer space today</p>
              <a href="#"><button class="btn">View Lands</button></a>
            </div>
        </div>

        
        

        <div class="card-index">
            <div class="content">
              <h2 class="title">Other</h2>
              <p class="copy">Seriously, straight up, just blast off into outer space today</p>
              <a href="#"><button class="btn">View Other</button></a>
            </div>
        </div>


      
        
      <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////// -->

   </main>
  </body>
  <footer> <?php
  require APPROOT . '/views/inc/footer2.php';
  ?> </footer>
<?php
    

  }
}
