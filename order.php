
<?php include('partials-front/menu.php'); ?>

    <?php 
       
        if(isset($_GET['food_id']))
        {
            
            $food_id = $_GET['food_id'];

            
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
           
            $res = mysqli_query($conn, $sql);
           
            $count = mysqli_num_rows($res);
            
            if($count==1)
            {
                
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                
                header('location:'.SITEURL);
            }
        }
        else
        {
           
            header('location:'.SITEURL);
        }
    ?>


    <section class="food-search2">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order" id="myform">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php 
                        
                           
                            if($image_name=="")
                            {
                                //Image not Availabe
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                //Image is Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">Ksh<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" id= "qty"name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" id="uname" name="fullname" placeholder="E.g. William Kamau" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" id="contact" name="contact" placeholder="E.g. 0741000000" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" id="email"  name="email" placeholder="E.g. william@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea type="address" id="address" name="address" rows="3" placeholder="E.g. Street, Town, House number" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" id="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 

              
                if(isset($_POST['submit']))
                {
                 

                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty;  

                    $order_date = date("Y-m-d h:i:sa"); 

                    $status = "Ordered";  

                    $customer_name = $_POST['fullname'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];


                   
                    $sql2 = "INSERT INTO tbl_order SET 
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";

                   
                    $res2 = mysqli_query($conn, $sql2);

                   
                    if($res2==true)
                    {
                       
                        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                   
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                        header('location:'.SITEURL);
                    }

                }
            
            ?>

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
        <script src="//cdnjs.cloudflare.com/ajax/libs/annyang/2.6.0/annyang.min.js"></script>
<script>
if (annyang) {
  // Let's define our first command. First the text we expect, and then the function it should call
  var commands = {
  	'show tps report': function() {
      $('#tpsreport').animate({bottom: '-100px'});
      
},
'hello': function() {
	alert('Howdy');
},
'write name *tag': function(variable){
	let uname=document.getElementById("uname");
	uname.value=variable;
},
'write contact *tag': function(variable){
	let contact=document.getElementById("contact");
	contact.value=variable;
},
'write email *tag': function(variable){
	let email=document.getElementById("email");
	email.value=variable.split("").join("");
},
'write address *tag': function(variable){
	let address=document.getElementById("address");
	address.value=variable;
},
'write quantity *tag': function(variable){
    let qty=document.getElementById("qty");
    qty.value=variable;
},
'submit form': function(){
  let myform= document.getElementById("myform"); 
  let container= doument.querySelector(".container");
  let heading= doument.querySelector(".container h2");
  myform.remove();
},
  }
  };

  // Add our commands to annyang
  annyang.addCommands(commands);

  // Start listening. 
  annyang.start();


</script>

 <script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/annyang/2.6.1/annyang.min.js"></script>
<script>
    if (annyang){
        console.log("We have it");

        var commands= {
            'Show home': home,
             'Show categories': categories,
              'Show foods': foods,
              'Show order': order,
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

        function order (){
            console.log("Order");
            location= "order.php";

        }
        annyang.addCommands(commands);
        annyang.start();
    }
</script>

 </script>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>