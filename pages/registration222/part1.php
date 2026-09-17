<div class="card">

<div class="card-header bg-info text-white">
    Общые данные
</div>

    <div class="card-body">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Дата</span>
            </div>
            <input type="date" value="<?=$date1?>" name="date" class="form-control" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1" required>
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Статус</span>
            </div>
            <select class="form-control" name="status_id">
                <option value="0">Новый</option>
                <option value="1">Принято</option>
                <option value="2">В процессе</option>
                <option value="3">Завершен</option>
                <option value="4">Отказано</option>
            </select>
        </div> <!-- .input-group -->

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Клиент</span>
            </div>
            <select name="client_id" class="form-control" required>
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
                <span class="input-group-text" id="basic-addon1">Сервис</span>
            </div>
            <select name="service_id" class="form-control" required>
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
                <span class="input-group-text" id="basic-addon1">Примечание</span>
            </div>
            <textarea name="notes" class="form-control"></textarea>
        </div> <!-- .input-group -->

        <input type="reset" class="btn btn-danger" value="Сброс">
        <input type="submit" class="btn btn-info float-right" value="Сохранить">

    </div>

</div>