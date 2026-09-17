<div class="card">

<div class="card-header bg-info text-white">
    Product Detail
</div>

<div class="card-body">

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Brand Name</span>
        </div>
        <select name="product_id" id="product_id" class="form-control" required>
            <?php
            while($row = $brands->fetch_assoc()) { 
            ?>
                <option value="<?=$row['id']?>" ><?=$row['name']?></option>    
            <?php
            }
            ?>
        </select>
        
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Model</span>
        </div>
        <input type="text" name="model" id="model" class="form-control" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1" required>
        
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Version or IMEI</span>
        </div>
        <input type="text" name="seriya" id="seriya" class="form-control" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1" required>
        <button class="btn btn-info">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
    </div> <!-- .input-group -->

</div>

</div>