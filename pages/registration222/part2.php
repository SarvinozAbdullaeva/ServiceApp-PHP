<div class="card">

<div class="card-header bg-info text-white">
    Товары
</div>

<div class="card-body">

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Товар</span>
        </div>
        <select name="product_id" class="form-control" required>
            <?php
            while($row = $products->fetch_assoc()) { 
            ?>
                <option value="<?=$row['id']?>" ><?=$row['name']?></option>    
            <?php
            }
            ?>
        </select>
    </div> <!-- .input-group -->

    <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Модель</span>
            </div>
            <input type="text"  name="model" class="form-control" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1" required>
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Серия или IMEI</span>
            </div>
            <input type="text" name="seriya" class="form-control" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1" required>
    </div> <!-- .input-group -->

</div>

</div>