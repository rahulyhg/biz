<div class="row ">
    <div class="well" style="min-height:120px;">
        <div class="text-left col-md-6 col-xs-6 col-sm-6">
            <h2><b>Chapter Setup</b></h2>
        </div>
        <div class="text-right col-md-6 col-xs-6 col-sm-6">
            <!--<a href="#" class="cross"><i class="fa fa-times" aria-hidden="true"></i></a>-->
        </div>
    </div>
    <div class="down-sec add_more">
        <form class="form-inline chapter_title" role="form">
            <div class="form-group">
                <label for="title">Chapter Title: </label>
                <input type="text" class="form-control" id="chapter_title" readonly="readonly" value="<?php echo $chapter; ?>">
            </div>
        </form>
        <div class="well add_summ">
            <p class="">You can add more headings under chapter setup. If you feel your business plan require more detailed information, you are free to add as many headings you want. You can also edit or delete certain headings which are not relevant to your business. In short, you can customize as per your requirement.</p>
        </div>
        <div class="add_more_table" id="updateTable">
            <h4>Heading Content</h4>
            <table class="table">
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($links as $link) {
                        $faStatus = 'fa-check';
                        $button_title = "Activate";
                        $value = 3;
                        if ($link->status == 1) {
                            $faStatus = 'fa-times';
                            $value = 2;
                            $button_title = "De-activate";
                        }
                        ?>
                        <tr id="trupdateForm<?php echo $i; ?>">
                            <td class="col-sm-12">
                                <form id="updateForm<?php echo $i; ?>" method="post" class="updateForms">
                                    <div class="col-sm-10" align="center">
                                        <div class="form-group">
                                            <input name="title" value="<?php echo $link->title; ?>" type="text" class="form-control form-control-lg" id="textfield" aria-describedby="emailHelp" placeholder="Enter Your Text" required="">
                                            <input name="menuid" type="hidden" value="<?php echo $link->menuid; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="table_edit" type="submit" name="submit" value="1" style="background-color: transparent;" title="Update"><em class="fa fa-pencil"></em></button>
                                        <button class="table_edit" type="submit" name="submit" value="<?php echo $value; ?>" style="background-color: transparent;" title="<?php echo $button_title; ?>"><em class="fa <?php echo $faStatus; ?>"></em></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="add_more_table" id="addTable">
            <h4>Add New</h4>
            <table class="table" id="addMoreTable">
                <tbody>
                    <tr>
                        <td class="col-sm-12">
                            <form method="post" id="addForm">
                                <div class="col-sm-10" align="center">
                                    <div class="form-group">
                                        <input type="text" name="add" class="form-control form-control-lg" required=""/>
                                        <input type="hidden" name="parentid" value="<?php echo $parentid; ?>" />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button class="table_edit addBtn" name="submit" value="4" style="background-color: transparent;"><em class="fa fa-plus"></em></button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>