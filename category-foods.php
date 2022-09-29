    
    <?php include('partials-front/menu.php'); ?>

    <?php 
        //CHeck whether id is passed or not
        if(isset($_GET['category_id']))
        {
            //Category id is set and get the id
            $category_id = $_GET['category_id'];
            // Get the CAtegory Title Based on Category ID
            $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Get the value from Database
            $row = mysqli_fetch_assoc($res);
            //Get the TItle
            $category_title = $row['title'];
        }
        else
        {
            //CAtegory not passed
            //Redirect to Home page
            header('location:'.SITEURL);
        }
    ?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2><a href="#" class="text-white">Foods on "<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
                //Create SQL Query to Get foods based on Selected CAtegory
                $sql2 = "SELECT * FROM tbl_food WHERE category_id=$category_id";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //Count the Rows
                $count2 = mysqli_num_rows($res2);

                //CHeck whether food is available or not
                if($count2>0)
                {
                    //Food is Available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        ?>
                        
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php 
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">Ksh<?php echo $price; ?></p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Food not available
                    echo "<div class='error'>Food not Available.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>
        <script type="text/javascript"
 src="https://studio.alan.app/web/lib/alan_lib.min.js"></script>
<script>
   var alanBtnInstance = alanBtn({
    key: "2be28217cfbe96aa5e8a940da93a4f4f2e956eca572e1d8b807a3e2338fdd0dc/stage",
    onCommand: function (commandData) {
      if (commandData.command === "go:back") {
        //call client code that will react on the received command
      }
    },
    rootEl: document.getElementById("alan-btn"),
  });
</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/annyang/2.6.1/annyang.min.js"></script>
<script>
    if (annyang){
        console.log("We have it");

        var commands= {
            'Show home': home,
             'Show categories': categories,
              'Show foods': foods,
              'Show fastfoods': fastfoods,
              'Show localfoods': localfoods,
              'Show drinks': drinks,
              'Order hamburger': hamburger,
              'Order ugali': ugali,
              'Order githeri': githeri,
              'Order mukimo': mukimo,
              'Order hotdog': hotdog,
              'Order fries': fries,
              'Order mango': mango,
              'Order passion': passion,
              'Order avocado': avocado,
            
        }

        function home(){
            console.log("Home");
            location= "index.php";

        }
         function categories(){
            console.log("Categories");
            location= "categories.php";

        }
         function foods(){
            console.log("Foods");
            location= "foods.php";
     
    }
        function fastfoods(){
            console.log("fastfoods");
            location= "category-foods.php?category_id=1";  
          }
         function localfoods(){
            console.log("Localfoods");
            location= "category-foods.php?category_id=2";
        
            }
         function drinks(){
              console.log("Drinks");
            location= "category-foods.php?category_id=3";
        
           }
     
    function hamburger (){
            console.log("Hamburger");
            location= "order.php?food_id=6";

        }
   function ugali (){
            console.log("Ugali");
            location= "order.php?food_id=4";

        }
        function githeri (){
            console.log("Githeri");
            location= "order.php?food_id=5";

        }
         function mukimo (){
            console.log("Mukimo");
            location= "order.php?food_id=9";

        }
   function hotdog (){
            console.log("Hotdog");
            location= "order.php?food_id=7";

        }
  function fries (){
            console.log("Fries");
            location= "order.php?food_id=8";

        }
 function mango (){
            console.log("Mango");
            location= "order.php?food_id=1";

        }
       
  function passion (){
            console.log("Passion");
            location= "order.php?food_id=3";

        }
    function avocado (){
            console.log("Avocado");
            location= "order.php?food_id=2";

        
        }
        annyang.addCommands(commands);
        annyang.start();
    }
</script>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>