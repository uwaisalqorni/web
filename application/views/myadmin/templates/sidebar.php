        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('myadmin/dashboard') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-clinic-medical"></i>
                </div>
                <div class="sidebar-brand-text mx-3">RSI MyAdmin</div>
            </a>
			
			 <!-- Divider -->
            <hr class="sidebar-divider">
            <?php
            // Query Section
            $role_id = $this->session->userdata('role_id');
            $Section = $this->manage->showSection($role_id);
            ?>

            <!-- Looping Section -->
            <?php foreach ($Section as $s) : ?>
                <div class="sidebar-heading">
                    <?= $s['section']; ?>
                </div>

                <!-- Menu -->
                <?php
                $SectionId = $s['id'];
                $Menu = $this->manage->showMenu($SectionId);
                ?>

                <?php foreach ($Menu as $m) : ?>
                    <?php if ($title == $m['title']) : ?>
						<li class="nav-item active">
					<?php else : ?>
						<li class="nav-item">
					<?php endif; ?>
						<?php if ($m['url'] == "#") : ?>
							 <?php
							$collapse = str_replace(' ', '', $m['title']);
							?>
							<a class="nav-link collapsed  pb-0" href="#" data-toggle="collapse" data-target="#<?= $collapse; ?>" aria-expanded="true" aria-controls="<?= $collapse; ?>">
								<i class="<?= $m['icon']; ?>"></i>
								<span><?= $m['title']; ?></span>
							</a>
							<div id="<?= $collapse; ?>" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
								<div class="bg-white collapse-inner rounded">
								
								<!-- Sub Sub Section -->
								<?php
								$MenuId = $m['id'];
								$SubMenu = $this->manage->showSubMenu($MenuId);
								?>
								<?php foreach ($SubMenu as $sm) : ?>
									
									<?php if ($title == $sm['title']) : ?>
										<a class="collapse-item  active" href="<?= base_url($sm['url']); ?>"><?= $sm['title']; ?></a>
									<?php else : ?>
										<a class="collapse-item" href="<?= base_url($sm['url']); ?>"><?= $sm['title']; ?></a>
									<?php endif; ?>
								<?php endforeach; ?>	
								</div>
							</div>								
                        <?php else : ?>
							<a class="nav-link pb-0" href="<?= base_url($m['url']); ?>">
								<i class="<?= $m['icon']; ?>"></i>
								<span><?= $m['title']; ?></span>
							</a>
                        <?php endif; ?>
						
                        
                    </li>
                <?php endforeach; ?>
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">
            <?php endforeach; ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->