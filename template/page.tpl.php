<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <?php if ($logo): ?>
	    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="logo">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
	  <?php endif; ?>

    <nav class="navbar navbar-static-top">

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

        <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu custom-section">
        <?php print render($page['header_right']); ?>
      </div>
    </nav>

  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <?php print render($page['sidebar_first']); ?>
	  </section>
	<!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php if ($breadcrumb): ?>
        <ol class="breadcrumb"><li><?php print $breadcrumb; ?></li></ol>
      <?php endif; ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
      <?php if ($messages): ?>
        <div id="messages">
          <div class="section clearfix">
            <?php print $messages; ?>
          </div>
        </div>
      <?php endif; ?>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <?php print render($page['content_top_first']); ?>
        </div>
        <div class="col-lg-3 col-xs-6">
          <?php print render($page['content_top_second']); ?>
        </div>
        <div class="col-lg-3 col-xs-6">
          <?php print render($page['content_top_third']); ?>
        </div>
        <div class="col-lg-3 col-xs-6">
          <?php print render($page['content_top_fourth']); ?>
        </div>
      </div>

      <!--main page cont -->
      <div class="row">
       <?php if($page['sidebar_second']) { $primary_col = 7; } else { $primary_col = 12; } ?>
         <section class="col-lg-<?php print $primary_col; ?> connectedSortable">
           <?php if ($tabs): ?>
             <div class="tabs">
               <?php print render($tabs); ?>
             </div>
           <?php endif; ?>
           <?php print render($page['content']); ?>
        </section>
       <!-- /.col -->
       <!--sidebar_second -->
       <section class="col-lg-5 connectedSortable">
         <?php print render($page['sidebar_second']); ?>
       </section>

      </div>

    </section>

  </div>
     <!-- /.content-wrapper -->

  <footer class="main-footer">
     <div class="pull-right hidden-xs">
       <b>Version</b> 2.4.0
     </div>
     <strong>Copyright &copy; <?php print date('Y'); ?> <?php print $site_name; ?>.</strong> All rights
     reserved.
  </footer>


   <aside class="control-sidebar control-sidebar-dark">
     <?php print render($page['control_sidebar']); ?>
   </aside>
   <!-- /.control-sidebar -->
   <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
</div>
 <!-- ./wrapper -->
