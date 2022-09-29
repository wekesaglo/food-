
<?php include('partials-front/menu.php'); ?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 

                //Display all the cateories that are active
                //Sql Query
                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether categories available or not
                if($count>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not found.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //CAtegories Not Available
                    echo "<div class='error'>Category not found.</div>";
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
            console.log("Fast");
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
     
        annyang.addCommands(commands);
        annyang.start();
    }

</script>
    </section>
    <!-- Categories Section Ends Here -->


    <?php include('partials-front/footer.php'); ?>