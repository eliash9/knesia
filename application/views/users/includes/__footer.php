<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
//get site_align setting
$settings = $this->db->get('app_settings')->row();
?>
            <input type="hidden" value="<?php echo base_url()?>" id="base_url">
            </div><!--/.main content-->
                <footer class="footer-content">
                    <div class="footer-text d-flex align-items-center justify-content-between">
                        <div class="copy"><?php echo html_escape(@$settings->footer_text) ?></div>
                    </div>
                </footer><!--/.footer content-->
                <div class="overlay"></div>
            </div><!--/.wrapper-->
        </div>
        <!--Global script(used by all pages)-->
        <script src="<?php echo base_url()?>assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
        
        <script src="<?php echo base_url()?>assets/dist/js/popper.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/metisMenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <!-- Third Party Scripts(used by this page)-->
        
        <!-- date time picker -->
        <script src="<?php echo base_url()?>assets/plugins/ui-datetimepicker/jquery-ui-timepicker-addon.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/ui-datetimepicker/jquery-ui-sliderAccess.js"></script>
        
        <script src="<?php echo base_url()?>assets/plugins/toastr/toastr.min.js"></script>


        <!--Page Scripts(used by all page)-->
        <script src="<?php echo base_url()?>assets/dist/js/ck.js"></script>
        <script src="<?php echo base_url()?>assets/dist/js/sidebar.js"></script>
        <script src="<?php echo base_url()?>assets/dist/js/custom_funcion.js"></script>


    </body>
</html>
