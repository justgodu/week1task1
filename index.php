<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container  card p-5" >
    <?php if(isset($_GET['ans']))
            if($_GET['ans'] == 1)echo '<h4 class="text-success">წარმატებით დაემატა</h4>';
            else echo '<h4 class="text-danger">დამატება ჩაიშალა</h4>'; ?>
		<form method="POST"  action="add-product.php">
		  <div class="form-group">
		    <label for="productName">პროდუქტის სახელი</label>
		    <input type="text" class="form-control" id="productName" placeholder="შეიყვანეთ პროდუქტის სახელი" name="prodname">
		    
		  </div>
		  <div class="form-group">
		    <label for="productDescription">პროდუქტის აღწერა</label>
		    <textarea  class="form-control" id="productDescription" placeholder="შეიყვანეთ პროდუქტის აღწერა" name="prodescription"></textarea>
		  </div>
		  
		  <button type="submit" name="add-prod-submit" class="btn btn-primary">პროდუქტის დამატება</button>
		</form>

        <div class="card mt-5">
            <h4 class="card-header">ყველა პროდუქტის ჩამონათვალი</h4>
            <div class="card-body" id="productlist">
                
            </div>
            <button onclick="listProducts()" class="btn btn-primary">დააჭირეთ რომ მიიღოთ ყველა პროდუქტი</button>
        </div>
	</div>

    
        

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        function listProducts(){ 
            var ajax = new XMLHttpRequest();
            var method = "GET";
            var url ="list-all-products.php";
            var data;
            console.log("sent");
            ajax.open(method, url, true);

            ajax.send();

            ajax.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    console.log(data);

                    var html = "<ul>";

                    for(var i = 0; i<data.length; i++){
                        
                        $prodName = data[i]['product_name'];
                        $description = data[i]['description'];
                        console.log(data[i]['description']);
                        html+= "<li>";
                            html+= "<h5>";
                                html += $prodName;
                            html += "</h5>";
                            html += "<p>";
                                html += $description;
                            html += "</p>";
                        html += "</li>";
                    }
                    html += "</ul>";
                    document.getElementById("productlist").innerHTML  += html;
                }
            }
            
            


            };
        
    </script>
</body>
</html>