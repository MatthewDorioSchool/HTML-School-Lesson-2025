<div class="container-md rounded">
    <?php if($success): ?>
        <div class="alert alert-info" role="alert">
            <p>Order sumbited sucessfully</p>
        </div>
    <?php endif; ?> 

    <?php if(!empty($error)): ?> 
        <div class="alert alert-warning">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>
    
    <form method="post" class="mt-4 mb-4">
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="CustomerName" class="form-control" required> 
    </div>
    <div class="mb-3">
        <label class="form-label">Delivery address</label>
        <input type="text" name="DevlieryAddress" class="form-control" required> 
    </div>
    <div class="mb-3">
        <label class="form-label">Size</label><br>
        <input type="radio" id="small" name="PizzaSize" value="small">
        <label for="small">Small</label><br>
        <input type="radio" id="medium" name="PizzaSize" value="medium">
        <label for="medium">Medium</label><br>
        <input type="radio" id="large" name="PizzaSize" value="large">
        <label for="large">Large</label><br>
    </div>
    <div class="mb-3">
        <label class="form-label">Toppings</label><br>
        <input type="checkbox" name="toppings[]" value="Pepperoni">Pepperoni
        <input type="checkbox" name="toppings[]" value="Bacon">Bacon
        <input type="checkbox" name="toppings[]" value="Mushroom">Mushroom
        <input type="checkbox" name="toppings[]" value="Olives">Olives
    </div>
    <div class="mb-3">
        <label class="form-label">Phone Number</label>
        <input type="text" name="phone" class="form-control" required> 
    </div>
    <button type="submit" class="btn btn-secondary mb-3">Place Order</button>
</form>

</div>