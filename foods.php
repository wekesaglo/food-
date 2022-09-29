
    <?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
                //Display Foods that are Active
                $sql = "SELECT * FROM tbl_food WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the foods are availalable or not
                if($count>0)
                {
                    //Foods Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php 
                                    //CHeck whether image available or not
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
                    //Food not Available
                    echo "<div class='error'>Food not found.</div>";
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
              'Show fast': fast,
              'Show local': local,
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
        function fast(){
            console.log("fast");
            location= "category-foods.php?category_id=1";  
          }
         function local(){
            console.log("Local");
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