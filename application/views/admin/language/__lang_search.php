
             <div class="col-sm-12 col-md-12 display_none" id="filterbody">
                    <div class="panel panel-bd">

                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4><?php echo makeString(['filter'])?></h4>
                            </div>
                        </div>

                        <div class="panel-body">
                            
                            <?php echo form_open('admin/language/editPhrase/english', ['class' => 'form-horizontal']); ?>

                    
                                <div class="col-md-4 ">
                                    <label>Search Phrase</label>
                                    <input type="text" placeholder="Search Phrase" name="phrase" class="form-control" autocomplete="off" />
                                </div>


                                <div class="col-md-4">
                                    <label class="text-white"><?php echo  display('submit')?></label>
                                    <div>
                                        <button type="submit" class="btn btn-success">Go</button>
                                        <button type="reset" class="btn btn-danger"><?php echo display('reset'); ?></button>
                                    </div>
                                </div>

                            <?php echo form_close();?>

                        </div>
                    </div>
                </div>
