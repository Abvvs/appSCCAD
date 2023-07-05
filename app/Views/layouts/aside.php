<div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                
              </span>
              <!-- <span class="app-brand-text demo menu-text fw-bolder ms-2">SC-CAD</span> -->
            </a>
            
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
            <div>
              <img src="<?php echo base_url();?>/assets/img/layouts/LOGO_SC-CAD.png" style="width:95%">
            </div>
        </div>
        
        <div class="menu-inner-shadow"></div>
        
        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <p class="app-brand-text demo menu-text fw-bolder ms-4"><?php echo $usuario[1]?></p>
            
            <li class="menu-item">
              <a href="<?php echo base_url('empleados')?>" class="menu-link">
              <i class='bx bxs-user-pin me-2'></i>
                <div data-i18n="Analytics">EMPLEADOS</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?php echo base_url('trabajos')?>" class="menu-link">
              <i class='bx bxs-briefcase me-2' ></i>
                <div data-i18n="Analytics">TRABAJOS</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?php echo base_url('cerrar')?>" class="menu-link">
              <i class="bx bx-power-off me-2"></i>
                <div data-i18n="Analytics">CERRAR SESIÓN</div>
              </a>
            </li> 
          </ul>
          
        </aside>
        <!-- / Menu -->