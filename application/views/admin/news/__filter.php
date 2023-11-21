            <div class="card mb-4 display_none" id="filterbody">

                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['filter'])?></h6>
                        </div>
                    </div>


                        <div class="card-body">
                            
                            <?php echo form_open('admin/news_list/newses'); ?>

                            <div class="row">
                            

                                <div class="col-md-4">
                                    <label><?php echo makeString(['form_date'])?></label>
                                    <input type="text" name="formdate" placeholder="<?php echo display('form_date');?>" class="form-control datepicker1 " autocomplete="off" />
                                </div>


                                <div class="col-md-4 ">
                                    <label><?php echo display('to_date');?></label>
                                   <input type="text" placeholder="<?php echo display('to_date');?>" name="todate" class="form-control datepicker1" autocomplete="off" />
                                </div>

                                <div class=" col-md-4">
                                    <label> <?php echo display('category');?> :</label>
                                    <select name="page_name" id="page_name"  class="form-control">
                                        <option value="">-select-</option>
                                        <?php foreach ($cat as  $page){?>
                                            <option value="<?php echo html_escape($page->slug); ?>" <?php echo ($page->slug==@$_GET['page_name']?'selected':'')?>>
                                            <?php echo html_escape($page->category_name); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <?php 
                                    $user_type = $this->session->userdata('user_type');
                                    if($user_type!=2){
                                ?>

                                <div class=" col-md-4">
                                    <label> <?php echo display('reporter');?>:</label>
                                    <select name="r_name" id="r_name" class="form-control">
                                        <option value="">-select-</option>
                                        <?php foreach ($reporter as $r) { ?>
                                            <option value="<?php echo html_escape($r->id); ?>">
                                                <?php echo html_escape($r->name); ?>
                                            </option>
                                            <?php  } ?>
                                    </select>
                                </div>


                                <?php } ?>
                                

                                <div class=" col-md-4">
                                    <label> <?php echo display('news_id');?>:</label>
                                    <input type="text" name="news_id" class="form-control"/>
                                </div>


                                <div class="col-md-4">
                                    <label class="text-white"></label>
                                    <button type="submit" class="btn btn-success margin-top30"><?php echo  display('search')?></button>
                                </div>

                            </div>

                            <?php echo form_close();?>

                        </div>
            </div>
