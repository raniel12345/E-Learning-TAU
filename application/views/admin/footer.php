    
		
		</div> <!-- content class div - see content_start_div.php -->
	</div> <!-- wrapper -->

    <script type="text/javascript" src="<?php echo base_url("assets/plugins/jquery.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/plugins/popper.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/plugins/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/plugins/jquery-ui/jquery-ui.min.js"); ?>"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

        // $(".agriculture_principle").datepicker();
    </script>

    <?php if ($page_code == "login"): ?>

		<script type="text/javascript" src="<?php echo base_url("assets/js/admin/login.js"); ?>"></script>

	<?php elseif($page_code == "principle_panel"): ?>

        <script type="text/javascript" src="<?php echo base_url("assets/js/admin/principle.js"); ?>"></script>

    <?php elseif($page_code == "principle_sub_topic_panel"): ?>

        <script type="text/javascript" src="<?php echo base_url("assets/js/admin/sub_topics.js"); ?>"></script>

    <?php elseif($page_code == "sub_topic_chapters_panel"): ?>

        <script type="text/javascript" src="<?php echo base_url("assets/js/admin/chapters.js"); ?>"></script>

    <?php elseif($page_code == "chapters_lessons_panel"): ?>

        <script type="text/javascript" src="<?php echo base_url("assets/js/admin/lessons.js"); ?>"></script>

	<?php endif; ?>

    <?php if ($page_code !== "login"): ?>
        <script type="text/javascript" src="<?php echo base_url("assets/js/admin/control_btns.js"); ?>"></script>
    <?php endif; ?>

</body>
</html>