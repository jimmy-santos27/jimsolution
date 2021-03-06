<div class="row"   style="padding-bottom: 10px;    border-bottom: 0px solid #e0dfe3"  >
    <form action="index.php" Method="POST">
        <div class="form-group" >
            <?php
                if ($filteredType == 1) {

                    ?>
                    <div class="col-md-1"  >
                        From
                    </div>
                    <div class="col-md-2">
                        <input class="form-control input-sm" id="fromdate" name="fromdate" REQUIRED placeholder="mm/dd/yyyy"  type="date" style="width: 133px"  value="<?php echo $dtFROM;?>">
                    </div>
                    <div class="col-md-1">
                        To
                    </div>
                    <div class="col-md-2">
                        <input class="form-control input-sm" id="todate" name="todate" REQUIRED placeholder="mm/dd/yyyy"  type="date" style="width: 133px"  value="<?php echo$dtTO;?>">
        
                    </div>
                    <?php
                }
            ?>

            <div class="col-md-1">
                Filter
            </div>
            <div class="col-md-4">
                <input class="form-control input-sm" type="text" id="keyword" name="keyword" placeholder="Enter Keyword" value="<?php echo $keyWord;?>">
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary btn-sm" style="width: 100%"  name="save" type="submit" >
                    <span class="fa fa-play fw-fa"></span> Go</button>
            </div>
        </div>
    </form>
</div>
