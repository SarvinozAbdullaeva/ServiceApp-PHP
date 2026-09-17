<div class="card">

<div class="card-header bg-info text-white">
    Registration of Client Data
</div>

    <div class="card-body">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Date</span>
            </div>
            <input type="date" value="<?=$date1?>" id="date" name="date" class="form-control" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1" required>
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Status</span>
            </div>
            <select class="form-control" id="status_id" name="status_id">
                <option value="0">Новый</option>
                <option value="1">Принято</option>
                <option value="2">В процессе</option>
                <option value="3">Завершен</option>
                <option value="4">Отказано</option>
            </select>
        </div> <!-- .input-group -->

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Client Name</span>
            </div>
            <select name="client_id" id="client_id" class="form-control" required>
                <?php
                while($row = $clients->fetch_assoc()) { 
                ?>
                    <option value="<?=$row['id']?>" ><?=$row['name']?></option>    
                <?php
                }
                ?>
            </select>
        </div> <!-- .input-group -->

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Product Type</span>
            </div>
            <select name="service_id" id="service_id" class="form-control" required>
                <?php
                while($row = $services->fetch_assoc()) { 
                ?>
                    <option value="<?=$row['id']?>" ><?=$row['name']?></option>    
                <?php
                }
                ?>
            </select>
        </div> <!-- .input-group -->

        

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Notes</span>
            </div>
            <input type="text" name="notes" id="notes" class="form-control" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1" required>
        
            <!-- <textarea name="notes" class="form-control"></textarea> -->
        </div> <!-- .input-group -->

        <input type="reset" class="btn btn-danger" value="Reste">
        <input type="submit" id="btn_submit" class="btn btn-info float-right" value="Save">

        <div class="spinner-border float-right" id="loading1" role="status" style="display:none;">
            <span class="sr-only">Loading...</span>
        </div>

    </div>

</div>