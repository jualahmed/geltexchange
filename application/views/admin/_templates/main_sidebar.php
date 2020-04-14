<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<aside class="main-sidebar">
    <section class="sidebar">
      <?php if ($admin_prefs['user_panel'] == TRUE): ?>
      <div class="user-panel">
          <div class="pull-left image">
              <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
              <p><?php echo $user_login['firstname'].$user_login['lastname']; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> <?php echo lang('menu_online'); ?></a>
          </div>
      </div>
      <?php endif; ?>
      <?php if ($admin_prefs['sidebar_form'] == TRUE): ?>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="<?php echo lang('menu_search'); ?>...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
      <?php endif; ?>
        <!-- Sidebar menu -->
        <ul class="sidebar-menu">
            
            <li class="<?=active_link_controller('dashboard')?>">
                <a href="<?php echo site_url('admin/dashboard'); ?>">
                    <i class="fa fa-dashboard"></i> <span><?php echo lang('menu_dashboard'); ?></span>
                </a>
            </li>

            <li class="<?=active_link_function('index')?>">
              <a href="<?php echo site_url('admin/setting'); ?>">
                  <i class="fa fa-user"></i> <span>Settings</span>
              </a>
            </li>

            <li class="<?=active_link_function('settingother')?>">
              <a href="<?php echo site_url('admin/setting/settingother'); ?>">
                  <i class="fa fa-user"></i> <span>Other Settings</span>
              </a>
            </li>
            
            <li class="<?=active_link_controller('gateways')?>">
              <a href="<?php echo site_url('admin/gateways'); ?>">
                  <i class="fa fa-user"></i> <span>Gateways</span>
              </a>
            </li>
            
            <li class="<?=active_link_controller('rates')?>">
              <a href="<?php echo site_url('admin/rates'); ?>">
                  <i class="fa fa-exchange"></i> <span> Exchange rates</span>
              </a>
            </li>


            <li class="<?=active_link_controller('exchanges')?>">
              <a href="<?php echo site_url('admin/exchanges'); ?>">
                <i class="fa fa-refresh"></i> <span> Exchanges</span>
              </a>
            </li>


            <li class="<?=active_link_controller('faqandtutirial')?>">
              <a href="<?php echo site_url('admin/faqandtutirial'); ?>">
                <i class="fa fa-refresh"></i> <span> FAQ & TUTORIAL</span>
              </a>
            </li>
  

            <li class="<?=active_link_controller('users')?>">
                <a href="<?php echo site_url('admin/users'); ?>">
                    <i class="fa fa-user"></i> <span><?php echo lang('menu_users'); ?></span>
                </a>
            </li>
        
            <li class="<?=active_link_controller('groups')?>">
                <a href="<?php echo site_url('admin/groups'); ?>">
                    <i class="fa fa-shield"></i> <span><?php echo lang('menu_security_groups'); ?></span>
                </a>
            </li>

             <li class="<?=active_link_controller('users')?>">
                <a href="<?php echo site_url('admin/users/feedback'); ?>">
                    <i class="fa fa-shield"></i> <span><?php echo "feedback"; ?></span>
                </a>
            </li>
        </ul>
    </section>
</aside>
